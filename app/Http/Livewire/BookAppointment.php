<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BookAppointment extends Component
{
    public function render()
    {
        return view('livewire.book-appointment');
    }
    public function show()
    {
        $this->dispatchBrowserEvent('show');
    }
    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->user_id) {
            $user = User::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();

        }
    }
}
