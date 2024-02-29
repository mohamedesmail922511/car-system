<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class Clients extends Component
{

 
    public $phone;
    public $car;
    public $clients;

    public function mount(){
        $this->clients = Client::all();
    }

    public function searching(){
        $query = Client::query();
        if($this->phone){
            $query->where('phone', 'like', '%' . $this->phone . '%');
        }
        if($this->car){
            $query->where('car_no', 'like', '%' . $this->car . '%');
        }
        $this->clients = $query->get();
    }


    public function render()
    {
        $this->searching();
        return view('livewire.clients');
    }






}
