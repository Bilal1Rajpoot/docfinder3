<?php

namespace App\Http\Livewire\Admin;

use App\Models\Doctor;
use Livewire\Component;

class VerifyDoctor extends Component
{
    public $doctors;
    public $search;

    public function mount()
    {
        $this->doctors= Doctor::where('is_verified', '=', '0')->get();
        $this->search= '';
    }


    public function render()
    {
        return view('livewire.admin.verify-doctor');
    }

    public function submit()
    {
        if($this->search == '')
        {
            $this->doctors= Doctor::where('is_verified', '=', '0')->get();
        }
        else
            $this->doctors = Doctor::where('first_name', 'like', '%' . $this->search . '%')->orWhere('last_name', 'like', '%' . $this->search . '%')->orWhere('id',  '=' , $this->search )->get();



    }

    public function verify($id)
    {
        $doctor= Doctor::find($id);
        if($doctor)
        {
            $doctor->is_verified = '1';
            $doctor->save();
            $this->doctors = Doctor::where('is_verified', '=', '0')->get();
            $message = "Dr.".$doctor->first_name." ".$doctor->last_name." Verified Successfully";
            return back()->with('message',  $message);
        }
    }


}
