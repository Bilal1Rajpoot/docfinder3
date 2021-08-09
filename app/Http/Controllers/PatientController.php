<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Doctor\Form\Prescription;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Review;
use App\Models\TimeSlots;
use Illuminate\Http\Request;
use App\Models\Patients;
use App\Models\MedicalRecord;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use PhpParser\Comment\Doc;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('isPatientLogged');
    }


    public function dashboard(Request $request)
    {
        $patient = $request->session()->get('LoggedPatient');
        $appointments = Appointment::where('patient_id', '=', $patient->id)->latest()->get();
        $records = MedicalRecord::where('patient_id', '=', $patient->id)->get();

        return view('patient.patient-dashboard')->with([
            'patient' => $patient,
            'appointments' => $appointments,
            'records' => $records,
        ]);
    }

    public function profile(Request $request)
    {
        $patient = $request->session()->get('LoggedPatient');
        return view('patient.patient-profile-setting')->with([
            'patient' => $patient,
        ]);

    }

    public function saveProfile(Request $request)
    {

        $request->validate([
            'first_name' => 'required|max:100|alpha',
            'last_name' => 'required|max:100|alpha',
            'mobile_number' => 'required'
        ]);

        $patient = $request->session()->get('LoggedPatient');

        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'image|mimes:jpg,png|max:2048'
            ]);
            $image = $request->file('image');

            $new_name = uniqid() . '-' . now()->timestamp . '.' . request()->image->getClientOriginalExtension();

            $image->move(public_path('images'), $new_name);
            $patient->image_path = $new_name;
            $patient->save();

        }

        $patient->first_name = $request->first_name;
        $patient->last_name = $request->last_name;
        $patient->date_of_birth = $request->date_of_birth;
        $patient->blood_group = $request->blood_group;
        $patient->mobile_number = $request->mobile_number;
        $patient->address = $request->address;
        $patient->state = $request->state;
        $patient->city = $request->city;
        $patient->zip_code = $request->zip_code;
        $patient->country = $request->country;

        if ($patient->save()) {
            return back()->with('message', 'Data Saved Successfully');
        } else {
            return back()->with('message', 'failed to save data');
        }


    }

    public function showPassword(Request $request)
    {
        $patient = $request->session()->get('LoggedPatient');
        return view('patient.change-password')->with([
            'patient' => $patient,
        ]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:6|max:16',
            'password' => 'required|min:6|max:16|confirmed'
        ]);
        $patient = $request->session()->get('LoggedPatient');

        if (!(Hash::check($request->password, $patient->password))) {
            if (Hash::check($request->old_password, $patient->password)) {
                $patient->password = Hash::make($request->password);
                $patient->save();
                return back()->with('message', 'Password change Successfully');
            } else
                return back()->with('message', 'Invalid Old Password');
        } else {
            return back()->with('message', 'New password must be different from old password');
        }

    }

    public function cancelAppointment(Request $request)
    {

        $appointment = Appointment::find($request->appointment_id);

        if ($appointment->status == 'Pending') {
            $slot = TimeSlots::find($appointment->slot_id);
            $appointment->status = 'Cancel';
            $slot->is_available = '1';
            if ($appointment->save() and $slot->save()) {
                return back()->with('cancel', 'Appointment Cancel Successfully');
            } else {

            }

        } else {
            return back()->with('cancel', 'Appointment Already Cancelled');
        }
    }

    public function favourites(Request $request)
    {
        $patient = $request->session()->get('LoggedPatient');
        //$bookmarks = DB::table('bookmarks')->where('patient_id', '=', $patient->id)->get();
        $bookmarks = $patient->bookmarks()->get();
        return view('patient.favourites')->with([
            'patient' => $patient,
            'bookmarks' => $bookmarks,
        ]);
    }

    public function medicalRecord(Request $request)
    {
        $patient = $request->session()->get('LoggedPatient');
        $records = MedicalRecord::where('patient_id', '=', $patient->id)->get();

        return view('patient.medical-record')->with([
            'patient' => $patient,
            'records' => $records,
        ]);
    }

    public function medicalRecordCreate(Request $request)
    {
        if ($request->hasFile('file')) {

            $request->validate([
                'file' => 'file|mimes:doc,docx,pdf,jpg,png|max:5000'
            ]);
            $file = $request->file('file');
            $origional_file_name = $file->getClientOriginalName();
            $new_name = uniqid() . '-' . now()->timestamp . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('file'), $new_name);
            $patient = $request->session()->get('LoggedPatient');
            $record = new MedicalRecord;
            $record->type = $request->type;
            $record->description = $request->description;
            $record->file_path = $new_name;
            $record->patient_id = $patient->id;
            $record->origional_file_name = $origional_file_name;
            if ($record->save()) {
                return back()->with('message', 'Record Saved Successfully');
            }
            return back()->with('message', 'File not store');

        }
        return back()->with('message', 'File not selected');
    }

    public function invoice(Request $request, $id)
    {
        $patient = $request->session()->get('LoggedPatient');

        //$appointment = DB::table('appointments')->where('id', '=', $id)->first();
        $appointment = Appointment::find($id);

        return view('patient.invoice')->with([
            'patient' => $patient,
            'appointment' => $appointment,
        ]);


    }

    public function prescription(Request $request, $id)
    {
        $prescriptions = DB::table('prescriptions')->where('appointment_id', '=', $id)->get();
        $patient = $patient = $request->session()->get('LoggedPatient');
        //$basic=DB::table('prescriptions')->where('appointment_id', '=', $id)->first();
        $appointment = Appointment::find($id);
        $basic = $appointment->prescriptions()->where('appointment_id', '=', $id)->first();
        return view('patient.prescription')->with([
            'patient' => $patient,
            'prescriptions' => $prescriptions,
            'basic' => $basic,
        ]);
    }

    public function meeting(Request $request, $appointment_id)
    {
        $patient = $request->session()->get('LoggedPatient');
        $appointment = Appointment::find($appointment_id);
        return view('patient.meeting')->with([
            'patient' => $patient,
            'appointment' => $appointment,
        ]);
    }

    public function feedback(Request $request)
    {

        $reviews = Review::create([
            'rating' => $request->rating,
            'review' => $request->review,
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
        ]);

        if ($reviews) {
            $appointment = Appointment::find($request->appointment_id);
            $slot = TimeSlots::find($appointment->slot_id);
            $slot->is_available = '1';
            $appointment->status = 'Completed';
            $appointment->save();
            if ($slot->save()) {
                return redirect('patient/dashboard');
            }
        }
        return back()->with('message', 'Something Wrong! data not saved');
    }

    public function feedbackSkip(Request $request)
    {


        $appointment = Appointment::find($request->appointment_id);
        $slot = TimeSlots::find($appointment->slot_id);
        $slot->is_available = '1';
        $appointment->status = 'Completed';
        $appointment->save();
        if ($slot->save()) {
            return redirect('patient/dashboard');
        }

        return back()->with('message', 'Something Wrong! data not saved');
    }


}
