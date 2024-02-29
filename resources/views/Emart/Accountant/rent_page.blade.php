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
                <h2 class="h3 mb-0">{{ __('words.bills') }}</h2>
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

          
                <form action="{{ route('add.bills') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif"> {{ __('words.rentvalue') }}</label>
                            <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="value">
                        </div>
                        <div class="col-md-4">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.elewater') }}</label>
                            <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="bill">
                        </div>
                        <div class="col-md-4">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.date') }}</label>
                            <input type="date" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="date">
                        </div>
    
                        <div class="col-md-12 mt-4 text-center">
                            <button type="submit" class="btn btn-primary w-25">{{ __('words.add') }}</button>
                        </div>
                    </div>
                </form>
    
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped table-hover borded">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">{{ __('words.rentvalue') }}</th>
                                <th scope="col" class="text-center">{{ __('words.elewater') }} </th>
                                <th scope="col" class="text-center">{{ __('words.date') }}</th>
                                <th scope="col" class="text-center">{{ __('words.total') }}</th>
                                <th scope="col" class="text-center">{{ __('words.clear') }}</th>
                            </tr>
                        </thead>
                        <tbody>
    
                            @foreach ($data as $data)
                                <tr>
    
                                    <td class="text-center">{{ $data->value }}</td>
                                    <td class="text-center">{{ $data->bill }}</td>
                                    <td class="text-center">{{ $data->date }}</td>
                                    <td class="text-center">{{ $data->value + $data->bill }}</td>
                                    <td class="text-center"><a class="btn btn-danger" href="{{ route('bill.delete',$data->id) }}"> <i class="fa-solid fa-trash"></i> Delete</a></td>
                                  
                                   
    
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
</body>

</html>
