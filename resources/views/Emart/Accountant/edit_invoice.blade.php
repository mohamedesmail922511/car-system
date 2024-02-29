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
                <h2 class="h3 mb-0">تعديل فاتورة</h2>
            </div>
          
            <div class="container-fluid py-4">
                @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p class="text-center fs-6">{{ session()->get('msg') }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </div>
                @endif
            
                <form action="{{ route('update.invoice',$invoice->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">نوع الفاتورة</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="invoice_type">
                                    <option value="{{ $invoice->invoice_type }}" selected>{{ $invoice->invoice_type }}</option>
                                    <option value="Quotation">Quotation</option>
                                    <option value="CASH">CASH</option>
                                </select>
                              </div>
                        </div>
    
                        <div class="col-md-6">
                            <label for="">اسم العميل</label>
                            <input type="text" class="form-control" name="name" value="{{ $invoice->name }}">
                        </div>
    
                        <div class="col-md-6">
                            <label for="">رقم الهاتف</label>
                            <input type="text" class="form-control" name="phone" value="{{ $invoice->phone }}">
                        </div>




                 
                        

                    <div id="form-container" class="col-12 my-5">
                        <div class="d-flex justify-content-end my-3"> 
                            <button class="btn btn-primary" type="button" id="add-row"><i class="icon-copy bi bi-plus-circle"></i></button>
                        </div>
                        @foreach ( $invoice->car_info as $car )
                        <div class="form-row">
                            <div class="col-12 col-md-3">
                                <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.carno') }}</label>
                                <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="car_no[]" value="{{ $car['car_no'] }}">
                            </div>
                
                            <div class="col-12 col-md-3">
                                <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.cartype') }}</label>
                                <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="car_type[]" value="{{ $car['car_type'] }}">
                            </div>
                
                            <div class="col-12 col-md-3">
                                <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.servicetype') }}</label>
                                <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="service[]" value="{{ $car['service'] }}">
                            </div>
                
                            <div class="col-12 col-md-2">
                                <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.price') }}</label>
                                <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="price[]" value=" {{ $car['price'] }} ">
                            </div>
    
                            <div class="col-12 col-md-1 mt-4 d-flex justify-content-center align-items-center">
                                <button type="button" class="delete-row btn btn-danger"><i class="icon-copy bi bi-trash-fill"></i></button>
                            </div>
                
                        </div>
                        @endforeach
                    </div>

    
                        {{-- <div class="col-md-6">
                            <label for="">رقم السيارة</label>
                            <input type="text" class="form-control" name="car_no" value="{{ $invoice->car_no }}">
                        </div> --}}
    
                        {{-- <div class="col-md-6">
                            <label for="">نوع السيارة</label>
                            <input type="text" class="form-control" name="car_type" value="{{ $invoice->car_type }}">
                        </div> --}}
    
                        {{-- <div class="col-md-6">
                            <label for="">نوع الخدمة</label>
                            <input type="text" class="form-control" name="service" value="{{ $invoice->service }}">
                        </div> --}}
    
                        <div class="col-md-6">
                            <label for="">وصف حالة السيارة</label>
                            <textarea name="car_description" id="" cols="30" rows="10" class="form-control">
                               {{ $invoice->car_description }}
                            </textarea>
                        </div>
    
                        <div class="col-md-6">
                            <label for="">ملاحظات</label>
                            <textarea name="note" id="" cols="30" rows="10" class="form-control">
                                {{ $invoice->note }}
                            </textarea>
                        </div>
    
                        {{-- <div class="col-md-6">
                            <label for="">السعر</label>
                            <input type="number" class="form-control" name="price" value="{{ $invoice->price }}">
                        </div> --}}
    
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('words.invoicestatus') }}</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="invoice_status">
                                    <option selected>{{ $invoice->invoice_status }}</option>
                                    <option value="لم يتم الدفع">لم يتم الدفع</option>
                                    <option value="تم الدفع">تم الدفع</option>
                                </select>
                              </div>
                        </div> 
    
    
                        <div class="col-md-6">
                            <label>{{ __('words.receiveddate') }}</label>
                            <input type="datetime-local" class="form-control"  name="receivedـdate" value="{{ $invoice->receivedـdate}}">
                        </div>
                        <div class="col-md-6">
                            <label>{{ __('words.deliverydate') }}</label>
                            <input type="datetime-local" class="form-control"  name="deliveryـdate" value="{{ $invoice->deliveryـdate }}">
                        </div>
                        
    
                        <div class="col-md-6 text-center mt-4">
                            <label class="d-block">امضاء العميل</label>
                            @if($invoice->signature)
                              <img src="/signatures/{{ $invoice->signature }}" width="200px" alt="">
                            @else
                                <p>لا توجد امضاء للعميل</p>
                            @endif
                            
                        </div>
                        <div class="col-md-6 text-center mt-4">
                            <label class="d-block">{{ __('words.images') }}</label>
                           
                            @if($invoice->images)
                            <div class="d-flex flex-wrap">
                                @foreach ( $invoice->images as $image )
                                <img src="/carsimages/{{ $image }}" class="border m-1" width="100px" alt="">
                                @endforeach
                            </div>
                             
                            @else
                                <p>لا توجد صور للسيارة</p>
                            @endif
                            
                        </div>
    
    
                        <div class="col-md-6 mt-5">
                            <div id="signature-pad" class="text-center">
                                <canvas></canvas>
                                <div class="text-center">
                                    <button type="button" class="btn btn-danger" id="clear-signature">Clear</button>
                                </div>
                               
                            </div>
                    
                            <input type="hidden" name="signature" id="signature" required>
                        </div>
                        
                    
                         <div class="col-md-6">
                            <label for="">Created Date</label>
                            <input type="text" class="form-control"  value="{{ $invoice->created_at }}">
                        </div>
                    
                        
                        <div class="col-md-12 mt-4 text-center">
                            <button class="btn btn-primary" type="submit">تعديل الفاتورة</button>
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
        $(document).ready(function () {
            var canvas = document.querySelector("canvas");
            var signaturePad = new SignaturePad(canvas);
    
            $("#clear-signature").click(function () {
                signaturePad.clear();
                $("#signature").val("");
            });
    
            $("form").submit(function () {
                if (!signaturePad.isEmpty()) {
                    var signatureData = signaturePad.toDataURL();
                    $("#signature").val(signatureData);
                }
            });
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('add-row').addEventListener('click', function () {
            // Clone the first form-row div
            var clone = document.querySelector('.form-row').cloneNode(true);

            // Clear input values in the cloned div
            var inputs = clone.querySelectorAll('input');
            inputs.forEach(function (input) {
                input.value = '';
            });

            // Append the cloned div to the form-container
            document.getElementById('form-container').appendChild(clone);

            // Add event listener to the delete button in the cloned div
            clone.querySelector('.delete-row').addEventListener('click', function () {
                clone.remove();
            });
        });
    });
</script>

</body>

</html>

