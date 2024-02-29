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
                <h2 class="h3 mb-0">{{ __('words.addclient') }}</h2>
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

                <form action="{{ route('add.client') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">



                        <div class=" col-12 mb-30">
                            <div class="pd-20 card-box">
                                <div class="tab">
                                    <div class="row clearfix">
                                        <div class="col-md-2 col-sm-12">
                                            <ul class="nav flex-column vtabs nav-tabs customtab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#home4"
                                                        role="tab" aria-selected="true">Invoice Info</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#profile4"
                                                        role="tab" aria-selected="false">Client Info</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#contact4"
                                                        role="tab" aria-selected="false">Cars Info</a>
                                                </li>

                                            </ul>
                                        </div>

                                        <div class="col-md-10 col-sm-12">

                                            <div class="tab-content">

                                                <div class="tab-pane fade show active" id="home4" role="tabpanel">
                                                    <div class="pd-20">
                                                        <div class="col-md-12">
                                                            <label
                                                                class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.invoicetype') }}</label>
                                                            <div class="form-group row">
                                                                <div class="col-sm-12 col-md-10">
                                                                    <select class="custom-select col-12"
                                                                        name="invoice_type">
                                                                        <option value="Quotation" selected>Quotation
                                                                        </option>
                                                                        <option value="CASH">CASH</option>
                                                                        <option value="DEBIT">DEBIT</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label
                                                                class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.branch') }}</label>
                                                            <div class="form-group row">
                                                                <div class="col-sm-12 col-md-10">
                                                                    <select class="custom-select col-12" name="branch">
                                                                        <option value="sharjah" selected>Sharjah
                                                                        </option>
                                                                        <option value="alain">Al Ain</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="profile4" role="tabpanel">
                                                    <div class="pd-20">

                                                        <div class="col-md-12">
                                                            <label
                                                                class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.name') }}</label>
                                                            <input type="text"
                                                                class="form-control @if (app()->getLocale() === 'ar') text-right @endif"
                                                                name="name">
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label
                                                                class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.phone') }}</label>
                                                            <input type="text"
                                                                class="form-control @if (app()->getLocale() === 'ar') text-right @endif"
                                                                name="phone">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="contact4" role="tabpanel">
                                                    <div class="pd-20">




                                                        <div class="d-flex justify-content-end my-3">
                                                            <button class="btn btn-primary" type="button"
                                                                id="add-row"><i
                                                                    class="icon-copy bi bi-plus-circle"></i></button>
                                                        </div>
                                                        <div id="form-container">
                                                            <!-- Initially, there is a div with inputs and a button -->
                                                            <div class="form-row">
                                                                <div class="col-12 col-md-3">
                                                                    <label
                                                                        class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.carno') }}</label>
                                                                    <input type="text" class="form-control"
                                                                        name="car_no[]">
                                                                </div>

                                                                <div class="col-12 col-md-3">
                                                                    <label
                                                                        class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.cartype') }}</label>
                                                                    <input type="text"
                                                                        class="form-control @if (app()->getLocale() === 'ar') text-right @endif"
                                                                        name="car_type[]">
                                                                </div>

                                                                <div class="col-12 col-md-3">
                                                                    <label
                                                                        class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.servicetype') }}</label>
                                                                    <input type="text"
                                                                        class="form-control @if (app()->getLocale() === 'ar') text-right @endif"
                                                                        name="service[]">
                                                                </div>

                                                                <div class="col-12 col-md-2">
                                                                    <label
                                                                        class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.price') }}</label>
                                                                    <input type="number"
                                                                        class="form-control @if (app()->getLocale() === 'ar') text-right @endif"
                                                                        name="price[]">
                                                                </div>

                                                                <div
                                                                    class="col-12 col-md-1 mt-4 d-flex justify-content-center align-items-center">
                                                                    <button type="button"
                                                                        class="delete-row btn btn-danger"><i
                                                                            class="icon-copy bi bi-trash-fill"></i></button>
                                                                </div>

                                                            </div>
                                                        </div>




                                                        <div class="col-md-12">
                                                            <label
                                                                class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.description') }}</label>
                                                            <textarea name="car_description" id="" cols="30" rows="10"
                                                                class="form-control @if (app()->getLocale() === 'ar') text-right @endif"></textarea>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label
                                                                class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.notes') }}</label>
                                                            <textarea name="note" id="" cols="30" rows="10"
                                                                class="form-control @if (app()->getLocale() === 'ar') text-right @endif"></textarea>
                                                        </div>



                                                        <div class="col-md-12">
                                                            <label
                                                                class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.images') }}</label>
                                                            <div class="form-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                        multiple name="images[]" />
                                                                    <label class="custom-file-label">Choose
                                                                        file</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label
                                                                class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.receiveddate') }}</label>
                                                            <input type="datetime-local"
                                                                class="form-control @if (app()->getLocale() === 'ar') text-right @endif"
                                                                name="receivedـdate">
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label
                                                                class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.deliverydate') }}</label>
                                                            <input type="datetime-local"
                                                                class="form-control @if (app()->getLocale() === 'ar') text-right @endif"
                                                                name="deliveryـdate">
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label
                                                                class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.invoicestatus') }}</label>


                                                            <div class="form-group row">

                                                                <div class="col-sm-12 col-md-10">
                                                                    <select class="custom-select col-12"
                                                                        name="invoice_status">
                                                                        <option value="لم يتم الدفع" selected>لم يتم
                                                                            الدفع</option>
                                                                        <option value="تم الدفع">تم الدفع</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="signature-pad" class="m-auto">
                                                            <canvas
                                                                style="border: 1px solid black !important"></canvas>
                                                            <div class="text-center">
                                                                <button type="button" class="btn btn-danger"
                                                                    id="clear-signature">Clear</button>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="signature" id="signature"
                                                            required>

                                                        <div class="col-md-12 my-4 text-center"
                                                            style="margin-bottom: 150px !important">
                                                            <button class="btn btn-primary"
                                                                type="submit">{{ __('words.invoicecreate') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </form>



            </div>

        </div>
    </div>


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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('add-row').addEventListener('click', function() {
            // Clone the first form-row div
            var clone = document.querySelector('.form-row').cloneNode(true);

            // Clear input values in the cloned div
            var inputs = clone.querySelectorAll('input');
            inputs.forEach(function(input) {
                input.value = '';
            });

            // Append the cloned div to the form-container
            document.getElementById('form-container').appendChild(clone);

            // Add event listener to the delete button in the cloned div
            clone.querySelector('.delete-row').addEventListener('click', function() {
                clone.remove();
            });
        });
    });
</script>

</body>

</html>
