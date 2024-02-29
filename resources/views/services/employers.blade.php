{{-- <!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    @include('Emart.include.style')
</head>

<body class="g-sidenav-show rtl bg-gray-100">
    @include('services.includes.side')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    
        @include('Emart.include.nav')
     
        <div class="container py-4">
            <h6 class="text-center"> {{ __('words.serviceworkers') }} {{ $service->name }}</h6>
            <hr>
            <div class="row justify-content-start mt-5">
                @if (count($employers) <= 0)
                    <p class="text-center text-dark">لا يوجد موظفين لهذه الخدمه</p>
                @else
                    @foreach ($employers as $employer)
                        <div class="col-12 border py-2 px-3 my-2" style="border-radius: 15px">
                            <div class="row">

                                <div class="col-9 d-flex nowrap align-items-center">
                                    <a href="{{ route('employer.tasks', $employer) }}"
                                        class="text-primary">{{ $employer->name }}
                                    </a>
                                </div>

                                <div class="col-3 d-flex nowrap align-items-center">
                                    <a href="{{ route('add.task', $employer->id) }}" class="text-success mx-1 p-2"
                                        data-bs-target="#taskModal" data-bs-toggle="modal"><i
                                            class="fa-solid fa-plus fs-5"></i></a>

                                    <a href="{{ route('delete.employer', $employer->id) }}" class="text-danger mx-1"><i
                                            class="fa-solid fa-trash-can fs-5"></i></a>
                                </div>
                            </div>

                        </div>
                    @endforeach
                    @include('services.includes.task_model')

                @endif
            </div>
        </div>
     

        @include('services.includes.worker_model')
    </main>


    <div class="nav-bottom bg-body py-2" style="position:fixed;bottom:0px;width:100%">
        <div class="container d-flex justify-content-between align-items-center">


            <a href="" class="d-flex flex-column justify-content-center align-items-center"
                data-bs-toggle="modal" data-bs-target="#workerModal">
                <img src="/dashboard/images/worker.png" width="20px" alt="">
                <p style="font-size: 10px">{{ __('words.addemplyer') }}</p>
            </a>



            <a href="{{ route('show.workers') }}" class="d-flex flex-column justify-content-center align-items-center">
                <img src="/dashboard/images/group.png" width="20px" alt="">
                <p style="font-size: 10px" class="mt-1">{{ __('words.employers') }}</p>
            </a>

            <a href="{{ route('show.all.tasks') }}"
                class="d-flex flex-column justify-content-center align-items-center">
                <img src="/dashboard/images/to-do-list.png" width="20px" alt="">
                <p style="font-size: 10px" class="mt-1">{{ __('words.tasks') }}</p>
            </a>

            <a href="{{ route('service.index') }}"
                class="d-flex flex-column justify-content-center align-items-center">
                <img src="/dashboard/images/home.png" width="20px" alt="">
                <p style="font-size: 10px" class="mt-1">{{ __('words.home') }}</p>
            </a>


        </div>
    </div>


    @include('Emart.include.script')
</body>

</html>
 --}}





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
       
            <div class="container py-4">
                <h6 class="text-center"> {{ __('words.serviceworkers') }} {{ $service->name }}</h6>
                <hr>
                <div class="row justify-content-start mt-5">
                    @if (count($employers) <= 0)
                        <p class="text-center text-dark w-100">لا يوجد موظفين لهذه الخدمه</p>
                    @else
                        @foreach ($employers as $employer)
                            <div class="col-12 border py-2 px-3 my-2 shadow-sm bg-white" style="border-radius: 15px">
                                <div class="row">

                                    <div class="col-9 d-flex nowrap align-items-center">
                                        <a href="{{ route('employer.tasks', $employer) }}"
                                            class="text-primary">{{ $employer->name }}
                                        </a>
                                    </div>

                                    <div class="col-3 d-flex nowrap align-items-center">
                                        <a href="{{ route('add.task', $employer->id) }}" class="text-success mx-1 p-2"
                                            data-target="#taskModal" data-toggle="modal">

                                            <i class="icon-copy bi bi-plus-circle-dotted fs-4"></i>

                                        </a>

                                        <a href="{{ route('delete.employer', $employer->id) }}"
                                            class="text-danger mx-1">

                                            <i class="icon-copy bi bi-trash-fill fs-4"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                        @include('services.includes.task_model')

                    @endif
                </div>
            </div>
            <!-- Button trigger modal -->

            @include('services.includes.worker_model')

        </div>
    </div>

    {{-- nav bottom start --}}
    <div class="nav-bottom bg-white py-2" style="position:fixed;bottom:0px;width:100%">
        <div class="container d-flex justify-content-between align-items-center px-4">


            <a href="" class="d-flex flex-column justify-content-center align-items-center"
                data-toggle="modal" data-target="#workerModal">
                <img src="/dashboard/images/worker.png" width="20px" alt="">
                <p style="font-size: 10px">{{ __('words.addemplyer') }}</p>
            </a>



            <a href="{{ route('show.workers') }}" class="d-flex flex-column justify-content-center align-items-center">
                <img src="/dashboard/images/group.png" width="20px" alt="">
                <p style="font-size: 10px" class="mt-1">{{ __('words.employers') }}</p>
            </a>

            <a href="{{ route('show.all.tasks') }}"
                class="d-flex flex-column justify-content-center align-items-center">
                <img src="/dashboard/images/to-do-list.png" width="20px" alt="">
                <p style="font-size: 10px" class="mt-1">{{ __('words.tasks') }}</p>
            </a>

            <a href="{{ route('service.index') }}"
                class="d-flex flex-column justify-content-center align-items-center">
                <img src="/dashboard/images/home.png" width="20px" alt="">
                <p style="font-size: 10px" class="mt-1">{{ __('words.home') }}</p>
            </a>


        </div>
    </div>
    {{-- nav bottom end --}}

    @include('Emart.include.script')
</body>

</html>
