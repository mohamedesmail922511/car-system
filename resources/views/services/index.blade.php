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
            <div class="container-fluid py-4">

                <h6 class="text-center">{{ __('words.services') }}</h6>
                <hr>
                <div class="row justify-content-evenly mt-5">
    
    
                    @foreach ($services as $service)
                        <a href="{{ route('workers.index', $service) }}" class="card m-2 p-2 shadow-sm" style="width:7rem;border-radius:20px">
                            <div class="text-center bg-black my-3 m-auto"
                                style="border-radius:50%;overflow:hidden;width:70px;height:70px">
                                <img src="/services/{{ $service->image }}" width="70px" height="70px" alt="">
                            </div>
                            <h6 style="font-size: 12px" class="text-primary text-center my-2">{{ $service->name }}</h6>
                        </a>
                    @endforeach
                </div>
            </div>
            {{-- service grid end --}}
    
            <!-- Modal -->
            @include('services.includes.service_model')
        </div>
    </div>
    
    @include('services.includes.service_model')
    @if (isset($service_id))
       @include('services.includes.worker_model')
       @include('services.includes.task_model')
    @endif
    @include('services.includes.nav_bottom')
    @include('Emart.include.script')

</body>

</html>
