<div>
   
    <div class="container">
        <form wire:submit.prevent='searching' class=" text-center container">
            <input type="month" class="form-control" wire:model="selectedMonth" wire:change="render">
        </form>
    </div>

   <div class="container mt-3">
    <div class="row justify-content-evenly">
        @foreach ($employers as $employer)
            <div class="col-5 border shadow card m-2 py-2">
                <div class="text-center">
                    <p>{{ $employer->name }}</p>
                </div>
                <div class="text-center">
                    <p>{{ $employer->tasks->count() }}</p>
                </div>
            </div>
        @endforeach
    </div>
   </div>
 
<hr>

    <div class="container">
        @if($selectedMonth && count($employerTasks))
        <h6 class="text-center">Employer Tasks in {{ Carbon\Carbon::parse($selectedMonth)->format('F Y') }}</h6>
        <ul class="">
            @foreach($employerTasks as $employer)
                <li class="border my-2 text-center py-2" style="list-style-type: none;border-radius:20px">
                    {{ $employer->name }} => {{ $employer->tasks_count }} tasks
                </li>
            @endforeach
        </ul>

        {{-- <div class="container">
            <div class="row">
                @foreach($employerTasks as $employer)
                <div class="col-5 border shadow card m-2 py-2">
                    <div class="text-center">
                        <p>{{ $employer->name }}</p>
                    </div>
                    <div class="text-center">
                        <p>{{ $employer->tasks->count() }}</p>
                    </div>
                </div>
            @endforeach
            </div>
        </div> --}}
    @elseif($selectedMonth && empty($employerTasks))
        <p>No tasks found for the selected month.</p>
    @endif
    </div>
    
</div>
