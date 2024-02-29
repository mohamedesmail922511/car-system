<div>
    <div class="py-5">

        <div class="text-center">
            <img src="/dashboard/logo.png" width="200px" alt="الاخطبوط لصيانه السيارات">
        </div>
        <div class="container">
            <div class="row justify-content-center m-auto">
                <div class="col-12 col-md-8 my-1">
                    <input type="text" wire:model="query" placeholder="Search..." class="form-control">
                </div>
                <div class="col-12 col-md-3 my-1">
                    <button wire:click="search" class="btn btn-primary w-100">{{ __('words.search') }}</button>
                </div>


            </div>
        </div>

        {{-- <ul>
            @foreach ($results as $result)
                <li>{{ $result->car_no }}</li>
            @endforeach
        </ul> --}}
        <div class="container">
            <div class="row">
                @foreach ($results as $result)
                <div class="col-12 card py-5">
                      <div class="d-flex justify-content-center">
                        <p class="text-center w-50">رقم السيارة</p>
                        <p class="text-center mx-3 w-50">{{ $result->car_no }}</p>
                      </div>
                      <div class="d-flex justify-content-center">
                        <p class="text-center w-50">حالة الاصلاح</p>
                        <p class="text-center mx-3 w-50">{{ $result->car_status}}</p>
                      </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
