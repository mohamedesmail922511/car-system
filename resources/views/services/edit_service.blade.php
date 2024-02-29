


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
            <div class="container-fluid py-4">
                @if (session()->has('msg'))
                <div class="alert alert-dismissible bg-primary fade show d-flex justify-content-center align-items-center" role="alert">
                    <p class="text-white" style="font-size: 12px">{{ session()->get('msg') }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                    
                @endif
                <h6 class="text-center">{{ __('words.editservice') }}</h6>
                <hr>
                <form action="{{ route('edit.service.confirmation',$service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-8 m-auto p-5 bg-white ">
                            <label>اسم الخدمة الجديد</label>
                            <input type="text" class="form-control" value="{{ $service->name }}" name="name">
                        </div>
    
                        <div class="col-12 col-md-8 m-auto p-5 bg-white">
                            <label>الصورة القديمه</label>
                            <br>
                            <img src="/services/{{ $service->image }}" width="70px" alt="">
                        </div>
    
                        <div class="col-12 col-md-8 m-auto p-5 bg-white">
                            <div class="form-group">
								<label>اخنر الصورة الجديدة</label>
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="image" />
									<label class="custom-file-label">Choose file</label>
								</div>
							</div>

                        </div>
    
                        <div class="col-12 col-md-8 m-auto my-2 text-center bg-white">
                            <button class="btn btn-primary w-50" type="submit">Update</button>
                        </div>
                    </div>
                </form>
               
            </div>

        </div>
    </div>


    @include('services.includes.back')
    @include('Emart.include.script')
</body>

</html>
