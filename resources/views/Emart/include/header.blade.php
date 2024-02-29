<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
        <div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>
        <div class="header-search">
            <form>
                <div class="form-group mb-0">
                    <i class="dw dw-search2 search-icon"></i>
                    <input type="text" class="form-control search-input" placeholder="Search Here" />
                    <div class="dropdown">
                        <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                            <i class="ion-arrow-down-c"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">From</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">To</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text" />
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>

        <div class="user-notification language-switcher">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow " style="font-size: 14px" href="#" role="button" data-toggle="dropdown">
                    {{ LaravelLocalization::getCurrentLocaleNative() }}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="customscroll">
                        <ul>
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" class="dropdown-item border-radius-md"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                        hreflang="{{ $localeCode }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                    <i class="icon-copy dw dw-notification"></i>
                    <span class="badge notification-active"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul>

                            @if (Auth::check())
                                @if (Auth::user()->unreadNotifications->count() === 0)

                                    <ul class="dropdown-menu">
                                        @foreach (Auth::user()->unreadNotifications as $item)
                                            <li>
                                                <a class="dropdown-item border-radius-md" href="javascript:;">

                                                    <p style="font-size: 12px">{{ $item->data['car_no'] }} لديك مهمة علي
                                                        سيارة
                                                        رقم
                                                        {{ $item->data['user_id'] }} </p>
                                                    <hr>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            @else
                                <script>
                                    window.location = "{{ route('login') }}";
                                </script>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>



        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="/panel/src/images/logo.png" alt="" />
                    </span>
                    <span class="user-name">{{ Auth::user()->name }}</span>
                </a>

                @if (Auth::check())
                    @if (Auth::user()->name === null)
                        <script>
                            window.location = "{{ route('login') }}";
                        </script>
                    @endif

                @endif


                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    {{-- <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                    <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
                    <a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Log Out</a> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                        {{ __('الخروج من الحساب') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <div class="github-link">
            <a href="https://github.com/dropways/deskapp" target="_blank"><img src="vendors/images/github.svg"
                    alt="" /></a>
        </div>
    </div>
</div>
