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
                <h2 class="h3 mb-0">Overview</h2>
            </div>
            <div class="row justify-content-center">


                <div class="col-10 col-md-5 border  p-0 m-2">
                    <h6 class="bg-body text-center py-4">{{ __('words.clientsno') }}</h6>
                    <h6 class="bg-light py-4 text-center">{{ $clients->count() }}</h6>
                </div>

                <div class="col-10 col-md-5 border shadow p-0 m-2">
                    <h6 class="bg-body text-center py-4">{{ __('words.invoicesno') }}</h6>
                    <h6 class="bg-light py-4 text-center">{{ $invoices->count() }}</h6>
                </div>

                <div class="col-10 col-md-5 border shadow p-0 m-2">
                    <h6 class="bg-body text-center py-4">{{ __('words.carsno') }}</h6>
                    <h6 class="bg-light py-4 text-center">{{ $cars->count() }}</h6>
                </div>

                <div class="col-10 col-md-5 border shadow p-0 m-2">
                    <h6 class="bg-body text-center py-4"> {{ __('words.nonfixed') }} </h6>
                    <h6 class="bg-light py-4 text-center">{{ $nonfixedcars->count() }}</h6>
                </div>

                <div class="col-10 col-md-5 border shadow p-0 m-2">
                    <h6 class="bg-body text-center py-4">{{ __('words.fixed') }} </h6>
                    <h6 class="bg-light py-4 text-center">{{ $fixedcars->count() }}</h6>
                </div>

                <div class="col-10 col-md-5 border shadow p-0 m-2">
                    <h6 class="bg-body text-center py-4">{{ __('words.ckecksno') }} </h6>
                    <h6 class="bg-light py-4 text-center">{{ $checks->count() }}</h6>
                </div>

            </div>

        </div>
    </div>

    @include('Emart.include.nav_bottom')
    @include('Emart.include.script')
</body>

</html>
