<?php

namespace App\Http\Controllers;



use App\Models\Appointment;
use App\Models\Doctor;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class MeetingController extends Controller
{

    public function meeting(Request $request, $appointmentID)
    {


        if(session()->has('LoggedPatient')){

            $patient = $request->session()->get('LoggedPatient');
            $appointment = Appointment::find($appointmentID);
            return view('patient.meeting')->with([
                'patient' => $patient,
                'appointment' => $appointment,
            ]);
        }
        else{

            if(Auth::user())
            {
                $appointment = Appointment::find($appointmentID);
                if($appointmentID){

                    $appointment->is_join= '1';
                    $appointment->save();

                    $doctor = Doctor::find(Auth::id());
                    return view('meeting')->with([
                        'doctor' => $doctor,
                        'appointment' => $appointment,
                    ]);
                }
                return back()->with('message', 'No appointment Found');
            }
            return "no  login";



        }

    }

    public function startMeeting(Request $request, $appointmentID, $meetingID)
    {


        if(session()->has('LoggedPatient')){

            if(session()->has('LoggedPatient'))
            {
                $appointment = Appointment::find($appointmentID);

                if($appointment){

                    if($appointment->link == $meetingID){
                        return redirect('meeting/'.$appointmentID."#".$appointment->link);
                    }

                }
                return 'no meeting found';


            }
            return redirect('Patient/login')->with('message',  'Please Login');

        }
        else{

            if(Auth::user())
            {
                $appointment = Appointment::find($appointmentID);

                if($appointment){

                    if($appointment->link == $meetingID){
                        return redirect('meeting/'.$appointmentID."#".$appointment->link);
                    }

                }
                return 'no meeting found';


            }
            return redirect('/login')->with('message',  'Please Login');



        }
    }


}
