<!DOCTYPE html>
<html>

<head>
    @include('Emart.include.style')
</head>

<body>
    @include('Emart.include.header')
    @include('Emart.include.right-sidebar')
    @include('Emart.include.left-sidebar')

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="container pt-3">
                <h6 class="text-center">{{ __('words.tasks') }}</h6>
                <hr>
                <div class="row justify-content-start mt-3">

                    @if (count($tasks) <= 0)
                        <p class="text-center w-100">{{ __('words.notasks') }}</p>
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
    </div>

    @include('services.includes.back')
    @include('Emart.include.script')
</body>

</html>
