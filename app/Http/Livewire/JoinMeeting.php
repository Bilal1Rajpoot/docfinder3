<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Livewire\Component;

class JoinMeeting extends Component
{
    public $appointment;

    public function mount($appointment)
    {
        $this->appointment = $appointment;

    }
    public function isjoin($id)
    {
        $app = Appointment::find($id);
        if($app)
        {
            if($app->is_join == "1")
            {
                $this->appointment = $app;
                $this->dispatchBrowserEvent('name-updated', ['newName' => "Hi"]);
            }
        }

    }

    public function render()
    {
        return view('livewire.join-meeting');
    }



}
