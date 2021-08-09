<?php

namespace App\Http\Controllers;
use App\Models\BookMark;
use App\Models\Patients;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Doctor;
use PhpParser\Comment\Doc;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $patient = $request->session()->get('LoggedPatient');
        $doctors = Doctor::all()->sortByDesc('avg_rating')->take(10);
        $urology = Specialization::where('specialization', '=', 'urology')->count();
        $Neurology = Specialization::where('specialization', '=', 'Neurology')->count();
        $Orthopedic = Specialization::where('specialization', '=', 'Orthopedic')->count();
        $Cardiologist = Specialization::where('specialization', '=', 'Cardiologist')->count();
        $Dentist = Specialization::where('specialization', '=', 'Dentist')->count();
        $Ophthalmologists = Specialization::where('specialization', '=', 'Ophthalmologists')->count();
        $Gynecologists = Specialization::where('specialization', '=', 'Gynecologists')->count();
        $Oncologists = Specialization::where('specialization', '=', 'Oncologists')->count();
        return view('home.home')->with([
            'patient' => $patient,
            'urology' => $urology,
            'Neurology' => $Neurology,
            'Orthopedic' => $Orthopedic,
            'Cardiologist' => $Cardiologist,
            'Dentist' => $Dentist,
            'Ophthalmologists' => $Ophthalmologists,
            'Gynecologists' => $Gynecologists,
            'Oncologists' => $Oncologists,
            'doctors' => $doctors,
        ]);
    }

    public function search(Request $request)
    {
        $patient = $request->session()->get('LoggedPatient');

        $validated = $request->validate([
            'search' => 'required',
        ]);

        $doctor = Doctor::where('first_name', 'like', '%' . $request->search . '%')->orWhere('last_name', 'like', '%' . $request->search . '%')->orWhere('user_name', 'like', '%' . $request->search . '%')->orderBy('avg_rating', 'desc')->get();

        if(count($doctor)==0)
            return back()->with('message', 'Sorry! No Record Found');

        return view('home.search')->with([
            'doctors' => $doctor,
            'patient' => $patient,
        ]);
    }

    public function doctorProfile(Request $request, $id)
    {
        $patient = $request->session()->get('LoggedPatient');
        $doctor = Doctor::findOrFail($id);
        $doctorSchedule = $doctor->schedule()->get();
        $timeslot = $doctor->timeSlots()->get();
        $mon = $doctor->timeSlots()->where('week_number', '1')->get();
        $tue = $doctor->timeSlots()->where('week_number', '2')->get();
        $wed = $doctor->timeSlots()->where('week_number', '3')->get();
        $thu = $doctor->timeSlots()->where('week_number', '4')->get();
        $fri = $doctor->timeSlots()->where('week_number', '5')->get();
        $sat = $doctor->timeSlots()->where('week_number', '6')->get();
        $sun = $doctor->timeSlots()->where('week_number', '7')->get();





        return view('home.doctor-profile')->with([

            'doctor' => $doctor,
            'schedule' => $doctorSchedule,
            'patient' => $patient,
            'mon' => $mon,
            'tue' => $tue,
            'wed' => $wed,
            'thu' => $thu,
            'fri' => $fri,
            'sat' => $sat,
            'sun' => $sun,
        ]);
    }

    public function booking($id)
    {
        $doctor = Doctor::find($id);

        $timeslot = $doctor->timeSlots()->get();
        $mon = $doctor->timeSlots()->where('week_number', '1')->get();
        $tue = $doctor->timeSlots()->where('week_number', '2')->get();
        $wed = $doctor->timeSlots()->where('week_number', '3')->get();
        $thu = $doctor->timeSlots()->where('week_number', '4')->get();
        $fri = $doctor->timeSlots()->where('week_number', '5')->get();
        $sat = $doctor->timeSlots()->where('week_number', '6')->get();
        $sun = $doctor->timeSlots()->where('week_number', '7')->get();



        if (isset($doctor)) {
            return view('home.booking')->with([

                'mon' => $mon,
                'tue' => $tue,
                'wed' => $wed,
                'thu' => $thu,
                'fri' => $fri,
                'sat' => $sat,
                'sun' => $sun,
            ]);

        } else {

        }

    }

    public function bookmarkDoctor(Request $request){

        if(session()->has('LoggedPatient')){


            $patient=session()->get('LoggedPatient');
            $bookmark = DB::table('bookmarks')->where([
                ['patients_id', '=', $patient->id],
                ['doctors_id', '=', $request->id],
            ])->first();
            if($bookmark)
            {
                return [true, 'Already Bookmarked this Doctor'];
            }
            else {
                $bookmark = new BookMark();
                $bookmark->doctors_id = $request->id;
                if($patient->bookmarks()->save($bookmark));
                {
                    return [true, "Bookmarked Successfully"];
                }
                return [true, "Failed to bookmark"];

            }
        }
        return [false];
    }
    public function category(Request $request, $category)
    {
        $patient = $request->session()->get('LoggedPatient');


        $specializations = Specialization::where('specialization', 'like', '%' . $category . '%')->get();

        if(count($specializations)==0)
            return back()->with('message', 'Sorry! No Record Found');

        return view('home.search-category')->with([
            'specializations' => $specializations,

            'patient' => $patient,
        ]);

    }



    public function isPatientLogin(){
        if(session()->has('LoggedPatient')){
            return [true];
        }
        return [false];
    }

}
