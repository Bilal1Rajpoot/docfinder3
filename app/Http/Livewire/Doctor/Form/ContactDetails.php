<?php

namespace App\Http\Livewire\Doctor\Form;

use App\Models\Address;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use PhpParser\Comment\Doc;

class ContactDetails extends Component
{
    public $address_line_1;
    public $address_line_2;
    public $city;
    public $state;
    public $country;
    public $postal_code;
    public $address;

    public function render()
    {
        return view('livewire.doctor.form.contact-details');
    }

    public function mount($address)
    {
        $this->address = $address;

        $this->address_line_1 = $this->address->address_line_1;
        $this->address_line_2 = $this->address->address_line_2;
        $this->city = $this->address->city;
        $this->state = $this->address->state;
        $this->country = $this->address->country;
        $this->postal_code = $this->address->postal_code;

    }

    public function submit()
    {
        $doctor = Doctor::find(Auth::id());


        $user = Doctor::with('address')->findOrFail($doctor->id);

        if ($user->address == null) {
            $address = new Address();
            $address->address_line_1 = $this->address_line_1;
            $address->address_line_2 = $this->address_line_2;
            $address->city = $this->city;
            $address->state = $this->state;
            $address->country = $this->country;
            $address->postal_code = $this->postal_code;
            $user->address()->save($address);

        } else {
            $user->address()->update([
                'address_line_1' => $this->address_line_1,
                'address_line_2' => $this->address_line_2,
                'city' => $this->city,
                'state' => $this->state,
                'country' => $this->country,
                'postal_code' => $this->postal_code,
            ]);
        }

        return back()->with('message', 'Contact Information Saved Successfully');
    }


}
