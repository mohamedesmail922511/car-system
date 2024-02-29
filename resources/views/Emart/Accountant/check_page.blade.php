

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
                <h2 class="h3 mb-0">{{ __('words.addcheck') }}</h2>
            </div>
          
            <div class="container-fluid py-4">
                @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p class="text-center fs-6 text-white">{{ session()->get('msg') }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </div>
                @endif
       
                <form action="{{ route('add.check') }}" method="post">
                    @csrf
                    <div class="row">
    
                        <div class="col-md-4">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.Issuer') }}</label>
                            <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="esdar">
                        </div>
    
                        <div class="col-md-4">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.amount') }}</label>
                            <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="value">
                        </div>
    
                        <div class="col-md-4">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.Statement') }}</label>
                            <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="title">
                        </div>
    
                        <div class="col-md-4">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.checkno') }}</label>
                            <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="number">
                        </div>
    
                        <div class="col-md-4">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.duedate') }}</label>
                            <input type="date" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="date">
                        </div>
                        <div class="col-md-4">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.Credit') }}</label>
                            <input type="text" class="form-control" name="name">
                        </div>
    
    
    
                        <div class="col-md-12 mt-4 text-center">
                            <button type="submit" class="btn btn-primary w-25">{{ __('words.add') }}</button>
                        </div>
                    </div>
                </form>
    
                <hr>
                <h5 class="text-center">{{ __('words.checks') }}</h5>
    
                <div class="table-responsive">
                    <table class="table table-striped table-hover borded">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">جهة الاصدار	</th>
                                <th scope="col" class="text-center">قيمة الشيك</th>
                                <th scope="col" class="text-center">البيان</th>
                                <th scope="col" class="text-center">رقم الشيك</th>
                                <th scope="col" class="text-center">تاريخ الاستحقاق	</th>
                                <th scope="col" class="text-center">دائن</th>
                                <th scope="col" class="text-center">الوقت المتبقي</th>
                                <th scope="col" class="text-center">الحالة</th>
                                <th scope="col" class="text-center">الخيارات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td class="text-center">{{ $data->esdar }}</td>
                                    <td class="text-center">{{ $data->value }}</td>
                                    <td class="text-center">{{ $data->title }}</td>
                                    <td class="text-center">{{ $data->number }}</td>
                                    <td class="text-center deliveryـdate_check">{{ $data->date }}</td>
                                    <td class="text-center">{{ $data->name }}</td>
                                    <td class="text-center time_remaining_check"></td>
                                    @if($data->status == 'تم الدفع')
                                    <td class="text-center"><a href="#" class="btn btn-success">{{ $data->status }}</a></td>
                                    @else
                                    <td class="text-center"><a href="{{ route('change.status',$data->id) }}" class="btn btn-danger">{{ $data->status }}</a></td>
                                    @endif
                                    
                                    <td class="text-center"> 
                                        <a href="{{ route('delete.check',$data->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i>{{ __('words.clear') }}</a>
                                    </td>
    
                                </tr>
                            @endforeach
    
    
    
                        </tbody>
                    </table>
                </div>
    
    
            </div>

        </div>
    </div>

    @include('Emart.include.nav_bottom')
    @include('Emart.include.script')
    <script>
            var time_remaining = document.querySelectorAll('.time_remaining_check');
            var give_date = document.querySelectorAll('.deliveryـdate_check');
            var take_date = document.querySelectorAll('.receivedـdate');
    
    
            // function to calculate the time
            var x = setInterval(function() {
                for (i = 0; i < give_date.length; i++) {
                    var index = 0;
                    time_remaining.forEach(function(item) {
                        // the current time
                        var now = new Date().getTime();
                        // the difference between time
                        var dif = new Date(give_date[index].innerText).getTime() - now;
    
                        var days = Math.floor(dif / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((dif % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((dif % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((dif % (1000 * 60)) / 1000);
                        if (dif < 0) {
                            item.innerHTML = "<h5 class='expired' style='color:white'>تم انتهاء المدة</h5>"
                        } else {
                            item.innerHTML = `<p class="time"> ${days}يوم - ${hours}ساعة  </p>`;
                        }
                        index++
                    })
                }
            }, 10000)
    
            x();
    </script>
</body>

</html>

