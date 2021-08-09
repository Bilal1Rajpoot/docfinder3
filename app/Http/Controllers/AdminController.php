<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patients;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\TimeSlots;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdminLogged');
    }
    public function dashboard(Request $request)
    {
        $admin = Admin::Find($request->session()->get('LoggedAdmin')->id);
        $doctors = Doctor::all()->sortByDesc('avg_rating');

        $patients = Patients::all();
        $appointments = Appointment::all()->sortByDesc('created_at');
        return view('admin.dashboard')->with([
            'doctors' => $doctors,
            'patients' => $patients,
            'appointments' => $appointments,
            'admin' => $admin
        ]);
    }

    public function profile(Request $request)
    {
        $admin = Admin::Find($request->session()->get('LoggedAdmin')->id);
        $admin= Admin::find($admin->id);
        return view('admin.profile')->with([
            'admin' => $admin,
        ]);
    }

    public function saveProfile(Request $request)
    {
        $admin = $request->session()->get('LoggedAdmin');
        $admin= Admin::find($admin->id);

        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->mobile_number = $request->mobile_number;
        $admin->email = $request->email;
        $admin->about = $request->about;
        $admin->date_of_birth = $request->date_of_birth;
        $admin->address = $request->address;
        $admin->city = $request->city;
        $admin->state = $request->state;
        $admin->country = $request->country;
        $admin->zip_code = $request->zip_code;

        if($admin->save()){
            return back()->with('message', 'data Saved Successfully');
        }
        return back()->with('message', 'data not Saved');
    }

    public function saveImage(Request $request)
    {
        $admin = $request->session()->get('LoggedAdmin');
        $admin= Admin::find($admin->id);

        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'image|mimes:jpg,png|max:2048'
            ]);
            $image = $request->file('image');

            $new_name = uniqid() . '-' . now()->timestamp . '.' . request()->image->getClientOriginalExtension();

            $image->move(public_path('ad/images'), $new_name);
            $admin->image_path = $new_name;
            $admin->save();
            return back()->with('message', 'Image Upload Successfully');

        }
    }

    public function reviews(Request $request)
    {
        $reviews = Review::simplePaginate(10);
        $admin = Admin::Find($request->session()->get('LoggedAdmin')->id);
        return view('admin.reviews')->with([
            'reviews' => $reviews,
            'admin' => $admin,
        ]);
    }

    public function roles(Request $request)
    {
        $admin = Admin::Find($request->session()->get('LoggedAdmin')->id);
        $admins=Admin::all();
        return view('admin.manage-role')->with([
            'admins' => $admins,
            'admin' => $admin
        ]);
    }

    public function createRole(Request $request)
    {

        $request->validate([
            'first_name' => 'required|max:100|alpha',
            'last_name' => 'required|max:100|alpha',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|max:16',
            'role' => 'required',
        ]);

       $admin = Admin::create([
           'first_name' => $request->first_name,
           'last_name' => $request->last_name,
            'email' => $request->email,
           'password' => Hash::make($request->password),
           'role' => $request->role,
       ]);

       if($admin)
       {
           return back()->with('message' , "Role Created Successfully");
       }
        return back()->with('message' , "Failed to create new role");
    }

    public function deleteRole(Request $request)
    {
        $admin = Admin::Find($request->session()->get('LoggedAdmin')->id);
        if($admin){
            $admin->delete();
            return true;
        }
        return false;


    }

    public function manageDoctor(Request $request)
    {
        $admin = Admin::Find($request->session()->get('LoggedAdmin')->id);
        $doctors = $doctor = Doctor::where('first_name', 'like', '%' . $request->search . '%')->orWhere('last_name', 'like', '%' . $request->search . '%')->orWhere('id', '=',  $request->search )->get();
        $blocked_doctors = Doctor::where('status', '=', 'blocked')->simplePaginate(10);
        return view('admin.search-doctor')->with([
            'admin' => $admin,
            'doctors' => $doctors,
            'blocked_doctors' => $blocked_doctors,
        ]);
    }



    public function blcokDoctor(Request $request)
    {
        $doctor= Doctor::find($request->id);

        if($doctor)
        {
            $doctor->status = "blocked";
            $doctor->save();
            return [true, $doctor->id];
        }
        return false;
    }
    public function unblcokDoctor(Request $request)
    {
        $doctor= Doctor::find($request->id);
        if($doctor)
        {
            $doctor->status = "active";
            $doctor->save();
            return [true, $doctor->id];
        }
        return false;
    }

    public function verifyDoctor(Request $request)
    {
        $admin = Admin::Find($request->session()->get('LoggedAdmin')->id);

        return view('admin.verify-doctor')->with([
           'admin' => $admin,
        ]);
    }







}
