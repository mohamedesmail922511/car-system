<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Task;
use Livewire\Component;
use App\Models\Employer;

class Statics extends Component
{

    public $employers;
   
    public $selectedMonth;
    // public $taskCount;
    public $employerTasks = [];

    public function mount()
    {
        $this->employers = Employer::with('tasks')->get();
    }

    // public function searching(){
    //     $query = Employer::query();
    //     if($this->month){
    //         $query->where('created_at', '=' , $this->month );
    //     }
      
    //     $this->employers = $query->get();
    // }


    public function render()
    {
        // if ($this->selectedMonth) {
        //     $startDate = Carbon::parse($this->selectedMonth)->startOfMonth();
        //     $endDate = Carbon::parse($this->selectedMonth)->endOfMonth();

        //     $this->taskCount = Task::whereBetween('created_at', [$startDate, $endDate])->count();
        // } else {
        //     $this->taskCount = 0;
        // }
        if ($this->selectedMonth) {
            $startDate = Carbon::parse($this->selectedMonth)->startOfMonth();
            $endDate = Carbon::parse($this->selectedMonth)->endOfMonth();

            $employers = Employer::withCount(['tasks' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }])->get();

            $this->employerTasks = $employers;
        } else {
            $this->employerTasks = [];
        }
        return view('livewire.statics');
    }
}
