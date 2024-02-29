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
                <h2 class="h3 mb-0">{{ __('words.nonfixed') }} ({{ $data->count() }})</h2>
            </div>
       
            <div class="container py-4">
                <livewire:cars /> 
            </div>

        </div>
    </div>

    @include('Emart.include.nav_bottom')
    @include('Emart.include.script')
</body>

</html>
