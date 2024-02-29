<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class Search extends Component
{
    public $query = '';
    public $results = [];


    public function search()
    {
        // $this->results = Client::where('phone', 'like', '%' . $this->query . '%')
        //                       ->orWhere('car_no', 'like', '%' . $this->query . '%')
        //                       ->get();

        if (!empty($this->query)) {
            $this->results = Client::where('phone', 'like', '%' . $this->query . '%')
                                  ->orWhere('car_no', 'like', '%' . $this->query . '%')
                                  ->get();
        } else {
            $this->results = [];
        }
    
    }

    public function render()
    {
        $this->search();
        return view('livewire.search');
    }
}
