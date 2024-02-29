<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class Cars extends Component
{
    public $data;
    public $phone;
    public $car;

    public function mount(){
        $this->data = Client::all();
    }

    public function searching(){
        $query = Client::query();
        if($this->phone){
            $query->where('phone', 'like', '%' . $this->phone . '%');
        }
        if($this->car){
            $query->where('car_no', 'like', '%' . $this->car . '%');
        }
        $this->data = $query->get();
    }


    public function render()
    {
        $this->searching();
        return view('livewire.cars');
    }
}
