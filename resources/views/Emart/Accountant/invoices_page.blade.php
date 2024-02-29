<!DOCTYPE html>
<html>

<head>
    @include('Emart.include.style')
    @livewireStyles
</head>

<body>
    @include('Emart.include.header')
    @include('Emart.include.right-sidebar')
    @include('Emart.include.left-sidebar')

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="container-fluid py-4">
                <h6 class="text-center"> {{ __('words.invoices') }} ({{ $data->count() }})</h6>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-5 col-md-5 d-flex justify-content-evenly align-items-center m-2 invoice-count">
                            <p class="mx-2" style="width: 96%; white-space: nowrap;"> الفواتير المدفوعة</p>
                            <p class="mx-2">{{ $paid->count() }}</p>
                        </div>
                        <div class="col-5 col-md-5 d-flex justify-content-evenly align-items-center m-2 invoice-count">
                            <p class="mx-2" style="width: 96%; white-space: nowrap;"> الفواتير الغير المدفوعة</p>
                            <p class="mx-2">{{ $nonpaid->count() }}</p>
                        </div>
                    </div>
                    <hr>
                </div>

         
                <livewire:invoices />
           


            </div>

        </div>
    </div>

    @include('Emart.include.nav_bottom')
    @include('Emart.include.script')
    @livewireScripts
</body>

</html>
