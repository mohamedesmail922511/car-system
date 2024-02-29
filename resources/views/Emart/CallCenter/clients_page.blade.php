{{-- <!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    @include('Emart.include.style')
    @livewireStyles
</head>

<body class="g-sidenav-show rtl bg-gray-100">
    @include('Emart.include.side')
    <main class="main-content position-relative  h-100 mt-1 border-radius-lg">
        @include('Emart.include.nav')
        <div class="container py-4">
            <h6 class="text-center"> {{ __('words.clientsno') }} ({{ $clients->count() }})</h6>
            <hr>
        </div>
        <div class="container">
            <livewire:clients />  
        </div>
    </main>
    @include('Emart.include.nav_bottom')
    
    @include('Emart.include.script')
    @livewireScripts
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
            <div class="title pb-20">
                <h2 class="h3 mb-0">{{ __('words.showclient') }}</h2>
            </div>
    
            <div class="container-fluid">
                <livewire:clients />  
            </div>
        
        </div>
    </div>

    @include('Emart.include.nav_bottom')
    @include('Emart.include.script')
</body>

</html>



