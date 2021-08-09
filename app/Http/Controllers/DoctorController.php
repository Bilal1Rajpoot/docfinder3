<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Clinic;
use App\Models\Address;
use App\Models\Award;
use App\Models\Experience;
use App\Models\Qualification;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\TimeSlots;
use App\Models\Schedule;
use App\Models\SocialMedia;
use App\Models\Review;
use App\Models\Appointment;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;
use Illuminate\Support\Facades\Crypt;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;
use function GuzzleHttp\Promise\all;

class DoctorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function dashboard()
    {

        $user = Auth::user();
        $name = $user['name'];
        $id = $user['id'];
        $doctor = Doctor::find($id);
        $today_appointments = $doctor->appointments()->where('appointment_date', '=', Carbon::now()->toDateString())->orderBy('appointment_time', 'asc')->get();

        $future_appointments = $doctor->appointments()->where('appointment_date', '>', Carbon::now()->toDateString())->orderBy('appointment_date', 'asc')->get();

        $total_appointments = $doctor->appointments()->count();

        return view('dashboard')->with([
            'name' => $name,
            'doctor' => $doctor,
            'todayAppointments' => $today_appointments,
            'futureAppointments' => $future_appointments,
            'totalAppointments' => $total_appointments,
        ]);
    }

    public function appointments()
    {
        $user = Auth::user();
        $name = $user['name'];
        $id = $user['id'];
        $doctor = Doctor::find($id);

        return view('appointments', ['name' => $name, 'doctor' => $doctor]);
    }

    public function myPatients()
    {
        $user = Auth::user();
        $name = $user['name'];
        $id = $user['id'];
        return view('my-patients', ['name' => $name]);
    }


    public function scheduleTimings()
    {
        $user = Auth::user();
        $name = $user['name'];
        $id = $user['id'];
        $doctor = Doctor::find($id);

        $timeslot = $doctor->timeSlots()->get();
        $mon = $doctor->timeSlots()->where('week_number', '1')->get();
        $tue = $doctor->timeSlots()->where('week_number', '2')->get();
        $wed = $doctor->timeSlots()->where('week_number', '3')->get();
        $thu = $doctor->timeSlots()->where('week_number', '4')->get();
        $fri = $doctor->timeSlots()->where('week_number', '5')->get();
        $sat = $doctor->timeSlots()->where('week_number', '6')->get();
        $sun = $doctor->timeSlots()->where('week_number', '7')->get();

        return view('schedule-timings')->with([
            'name' => $name,
            'mon' => $mon,
            'tue' => $tue,
            'wed' => $wed,
            'thu' => $thu,
            'fri' => $fri,
            'sat' => $sat,
            'sun' => $sun,
            'doctor' => $doctor,
        ]);
    }


    public function reviews()
    {

        $user = Auth::user();
        $name = $user['name'];
        $id = $user['id'];
        $doctor = Doctor::find($id);
        $reviews = $doctor->reviews()->get();

        return view('reviews')->with([
            'name' => $name,
            'reviews' => $reviews,
            'doctor' => $doctor,
        ]);
    }

    public function doctorProfileSettings()
    {
        $user = Auth::user();
        $name = $user['name'];
        $id = $user['id'];
        $doctor = Doctor::find($id);

        $doctor_info = $doctor;
        $clinic_info = $doctor->clinic()->get()->first();

        $doctor_address = $doctor->address()->get()->first();
        $doctor_service = $doctor->services()->get();
        $qualification = $doctor->qualification()->get();
        $experience = $doctor->experience()->get();
        $awards = $doctor->awards()->get();

        $doctor_specialization = $doctor->specialization()->get();
        return view('doctor-profile-settings')->with([
            'name' => $name,
            'doctor' => $doctor_info,
            'clinic' => $clinic_info,
            'address' => $doctor_address,
            'service' => $doctor_service,
            'specialization' => $doctor_specialization,
            'qualification' => $qualification,
            'experience' => $experience,
            'awards' => $awards,
            'doctor' => $doctor,
        ]);

    }

    public function socialMedia()
    {

        $user = Auth::user();
        $name = $user['name'];
        $id = $user['id'];
        $social = Doctor::find($id)->socialmedia()->get()->first();
        $doctor = Doctor::find($id);
        return view('social-media')->with([
            'name' => $name,
            'socialmedia' => $social,
            'doctor' => $doctor,
        ]);
    }


    public function doctorChangePassword()
    {

        $user = Auth::user();
        $name = $user['name'];
        $id = $user['id'];
        $doctor = Doctor::find($id);
        return view('doctor-change-password', ['name' => $name, 'doctor' => $doctor,]);
    }

    public function doctorLogin()
    {

        $user = Auth::user();
        $name = $user['name'];
        $id = $user['id'];
        $doctor = Doctor::find($id);
        return view('doctor-login', ['name' => $name, 'doctor' => $doctor,]);
    }

    public function saveUserSetting(Request $req)
    {
        $id = Auth::id();
        $doctor = Doctor::find($id);


        //save doctor basic info
        $doctor->first_name = $req->first_name;
        $doctor->last_name = $req->last_name;
        $doctor->phone_number = $req->phone_number;
        $doctor->gender = $req->gender;
        $doctor->date_of_birth = $req->date_of_birth;
        $doctor->biography = $req->biography;
        $doctor->doctor_fee = $req->fee;
        if ($req->hasFile('image')) {

            if ($req->file('image')->isValid()) {

                $validated = $req->validate([

                    'image' => 'mimes:jpeg,png|max:1014',
                ]);
                $extension = $req->image->extension();
                $req->image->storeAs('/public', $validated['name'] . "." . $extension);
                $url = Storage::url($validated['name'] . "." . $extension);
                $doctor->image_path = $url;


            }
        }
        $doctor->save();


        //doctor clinic info
        $user = Doctor::with('clinic')->findOrFail($id);
        if ($user->clinic == null) {
            $clinic = new Clinic();
            $clinic->clinic_name = $req->clinic_name;
            $clinic->clinic_address = $req->clinic_address;

            $user->clinic()->save($clinic);

        } else {
            $user->clinic()->update(['clinic_name' => $req->clinic_name, 'clinic_address' => $req->clinic_address]);
        }

        //doctor address info
        $user = Doctor::with('address')->findOrFail($id);

        if ($user->address == null) {
            $address = new Address();
            $address->address_line_1 = $req->address_line_1;
            $address->address_line_2 = $req->address_line_2;
            $address->city = $req->city;
            $address->state = $req->state;
            $address->country = $req->country;
            $address->postal_code = $req->postal_code;
            $user->address()->save($address);

        } else {
            $user->address()->update([
                'address_line_1' => $req->address_line_1,
                'address_line_2' => $req->address_line_2,
                'city' => $req->city,
                'state' => $req->state,
                'country' => $req->country,
                'postal_code' => $req->postal_code,
            ]);
        }

        //doctor service info
        $user = Doctor::with('services')->findOrFail($id);


        $service = $user->services();


        if (!($user->services()->exists())) {


            $service = new Service();
            $service->services = $req->services;

            $user->services()->save($service);

        } else {
            $user->services()->update([
                'services' => $req->services,
            ]);
        }

        //doctor specialization info
        $user = Doctor::with('specialization')->findOrFail($id);
        if (!($user->specialization()->exists())) {
            $specialization = new Specialization();
            $specialization->specialization = $req->specialization;
            $user->specialization()->save($specialization);

        } else {
            $user->specialization()->update([
                'specialization' => $req->specialization,
            ]);
        }

        //doctor qualification info
        $user = Doctor::with('qualification')->findOrFail($id);
        if (!($user->qualification()->exists())) {
            $qualification = new Qualification();
            $qualification->degree_name = $req->degree;
            $qualification->institute_name = $req->institute;
            $qualification->rocurment_year = $req->year_of_completion;
            $user->qualification()->save($qualification);

        } else {
            $user->qualification()->update([

                'degree_name' => $req->degree,
                'institute_name' => $req->institute,
                'rocurment_year' => $req->year_of_completion,
            ]);
        }

        $user = Doctor::with('experience')->findOrFail($id);
        if (!($user->experience()->exists())) {
            $experience = new Experience();
            $experience->hospital_name = $req->hospital_name;
            $experience->from = $req->from;
            $experience->to = $req->to;
            $experience->designation = $req->designation;
            $user->experience()->save($experience);

        } else {
            $user->experience()->update([
                'hospital_name' => $req->hospital_name,
                'from' => $req->from,
                'to' => $req->to,
                'designation' => $req->designation,
            ]);
        }

        //
        $user = Doctor::with('awards')->findOrFail($id);
        if (!($user->awards()->exists())) {
            $award = new Award();
            $award->award_name = $req->awards;
            $award->year = $req->year;
            $user->awards()->save($award);

        } else {
            $user->awards()->update([
                'award_name' => $req->awards,
                'year' => $req->year,
            ]);
        }


        return redirect()->back()->with('message', 'Updated Doctor Profile');
    }

    function savedDoctorSchedule(Request $req)
    {
        if ($req->start_time == $req->end_time) {
            return redirect()->back()->with('message', 'Start time and End time must  be different');
        }
        $user = Auth::user();
        $id = $user['id'];
        $user = Doctor::with('schedule')->findOrFail($id);
        $schedule = new Schedule();
        $schedule->time_slot_per_client_in_minutes = $req->time_slot_per_client_in_minutes;
        $schedule->day_of_week = $req->day_of_week;
        $schedule->start_time = $req->start_time;
        $schedule->end_time = $req->end_time;
        $response = $user->schedule()->save($schedule);


        // saving data to slots
        $slot_id = $response->id;
        $day = $req->day_of_week;
        $doctor_id = $response->doctor_id;

        $per_slot_time = $req->time_slot_per_client_in_minutes;
        $startTime = Carbon::parse($req->start_time);
        $endTime = Carbon::parse($req->end_time);
        $totaltime = $endTime->diffInMinutes($startTime);
        $total_slots = ($totaltime / $per_slot_time);


        for ($x = 1; $x <= $total_slots; $x++) {

            $timeslots = new TimeSlots();
            $timeslots->slot_number = $x;
            $slot_STime = explode(" ", $startTime);
            $startTime = $startTime->addMinutes($per_slot_time);
            $slod_ETime = explode(" ", $startTime);

            $timeslots->slot_start_time = $slot_STime[1];
            $timeslots->slot_end_time = $slod_ETime[1];
            $timeslots->week_number = $day;

            $timeslots->is_available = '1';
            $timeslots->doctor_id = $doctor_id;
            $timeslots->schedule_id = $slot_id;

            $timeslots->save();


        }


        return redirect()->back()->with('message', 'Update Doctor Schedule');
    }

    function changePassword(Request $req)
    {
        $user = Auth::user();
        $oldPassword = $req->oldPassword;
        $userpassword = $user['password'];

        if (Hash::check($oldPassword, $userpassword)) {

            if ($req->password == $req->confirmPassword) {

                $user->update([
                    'password' => Hash::make($req->password),
                ]);
                return redirect()->back()->with('message', 'Password Change Successfully!');
            } else {
                return redirect()->back()->with('message', 'Password Not match');
            }
        } else {
            return redirect()->back()->with('message', 'Invalid Password');
        }

    }

    function savedSocialMedia(Request $req)
    {
        $id = Auth::id();
        $user = Doctor::with('socialmedia')->findOrFail($id);
        if ($user->socialmedia == null) {
            $socialmedia = new SocialMedia();
            $socialmedia->facebook = $req->facebook;
            $socialmedia->twitter = $req->twitter;
            $socialmedia->instagram = $req->instagram;
            $socialmedia->pinterest = $req->pinterest;
            $socialmedia->linkedin = $req->linkedin;
            $socialmedia->youtube = $req->youtube;

            $user->socialmedia()->save($socialmedia);
            return redirect()->back()->with('message', 'Saved Social Media links');

        } else {
            $user->socialmedia()->update([
                'facebook' => $req->facebook,
                'twitter' => $req->twitter,
                'instagram' => $req->instagram,
                'pinterest' => $req->pinterest,
                'linkedin' => $req->linkedin,
                'youtube' => $req->youtube,
            ]);
            return redirect()->back()->with('message', 'Updated Social Media links');
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

    public function savedBasicInformation(Request $request)
    {
        $doctor = Doctor::find(Auth::id());


        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'email|required',

            'gender' => 'required',
            'date_of_birth' => 'required',
            'biography' => 'required',
            'phone_number' => 'required',
        ]);

        if ($request->hasFile('image')) {


            if ($request->hasfile('image')) {

                $this->validate($request, [
                    'image' => 'required|image|mimes:jpg,png|max:2048'
                ]);

                $image = $request->file('image');

                $new_name = rand() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('images'), $new_name);
                $doctor->image_path = $new_name;
                $doctor->save();
            }
        }

        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->email = $request->email;

        $doctor->gender = $request->gender;
        $doctor->date_of_birth = $request->date_of_birth;
        $doctor->biography = $request->biography;
        $doctor->phone_number = $request->phone_number;

        if ($doctor->save()) {
            return back()->with('message', 'Basic Information saved Successfully');
        } else {
            return back()->with('message', 'Record Not Saved. Something Wrong');
        }
    }

    public function savedContact(Request $req)
    {
        $doctor = Doctor::find(Auth::id());


        $user = Doctor::with('address')->findOrFail($doctor->id);

        if ($user->address == null) {
            $address = new Address();
            $address->address_line_1 = $req->address_line_1;
            $address->address_line_2 = $req->address_line_2;
            $address->city = $req->city;
            $address->state = $req->state;
            $address->country = $req->country;
            $address->postal_code = $req->postal_code;
            $user->address()->save($address);

        } else {
            $user->address()->update([
                'address_line_1' => $req->address_line_1,
                'address_line_2' => $req->address_line_2,
                'city' => $req->city,
                'state' => $req->state,
                'country' => $req->country,
                'postal_code' => $req->postal_code,
            ]);
        }

        return back()->with('message', 'Contact Information Saved Successfully');
    }

    public function savedEducation(Request $req)
    {


        $doctor = Doctor::find(Auth::id());
        $user = Doctor::with('qualification')->findOrFail($doctor->id);

        $qualification = new Qualification();
        $qualification->degree_name = $req->degree_name;
        $qualification->institute_name = $req->institute_name;
        $qualification->rocurment_year = $req->rocurment_year;
        $qualification = $user->qualification()->save($qualification);


        return [$qualification->id, $qualification->degree_name, $qualification->institute_name, $qualification->rocurment_year];


    }

    public function savedClinic(Request $req)
    {
        $doctor = Doctor::find(Auth::id());

        //doctor clinic info
        $user = Doctor::with('clinic')->findOrFail($doctor->id);
        if ($user->clinic == null) {
            $clinic = new Clinic();
            $clinic->clinic_name = $req->clinic_name;
            $clinic->clinic_address = $req->clinic_address;

            $user->clinic()->save($clinic);

        } else {
            $user->clinic()->update(['clinic_name' => $req->clinic_name, 'clinic_address' => $req->clinic_address]);
        }
        return back()->with('message', 'Clinic Information Saved Successfully');

    }

    public function deleteEducation(Request $request)
    {

        $qualification = Qualification::find($request->id);
        if ($qualification) {
            if ($qualification->delete()) {
                return [true, $request->id];
            }
            return [false];
        }
        return [false];


    }

    public function saveClinic(Request $req)
    {
        $id = Auth::id();
        //doctor clinic info
        $user = Doctor::with('clinic')->findOrFail($id);
        if ($user->clinic == null) {
            $clinic = new Clinic();
            $clinic->clinic_name = $req->clinic_name;
            $clinic->clinic_address = $req->clinic_address;

            if ($user->clinic()->save($clinic)) {
                return [true];
            }
            return [false];

        } else {
            $user->clinic()->update(['clinic_name' => $req->clinic_name, 'clinic_address' => $req->clinic_address]);
            return [true];
        }

    }

    public function saveServices(Request $req)
    {

        $id = Auth::id();
        $user = Doctor::with('services')->findOrFail($id);
        $service = new Service();
        $service->services = $req->services;

        $result = $user->services()->save($service);
        if ($result) {
            return ['true', $result->id, $result->services];
        }
        return [false];


    }

    public function deleteServices(Request $request)
    {


        $service = Service::find($request->id);
        if ($service) {
            if ($service->delete()) {
                return [true, $request->id];
            }
            return [false];
        }
        return [false];

    }

    public function saveSpecialization(Request $req)
    {
        $id = Auth::id();
        $user = Doctor::with('services')->findOrFail($id);
        $specialization = new Specialization();
        $specialization->specialization = $req->specialization;

        $result = $user->specialization()->save($specialization);
        if ($result) {
            return ['true', $result->id, $result->specialization];
        }
        return [false];
        return [true, '1', $request->specialization];

    }

    public function deleteSpecialization(Request $request)
    {
        $specialization = Specialization::find($request->id);
        if ($specialization) {
            if ($specialization->delete()) {
                return [true, $request->id];
            }
            return [false];
        }
        return [false];
    }

    public function saveExperience(Request $req)
    {

        $id = Auth::id();
        $user = Doctor::with('experience')->findOrFail($id);

        $experience = new Experience();
        $experience->hospital_name = $req->hospital_name;
        $experience->from = $req->from;
        $experience->to = $req->to;
        $experience->designation = $req->designation;
        $result = $user->experience()->save($experience);
        if($result){
            return [true, $result->id, $result->hospital_name, $result->from, $result->to, $result->designation ];
        }
        else
            return [false];



    }
    public function uploadCV(Request $request){



        if ($request->hasFile('cv')) {

            $request->validate([
                'cv' => 'file|mimes:doc,docx,pdf|max:2000'
            ]);
            $id=Auth::id();
            $doctor = Doctor::find($id);
            $file = $request->file('cv');
            $new_name = uniqid(). '-'.now()->timestamp .'.'. $file->getClientOriginalExtension();
            $file->move(public_path('cv'), $new_name);
            $doctor->cv_path=$new_name;

            if($doctor->save())
            {
                return back()->with('message', 'CV Saved Successfully');
            }
            return back()->with('message', 'File not store');

        }
        return back()->with('message', 'File not selected');
    }


    public function deleteExperience(Request $request)
    {
        $experience = Experience::find($request->id);
        if ($experience) {
            if ($experience->delete()) {
                return [true, $request->id];
            }
            return [false];
        }
        return [false];
    }

    public function saveFee(Request $request){

        $doctor =Doctor::find(Auth::id());
        $doctor->doctor_fee = $request->fee;
        if($doctor->save()){
            return [true, $request->fee];
        }
        return [false];

    }

    public function saveAward(Request $req){

        $doctor = Doctor::find(Auth::id());
        $user = Doctor::with('qualification')->findOrFail($doctor->id);

        $award = new Award();
        $award->award_name = $req->award_name;
        $award->description = $req->description;
        $award->year = $req->year;
        $award = $user->awards()->save($award);
        if($award)
        {
            return [true, $award->id, $award->award_name, $award->description, $award->year];
        }
        return [false];



    }
    public function awardDelete(Request $request)
    {
        $award = Award::find($request->id);
        if ($award) {
            if ($award->delete()) {
                return [true, $request->id];
            }
            return [false];
        }
        return [false];

    }

    public function doctorMeeting(Request $request, $appointmentID)
    {
        $appointment = Appointment::find($appointmentID);
        if($appointmentID){

            $doctor = Doctor::find(Auth::id());
            return view('meeting')->with([
                'doctor' => $doctor,
                'appointment' => $appointment,
            ]);
        }
        return back()->with('message', 'No appointment Found');

    }

    public function video()
    {
        return view('video');
    }



}

