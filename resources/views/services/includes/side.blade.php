<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-3 rotate-caret shadow"
    id="sidenav-main" style="z-index: 100000000">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer bg-primary  position-absolute start-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav">
        </i>
        <a class="navbar-brand m-0" href="{{ route('emart.index') }}" target="_blank">
            <img src="/dashboard/logo.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="me-1 font-weight-bold">Alkhtaboot</span>
        </a>
    </div>

    <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse px-0 w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('services.page') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-chevron-left text-dark fs-6"></i>
                    </div>
                    <span class="nav-link-text me-1"> {{ __('words.control') }} </span>
                </a>
            </li>


        


            <li class="nav-item">
                <a class="nav-link" href="{{ route('add.service') }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-chevron-left text-dark fs-6"></i>
                    </div>
                    <span class="nav-link-text me-1"> {{ __('words.addservice') }}  </span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{ route('add.service') }}" data-bs-toggle="modal" data-bs-target="#workerModal">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-chevron-left text-dark fs-6"></i>
                    </div>
                    <span class="nav-link-text me-1"> {{ __('words.addemplyer') }}  </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('setting.service') }}" >
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-chevron-left text-dark fs-6"></i>
                    </div>
                    <span class="nav-link-text me-1">{{ __('words.editservice') }}</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('statistics.page') }}" >
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-chevron-left text-dark fs-6"></i>
                    </div>
                    <span class="nav-link-text me-1">{{ __('words.statistics') }}</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('emart.index') }}" >
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center ms-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-chevron-left text-dark fs-6"></i>
                    </div>
                    <span class="nav-link-text me-1">{{ __('words.accountant') }}</span>
                </a>
            </li>

      

        
        </ul>
    </div>

</aside>
