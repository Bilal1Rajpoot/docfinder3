<?php

namespace App\Http\Livewire\Doctor\Form;

use Illuminate\Support\Facades\DB;
use Livewire\Component;


class Prescription extends Component
{
    public $doctor_id;
    public $patient_id;
    public $appointment_id;
    public $name_of_dose;
    public $quantity;
    public $description;
    public $prescriptions;

    public function mount($appointment)
    {
        $this->doctor_id = $appointment->doctor_id;
        $this->patient_id = $appointment->patient_id;
        $this->appointment_id = $appointment->id;

        $this->name_of_dose = '';
        $this->quantity = '';
        $this->description = '';
        $this->prescriptions = DB::table('prescriptions')->where('appointment_id', '=', $this->appointment_id)->get();

    }

    protected $rules = [
        'name_of_dose' => 'required',
        'description' => 'required',
    ];


    public function render()
    {
        return view('livewire.doctor.form.prescription');
    }

    public function submit()
    {
        $this->validate();

        $prescription = new \App\Models\Prescription();

        $prescription->name_of_dose = $this->name_of_dose;
        $prescription->quantity = $this->quantity;
        $prescription->description = $this->description;
        $prescription->doctor_id = $this->doctor_id;
        $prescription->patient_id = $this->patient_id;
        $prescription->appointment_id = $this->appointment_id;
        $prescription->save();

        $this->prescriptions = DB::table('prescriptions')->where('appointment_id', '=', $this->appointment_id)->get();
        $this->reset(['name_of_dose', 'quantity', 'description']);

    }

    public function deletePrescription($id)
    {
        $prescription = \App\Models\Prescription::find($id);

        if($prescription->delete())
            $this->prescriptions = DB::table('prescriptions')->where('appointment_id', '=', $this->appointment_id)->get();
    }


}
