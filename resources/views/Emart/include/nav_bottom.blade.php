<div class="nav-bottom border bg-white py-1 pt-3 shadow-lg" style="position:fixed;bottom:0px;width:100%">
    <div class="container d-flex justify-content-between align-items-center ">

        <a href="{{ route('emart.index') }}" class="d-flex flex-column justify-content-center align-items-center">
            <img src="/panel/src/images/home.png" width="22px" alt="">
            <p style="font-size: 11px" class="mt-1">{{ __('words.home') }}</p>
        </a>

        <a href="{{ route('clients.page') }}" class="d-flex flex-column justify-content-center align-items-center" >
            <img src="/panel/src/images/group.png" width="22px" alt="">
            <p style="font-size: 11px" class="mt-1">{{ __('words.showclient') }}</p>
        </a>

        <a href="{{ route('invoices.page') }}" class="d-flex flex-column justify-content-center align-items-center" >
            <img src="/panel/src/images/invoice.png" width="22px" alt="">
            <p style="font-size: 11px" class="mt-1">{{ __('words.showinvoices') }}</p>
        </a>

        <a href="{{ route('pdr.page') }}" class="d-flex flex-column justify-content-center align-items-center">
            <img src="/panel/src/images/cars.png" width="22px" alt="">
            <p style="font-size: 11px" class="mt-1">{{ __('words.showcars') }}</p>
        </a>

        <a href="{{ route('worker.page') }}" class="d-flex flex-column justify-content-center align-items-center">
            <img src="/panel/src/images/worker.png" width="22px" alt="">
            <p style="font-size: 11px" class="mt-1">{{ __('words.employers') }}</p>
        </a>

    </div>
</div>