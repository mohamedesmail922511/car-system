<div class="nav-bottom bg-white pt-2" style="position:fixed;bottom:0px;width:100%;height:60px">
    <div class="container d-flex justify-content-between align-items-center">

        <a href="{{ route('setting.service') }}" class="d-flex flex-column justify-content-center align-items-center">
            <img src="/panel/src/images/setting.png" width="22px" alt="">
            <p style="font-size: 10px" class="mt-1">{{ __('words.setting') }}</p>
        </a>

        <a href="{{ route('add.service') }}" class="d-flex flex-column justify-content-center align-items-center" data-toggle="modal" data-target="#exampleModal">
            <img src="/panel/src/images/plus_1.png" width="22px" alt="">
            <p style="font-size: 10px" class="mt-1">{{ __('words.addservice') }}</p>
        </a>

        <a href="{{ route('show.workers') }}" class="d-flex flex-column justify-content-center align-items-center">
            <img src="/panel/src/images/group.png" width="22px" alt="">
            <p style="font-size: 10px" class="mt-1">{{ __('words.employers') }}</p>
        </a>

        <a href="{{ route('show.all.tasks') }}" class="d-flex flex-column justify-content-center align-items-center">
            <img src="/panel/src/images/to-do-list.png" width="22px" alt="">
            <p style="font-size: 10px" class="mt-1">{{ __('words.tasks') }}</p>
        </a>

    </div>
</div>