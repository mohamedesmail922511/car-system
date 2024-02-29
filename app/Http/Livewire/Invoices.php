<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Livewire\Component;

class Invoices extends Component
{
    public $phone;
    public $car;
    public $price;
    public $cartype;
    public $data;



     public function mount(){
        $this->data = Invoice::orderBy('id', 'desc')->get();
    }




    public function searching(){
        $query = Invoice::query();
        if($this->phone){
            $query->where('phone', 'like', '%' . $this->phone . '%');
        }
        if($this->car){
            $query->where('car_no', 'like', '%' . $this->car . '%');
        }
        if($this->cartype){
            $query->where('car_type', 'like', '%' . $this->cartype . '%');
        }
        if($this->price){
            $query->where('price', 'like', '%' . $this->price . '%');
        }
        $this->data = $query->get();
    }


    public function render()
    {
        $this->searching();
        return view('livewire.invoices');
    }

 
}
