<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\TimeSlots;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdminAlreadyLoggedIn');
    }
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {


        $request->validate([
            'email'=> 'required|email',
            'password' => 'required|min:6|max:16',
        ]);

        $admin = Admin::where('email', '=', $request->email )->first();
        if($admin){

            if(Hash::check($request->password, $admin->password))
            {
                $request->session()->put('LoggedAdmin', $admin);
                return redirect('admin');

            }else{
                return back()->with('message', 'Invalid Credentials');;
            }

        }else{
            return back()->with('message', 'No account found for this email');

        }

    }

    public function logout()
    {
        if(session()->has('LoggedAdmin'))
        {
            session()->pull('LoggedAdmin');
            return redirect('admin/login');
        }
        else{
            return redirect('admin/login');
        }
    }

}
