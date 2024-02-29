<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    @include('Emart.include.style')
</head>

<body class="g-sidenav-show rtl bg-gray-100">
    @include('services.includes.side')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        @include('Emart.include.nav')
        <div class="container-fluid py-4">
            <div class="container pt-3">
                <h6 class="text-center">{{ __('words.tasks') }}</h6>
                <hr>
                <div class="row justify-content-start mt-3">

                    @if (count($tasks) <= 0)
                        <p class="text-center">{{ __('words.notasks') }}</p>
                    @endif

                    @foreach ($tasks as $task)
                        <div class="col-12 border py-2 px-3 my-2">
                            <div class="row">

                                <div class="col-4 d-flex  align-items-center">
                                    <a href="" class="text-primary"
                                        style="font-size: 12px">{{ $task->task }}</a>
                                </div>

                                <div class="col-3 d-flex align-items-center">
                                    <span class="text-primary" style="font-size: 12px">{{ $task->car_no }}</span>
                                </div>

                                <div class="col-3 d-flex align-items-center">

                                    @if ($task->status == 'Not Accepted')
                                        <span class="text-danger"
                                            style="white-space: nowrap;font-size:12px">{{ $task->status }}</span>
                                    @else
                                        <span class="text-success"
                                            style="white-space: nowrap;font-size:12px">{{ $task->status }}</span>
                                    @endif
                                </div>




                                <div class="col-1 d-flex align-items-center">
                                    <a href="{{ route('delete.task', $task->id) }}" class="text-danger mx-1"><i
                                            class="fa-solid fa-trash-can" style="font-size: 12px"></i></a>
                                </div>

                                <div class="col-6">
                                    <p style="font-size: 12px" class="text-danger give_date">
                                        {{ $task->task_time }}</p>
                                </div>
                                <div class="col-6">
                                    <p class="time_remaining"></p>
                                </div>
                            </div>





                        </div>
                    @endforeach

                </div>
            </div>


        </div>
   
        @include('services.includes.service_model')

        @include('services.includes.worker_model')
        {{-- @include('services.includes.task_model') --}}

        </div>
    </main>


    {{-- nav bottom bar end --}}
    @include('services.includes.back')

    <!--   Core JS Files   -->
    @include('Emart.include.script')

   

</body>

</html>
