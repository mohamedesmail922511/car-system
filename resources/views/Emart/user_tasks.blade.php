<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    @include('Emart.include.style')
</head>

<body class="g-sidenav-show rtl bg-gray-100">
    {{-- @include('Emart.include.side') --}}
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        @include('Emart.include.nav')
        <!-- Navbar -->
        {{-- @include('Emart.include.nav') --}}
        <!-- End Navbar -->
        <div class="container py-4">
            <h5 class="text-center">المهام التي يجب تنفيذها</h5>
            <hr>
            @if (count($tasks) <= 0)
                <p class="text-center">لا توجد مهام مسندة اليك حاليا</p>
            @else
                @foreach ($tasks as $task)
                    <div class="row border my-2 py-2">
                        <div class="col-12">
                            <div class="row d-flex align-items-center">
                                <div class="col-2 d-flex align-items-center">
                                    <a class="text-primary" style="font-size: 12px">{{ $task->car_no }}</a>
                                </div>

                                <div class="col-4">
                                    <a class="text-primary" style="font-size: 12px">{{ $task->task }}</a>
                                </div>
                                <div class="col-3 text-danger">
                                    <a href="#" style="font-size: 12px"
                                        class="give_date text-primary">{{ $task->task_time }}</a>
                                </div>

                                <div class="col-3">
                                    @if ($task->status == 'Not Accepted')
                                        <a href="{{ route('change.task.status', $task->id) }}" class="text-danger"
                                            style="font-size: 12px">{{ $task->status }}</a>
                                    @else
                                        <a href="{{ route('change.task.status', $task->id) }}" style="font-size: 12px"
                                            class="text-success">{{ $task->status }}</a>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-12  mt-2">
                            <div class="row ">
                                <div class="col-6 d-flex  align-items-center ">
                                    <p class="time_remaining  mt-3" style="font-size: 12px"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif


        </div>
    </main>
    <!--   Core JS Files   -->
    @include('Emart.include.script')


 


</body>

</html>



<!DOCTYPE html>
<html>

<head>
    @include('Emart.include.style')
</head>

<body>
    @include('Emart.include.header')
    @include('Emart.include.right-sidebar')
    <div class="mobile-menu-overlay"></div>
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="container py-4">
                <h5 class="text-center">المهام التي يجب تنفيذها</h5>
                <hr>
                @if (count($tasks) <= 0)
                    <p class="text-center">لا توجد مهام مسندة اليك حاليا</p>
                @else
                    @foreach ($tasks as $task)
                        <div class="row border my-2 py-2">
                            <div class="col-12">
                                <div class="row d-flex align-items-center">
                                    <div class="col-2 d-flex align-items-center">
                                        <a class="text-primary" style="font-size: 12px">{{ $task->car_no }}</a>
                                    </div>
    
                                    <div class="col-4">
                                        <a class="text-primary" style="font-size: 12px">{{ $task->task }}</a>
                                    </div>
                                    <div class="col-3 text-danger">
                                        <a href="#" style="font-size: 12px"
                                            class="give_date text-primary">{{ $task->task_time }}</a>
                                    </div>
    
                                    <div class="col-3">
                                        @if ($task->status == 'Not Accepted')
                                            <a href="{{ route('change.task.status', $task->id) }}" class="text-danger"
                                                style="font-size: 12px">{{ $task->status }}</a>
                                        @else
                                            <a href="{{ route('change.task.status', $task->id) }}" style="font-size: 12px"
                                                class="text-success">{{ $task->status }}</a>
                                        @endif
    
                                    </div>
                                </div>
                            </div>
                            <div class="col-12  mt-2">
                                <div class="row ">
                                    <div class="col-6 d-flex  align-items-center ">
                                        <p class="time_remaining  mt-3" style="font-size: 12px"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
    
    
            </div> 
        </div>
    </div>
    @include('Emart.include.script')
</body>

</html>
