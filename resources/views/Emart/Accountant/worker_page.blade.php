
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
                <h2 class="h3 mb-0">{{ __('words.employers') }}</h2>
            </div>
         
            <div class="container-fluid py-4">
                <hr>
                @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p class="text-center fs-6 text-white">{{ session()->get('msg') }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
    
                    <div class="col-md-3">
                        <form action="{{ route('add.department') }}" method="post">
                            <h6 class="text-center">{{ __('words.adddepartment') }}</h6>
                            <hr>
                            @csrf
                            <div class="col-md-12">
                                <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif"> {{ __('words.name') }} </label>
                                <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="department">
                            </div>
    
                            <div class="col-md-12 text-center mt-4">
                                <button class="btn btn-primary w-50" type="submit">{{ __('words.add') }}</button>
                            </div>
                        </form>
                    </div>
    
                    <div class="col-md-5">
                        <h6 class="text-center">{{ __('words.addemplyer') }}</h6>
                        <form action="{{ route('add.worker') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.name') }}</label>
                                    <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="name">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">{{ __('words.department') }}</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="department" >
                                            <option value="0">{{ __('words.select') }}</option>
                                            @foreach ($depart as $depart)
                                            <option value="{{ $depart->name }}">{{ $depart->name }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                </div>
    
                                <div class="col-md-12">
                                    <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif"> {{ __('words.salary') }} </label>
                                    <input type="number" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="salary">
                                </div>
    
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif"> {{ __('words.visatype') }}  </label>
                                    <select class="form-control" aria-label="Default select example" name="visa_type">
                                        <option value="0">اختر نوع الفيزا</option>
                                        <option value="Visit Visa">Visit Visa</option>
                                        <option value="Work Permit">Work Permit</option>
                                    </select>
                                    </div>
                                </div>
    
                                <div class="col-md-12">
                                    <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.visaend') }} </label>
                                    <input type="date" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="visa_date">
                                </div>
                                <div class="col-md-12 mt-4 text-center">
                                    <button class="btn btn-primary w-25" type="submit">{{ __('words.add') }}</button>
                                
                                </div>
                            </div>
                        </form>
                    </div>
    
    
                    <div class="col-md-4">
                        <h6 class="text-center">{{ __('words.addreport') }}</h6>
                        <hr>
                        <form action="{{ route('add.report') }}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.name') }}</label>
                                <select class="form-control" aria-label="Default select example" name="name">
                                    <option value="0" >{{ __('words.emplyername') }}</option>
                                    @foreach ($workers as $worker )
                                        <option value="{{ $worker->name }}">{{ $worker->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
    
                            <div class="col-md-12">
                                <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.date') }}</label>
                                <input type="date" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="date">
                            </div>
    
                            <div class="col-md-12">
                                <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.report') }}</label>
                                <textarea name="report" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" cols="30" rows="10" placeholder="write report for worker"></textarea>
                            </div>
    
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary" type="submit">{{ __('words.add') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
    
    
    
    
    
            </div>
        </div>
    </div>

    @include('Emart.include.nav_bottom')
    @include('Emart.include.script')
</body>

</html>
