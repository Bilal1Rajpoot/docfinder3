<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('isPatientAlreadyLoggedIn');
    }

    public function registration()
    {
        return view('patient.patient-registration');
    }

    public function login()
    {
        return view('patient.patient-login');
    }

    public function create(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:100|alpha',
            'last_name' => 'required|max:100|alpha',
            'email' => 'required|email|unique:patientss',
            'password' => 'required|min:6|max:16|confirmed'
        ]);

        $patient =Patients::Create([
            'first_name'=> $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($patient){
            $request->session()->put('LoggedPatient', $patient);
            return redirect('patient/dashboard');
        }
        else
        {
            return   back()->with('message', 'failed to Register Patient');
        }

    }
    public function authenticate(Request $request)
    {


        $request->validate([
            'email'=> 'required|email',
            'password' => 'required|min:6|max:16',
        ]);

        $patient = Patients::where('email', '=', $request->email )->first();
        if($patient){

            if(Hash::check($request->password, $patient->password))
            {
                $request->session()->put('LoggedPatient', $patient);
                return redirect('patient/dashboard');

            }else{
                return back()->with('message', 'Invalid Credentials');;
            }

        }else{
            return back()->with('message', 'No account found for this email');

        }

    }

    public  function patientBookinglogin(Request $request){

        $request->validate([
            'email'=> 'required|email',
            'password' => 'required|min:6|max:16',
        ]);

        $patient = Patients::where('email', '=', $request->email )->first();
        if($patient){

            if(Hash::check($request->password, $patient->password))
            {
                $request->session()->put('LoggedPatient', $patient);
                return back()->with('loginSuccess', 'Success Credentials');

            }else{
                return back()->with('invalid', 'Invalid Credentials');;
            }

        }else{
            return back()->with('invalid', 'No account found for this email');

        }
    }

    public function logout()
    {
        if(session()->has('LoggedPatient'))
        {
            session()->pull('LoggedPatient');
            return redirect('patient/login');
        }
        else{
            return redirect('patient/login');
        }
    }
}
