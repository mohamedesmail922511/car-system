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
            <h6 class="text-center">{{ __('words.editservice') }}</h6>
            <hr>

            <div class="row">
                @foreach ($data as $service)
                    <div class="col-12 border bg-white shadow-sm my-2 py-3" style="border-radius: 10px">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center ">{{ $service->name }}</div>

                            <div class="col-3 d-flex align-items-center">
                                <img src="/services/{{ $service->image }}" width="50x" alt="">
                            </div>

                            <div class="col-3 d-flex align-items-center">
                                <a href="{{ route('edit.service', $service->id) }}" class="text-success mx-1">
                                    
                                    <i class="icon-copy bi bi-pencil-square"></i>
                                </a>


                                <a href="{{ route('delete.service', $service->id) }}" class="text-danger mx-1">
                                  
                                    <i class="icon-copy bi bi-trash fs-2"></i>
                                    </a>
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
