<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSlots;
use App\Models\Appointment;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('isPatientLogged');
    }

    public function create(Request $request)
    {
        $slot = TimeSlots::find($request->slot_id);

        if ($slot->week_number == 1) {
            $date = Carbon::parse('next monday');
        } else if ($slot->week_number == 2) {
            $date = Carbon::parse('next tuesday');
        } else if ($slot->week_number == 3) {
            $date = Carbon::parse('next Wednesday');
        } else if ($slot->week_number == 4) {
            $date = Carbon::parse('next thursday');
        } else if ($slot->week_number == 5) {
            $date = Carbon::parse('next friday');
        } else if ($slot->week_number == 6) {
            $date = Carbon::parse('next saturday');
        } else if ($slot->week_number == 7) {
            $date = Carbon::parse('next sunday');
        }
        if ($slot->is_available == 1) {


            $patient = $request->session()->get('LoggedPatient');

            $link = uniqid() . '-' . now()->timestamp;

            $appointment = Appointment::Create([
                'doctor_id' => $request->doctor_id,
                'patient_id' => $patient->id,
                'slot_id' => $request->slot_id,
                'appointment_date' => $date,
                'appointment_time' => $slot->slot_start_time,
                'purpose' => 'General',
                'status' => 'Pending',
                'paid_amount' => $request->fee,
                'link' => $link,
            ]);


            if ($appointment) {
                $slot->update([
                    'is_available' => '0'
                ]);
                return view('patient.booking-success')->with([
                    'patient' => $patient,
                    'appointment' => $appointment,
                ]);

            } else {
                return back()->with('fail', 'Failed to  booked appointment');
            }

        } else {
            return 'Appointment Not Confirmed';
        }

    }

}
