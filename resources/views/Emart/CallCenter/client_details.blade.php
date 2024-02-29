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
                <h2 class="h3 mb-0">{{ __('words.updateclient') }}</h2>
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

                <hr>
                <form action="{{ route('update.client', $client->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.name') }}</label>
                            <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="name" value="{{ $client->name }}">
                        </div>
    
                        <div class="col-md-6">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif" >{{ __('words.phone') }}</label>
                            <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="phone" value="{{ $client->phone }}">
                        </div>
    
                        <div class="col-md-6">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif" >{{ __('words.address') }}</label>
                            <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="address" value="{{ $client->address }}">
                        </div>
    
                        <div class="col-md-6">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.carno') }}</label>
                            <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="car_no" value="{{ $client->car_no }}">
                        </div>
    
                        <div class="col-md-6">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif" >{{ __('words.cartype') }}</label>
                            <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="car_type" value="{{ $client->car_type }}">
                        </div>
    
                        <div class="col-md-6">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif" >{{ __('words.price') }}</label>
                            <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="price" value="{{ $client->price }}">
                        </div>
    
                        <div class="col-md-6">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif" >{{ __('words.servicetype') }}</label>
                            <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="service" value="{{ $client->service }}">
                        </div>
    
                      
    
                        <div class="col-md-6">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif" >{{ __('words.description') }}</label>
                            <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="car_description"
                                value="{{ $client->car_description }}">
                        </div>
    
                        <div class="col-md-6">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif" >{{ __('words.notes') }}</label>
                            <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="note" value="{{ $client->note }}">
                        </div>
    
                        <div class="col-md-6">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif" >{{ __('words.receiveddate') }}</label>
                            <input type="datetime-local" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="receivedـdate"
                                value="{{ $client->receivedـdate }}">
                        </div>
    
                        <div class="col-md-6">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif" >{{ __('words.deliverydate') }}</label>
                            <input type="datetime-local" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="deliveryـdate"
                                value="{{ $client->deliveryـdate }}">
                        </div>
    
                        <div class="col-md-6">
                            <p class="text-center">معرض الصور</p>
                            @if (count($client->images) <= 0)
                                <p class="text-center">لا توجد صور</p>
                            @else
                                @foreach ($client->images as $image)
                                    <img src="{{ $image }}" alt="">
                                @endforeach
                            @endif
                        </div>
    
    
                        <div class="col-md-6">
                            <p class="text-center">صورة امضاء العميل</p>
                            <div class="text-center">
                                <img src="/storage/signatures/{{ $client->signature }}" alt="">
                            </div>
    
                        </div>
    
    
    
                        <div class="col-md-6">
                            <div id="signature-pad" class="m-auto d-flex justify-content-center flex-column">
                                <canvas></canvas>
                                <div class="text-center mt-5">
                                    <button type="button" class="btn btn-danger" id="clear-signature">{{ __('words.clear') }}</button>
                                </div>
    
                            </div>
    
                            <input type="hidden" name="signature" id="signature" required>
                        </div>
    
    
                        <div class="col-md-6">
                           

                            <div class="form-group">
                                <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.carimages') }}</label>
								<div class="custom-file">
									<input type="file" class="custom-file-input" multiple name="images[]" />
									<label class="custom-file-label">Choose file</label>
								</div>
							</div>
                        </div>
    
                        <div class="col-md-12 mt-4 text-center">
                            <button type="submit" class="btn btn-primary w-25">{{ __('words.updateclient') }}</button>
                        </div>
                    </div>
                </form>
    
    
            </div>

        </div>
    </div>

    @include('Emart.include.nav_bottom')
    @include('Emart.include.script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <script>
        $(document).ready(function() {
            var canvas = document.querySelector("canvas");
            var signaturePad = new SignaturePad(canvas);

            $("#clear-signature").click(function() {
                signaturePad.clear();
                $("#signature").val("");
            });

            $("form").submit(function() {
                if (!signaturePad.isEmpty()) {
                    var signatureData = signaturePad.toDataURL();
                    $("#signature").val(signatureData);
                }
            });
        });
    </script>
</body>

</html>
