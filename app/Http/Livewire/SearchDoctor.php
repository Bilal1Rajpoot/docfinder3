<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use Livewire\Component;

class SearchDoctor extends Component
{
    public $doctors;
    public $search;


    public function updatedQuery()
    {
        $this->doctors = Doctor::where('first_name', 'like', '%' . $this->search . '%')->orWhere('last_name', 'like', '%' . $this->search . '%')->orWhere('user_name', 'like', '%' . $this->search . '%')->orderBy('avg_rating', 'desc')->get();
    }
    public function mount()
    {
        $this->doctors = [];
        $this->search = '';
    }


    public function render()
    {
        return view('livewire.search-doctor');
    }
}
