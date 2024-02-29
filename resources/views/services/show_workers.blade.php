

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
            <div class="title pb-20">
                <h2 class="h3 mb-0">{{ __('words.workershow') }}</h2>
            </div>

            <div class="container">
                <div class="row justify-content-start mt-5">
                    <div class="col-12 border bg-dark py-3 px-3 my-2 shadow"style="border-radius: 10px" >
                        <div class="row" >
                            <div class="col-6 d-flex  align-items-center">
                                <a href="" class="text-white" style="font-size: 12px">{{ __('words.name') }}</a>
                            </div>
                            <div class="col-3 d-flex  align-items-center">
                                <span class="text-white "
                                    style="font-size: 12px">{{ __('words.taskscount') }}</span>
                            </div>
                            <div class="col-2 d-flex  align-items-center justify-content-center">
                                <a href="" style="font-size: 12px"
                                    class="text-white mx-1">
                                     {{ __('words.tasksshow') }} </a>
                            </div>
                        </div>
                    </div>
    
                    @foreach ($employers as $employer)
                        <div class="col-12 border py-3 bg-white px-3 my-2" style="border-radius: 20px">
                            <div class="row">
                                <div class="col-6 d-flex  align-items-center">
                                    <a href="" class="" style="font-size: 12px">{{ $employer->name }}</a>
                                </div>
                                <div class="col-3 d-flex align-items-center">
                                    <span class="w-100 text-center"
                                        style="font-size: 12px">{{ $employer->tasks->count() }}</span>
                                </div>
                                <div class="col-2 d-flex  align-items-center justify-content-center">
                                    <a href="{{ route('employer.tasks', $employer) }}" style="font-size: 12px"
                                        class="text-primary mx-1">
                                        <i class="icon-copy bi bi-eye"></i> </a>
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
