<?php

namespace App\Http\Livewire\Admin;

use App\Models\Doctor;
use Livewire\Component;

class SearchDoctor extends Component
{
    public $doctors;
    public $search;

    public function mount()
    {
        $this->doctors= Doctor::where('status', '=', 'blocked')->get();
        $this->search= '';
    }
    public function submit()
    {
        if($this->search == '')
        {
            $this->doctors= Doctor::where('status', '=', 'blocked')->get();;
        }
        else
            $this->doctors = Doctor::where('first_name', 'like', '%' . $this->search . '%')->orWhere('last_name', 'like', '%' . $this->search . '%')->orWhere('id',  '=' , $this->search )->get();



    }

    public function render()
    {
        return view('livewire.admin.search-doctor');
    }

    public function blockDoctor($id)
    {
        $doctor= Doctor::find($id);
        if($doctor)
        {
            $doctor->status = 'blocked';
            $doctor->save();
            $this->doctors = Doctor::where('status', '=', 'blocked')->get();
            $message = "Dr.".$doctor->first_name." ".$doctor->last_name." blocked Successfully";
            return back()->with('message',  $message);
        }
    }

    public function unblockDoctor($id)
    {
        $doctor= Doctor::find($id);
        if($doctor)
        {
            $doctor->status = 'active';
            $doctor->save();
            $this->doctors = Doctor::where('status', '=', 'blocked')->get();
            $message = "Dr.".$doctor->first_name." ".$doctor->last_name." unblocked Successfully";
            return back()->with('message',  $message);
        }
    }
}
