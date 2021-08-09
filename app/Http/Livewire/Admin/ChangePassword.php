<?php

namespace App\Http\Livewire\Admin;

use http\Env\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $old_password;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'old_password' => 'required|min:6',
        'password' => 'required|min:6|confirmed',

    ];

    public function mount()
    {
        $this->old_password = '';
        $this->password = '';
        $this->password_confirmation = '';
    }
    public function render()
    {
        return view('livewire.admin.change-password');
    }

    public function submit()
    {
        $this->validate();

        $patient = session()->get('LoggedAdmin');

        if (!(Hash::check($this->password, $patient->password))) {
            if (Hash::check($this->old_password, $patient->password)) {
                $patient->password = Hash::make($this->password);
                $patient->save();
                $this->reset('password');
                $this->reset('password_confirmation');
                $this->reset('old_password');

                return back()->with('message', 'Password change Successfully');
            } else
            {
                $this->reset('password');
                $this->reset('password_confirmation');
                $this->reset('old_password');
                return back()->with('message', 'Invalid Old Password');
            }

        } else {
            $this->reset('password');
            $this->reset('password_confirmation');
            return back()->with('message', 'New password must be different from old password');
        }


    }
}
