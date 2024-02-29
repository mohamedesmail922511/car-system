<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    @include('Emart.include.style')
    @livewireStyles
</head>

<body class="g-sidenav-show rtl bg-gray-100">
    @include('Emart.include.side')
    <main class="main-content position-relative  h-100 mt-1 border-radius-lg overflow-hidden">
        <!-- Navbar -->
        @include('Emart.include.nav')
        <!-- End Navbar -->
        <div class="container py-4">
            @if (session()->has('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p class="text-center fs-6 text-white">{{ session()->get('msg') }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                            class="fa-solid fa-circle-xmark fs-2"></i></button>
                </div>
            @endif
            <h5 class="text-center">{{ __('words.timeline') }}</h5>
            <hr>
            <form action="{{ route('add.timeline') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label>{{ __('words.date') }}</label>
                        <input type="date" class="form-control" name="date">
                    </div>
                    <div class="col-md-4">
                        <label>{{ __('words.name') }}</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-4">
                        <label> {{ __('words.phone') }}</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="col-md-4">
                        <label>{{ __('words.carno') }}</label>
                        <input type="text" class="form-control" name="car_no">
                    </div>
                    <div class="col-md-4">
                        <label>{{ __('words.cartype') }}</label>
                        <input type="text" class="form-control" name="car_type">
                    </div>
                    <div class="col-md-12 mt-4 text-center">
                        <button class="btn btn-primary w-50" type="submit">{{ __('words.timeline') }}</button>
                    </div>
                </div>
            </form>

            <hr>
            <h6 class="text-center">كل المواعيد</h6>

            <livewire:times />

        </div>
    </main>
    @include('Emart.include.nav_bottom')
    <!--   Core JS Files   -->
    @include('Emart.include.script')
    @livewireScripts
</body>

</html>
