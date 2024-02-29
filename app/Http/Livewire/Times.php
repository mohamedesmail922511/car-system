<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TimeLine;


class Times extends Component
{

    public $data;
    public $phone;
    public $car;

    public function mount(){
        $this->data = TimeLine::all();
    }
    

    public function searching(){
        $query = TimeLine::query();
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
        return view('livewire.times');
    }
}
