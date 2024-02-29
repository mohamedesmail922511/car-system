<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="/panel/src/images/logo.png" width="70px" alt="" class="dark-logo" />
            <img src="/panel/src/images/logo.png" width="70px" alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>

    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-house"></span><span class="mtext">{{ __('words.home') }}</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('emart.index') }}">{{ __('words.home') }}</a></li>
                        <li><a href="{{ route('emart.statistics') }}">{{ __('words.statistics') }}</a></li>
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-textarea-resize"></span><span
                            class="mtext">{{ __('words.callcenter') }}</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('add.client.page') }}">{{ __('words.addclient') }}</a></li>
                        <li> <a href="{{ route('clients.page') }}">{{ __('words.showclient') }}</a></li>
                        <li> <a href="{{ route('pdr.page') }}">{{ __('words.showcars') }}</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-table"></span><span class="mtext">{{ __('words.services') }}</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('service.index') }}">{{ __('words.services') }}</a></li>
                        <li><a href="#" data-toggle="modal"
                                data-target="#exampleModal">{{ __('words.addservice') }}</a></li>
                        <li><a href="#" data-toggle="modal"
                                data-target="#workerModal">{{ __('words.addemplyer') }} </a></li>
                        <li><a href="{{ route('setting.service') }}">{{ __('words.editservice') }} </a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-archive"></span><span class="mtext">
                            {{ __('words.accountant') }}</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('invoice.page') }}">{{ __('words.createinvoice') }}</a></li>
                        <li><a href="{{ route('invoices.page') }}">{{ __('words.showinvoices') }}</a></li>
                        <li><a href="{{ route('purches.page') }}">{{ __('words.dailypurchases') }}</a></li>
                        <li><a href="{{ route('check.page') }}">{{ __('words.checks') }}</a></li>
                        <li><a href="{{ route('rent.page') }}">{{ __('words.rent') }}</a></li>
                        <li><a href="{{ route('worker.page') }}">{{ __('words.employers') }}</a></li>
                        <li><a href="{{ route('reports.page') }}">{{ __('words.employersreports') }}</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-archive"></span><span class="mtext"> {{ __('words.branches') }}</span>
                    </a>
                    <ul class="submenu">


                        @if (count($branches) > 0)
                            @foreach ($branches as $branch)
                                <li><a href="{{ route('branch.invoice', $branch->id) }}">{{ $branch->branch }}</a></li>
                            @endforeach
                        @else
                            <li><a href="#">No Branches</a></li>
                        @endif



                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
