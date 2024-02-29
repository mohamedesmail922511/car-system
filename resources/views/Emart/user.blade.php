<!DOCTYPE html>
<html>
<head>
    @include('Emart.include.style')
</head>
<body>
    
    <header class="bg-white shadow px-5 d-flex justify-content-end">
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
    </header>
    <div class="error-page d-flex align-items-center flex-wrap justify-content-center pd-20">
        <div class="pd-10">
            <div class="error-page-wrap text-center">
                <h1>403</h1>
                <h3>Error: 403 Forbidden</h3>
                <p>
                    Sorry, access to this resource on the server is denied.<br />Either
                    check the URL
                </p>
                <div class="pt-20 mx-auto max-width-200">

                </div>
            </div>
        </div>
    </div>
    @include('Emart.include.script')
</body>

</html>
