<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    @include('Emart.include.style')
</head>

<body class="g-sidenav-show rtl bg-gray-100">
    @include('services.includes.side')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        <!-- Navbar -->
        @include('Emart.include.nav')
        <!-- End Navbar -->
        <div class="container-fluid py-4">

            <h6 class="text-center"> {{ __('words.tasks') }} ({{ $tasks->count() }})</h6>
            <hr>
            <div class="row  mt-3">
                @foreach ($tasks as $task)
                    <div class="col-12 border py-2 px-3 my-2">
                        <div class="row">
                            <div class="col-4 d-flex align-items-center">
                                <a href="" class="text-primary" style="font-size: 12px">{{ $task->task }}</a>
                            </div>

                            <div class="col-3 d-flex align-items-center">
                                <span class="text-primary" style="font-size: 12px">{{ $task->employer->name }}</span>
                            </div>

                            @if ($task->status == 'Accepted')
                                <div class="col-3 d-flex justify-content-center align-items-center">
                                    <span class="text-success" style="font-size: 12px">{{ $task->status }}</span>
                                </div>
                            @else
                                <div class="col-3 d-flex justify-content-center align-items-center">
                                    <span class="text-danger" style="font-size: 12px">{{ $task->status }}</span>
                                </div>
                            @endif

                            <div class="col-1 d-flex align-items-center">
                                <a href="{{ route('delete.task', $task->id) }}" style="font-size: 12px"
                                    class="text-danger mx-1"><i class="fa-solid fa-trash-can"
                                        style="font-size: 12px"></i></a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </main>
    @include('services.includes.back')

    <!--   Core JS Files   -->
    @include('Emart.include.script')
</body>

</html>
