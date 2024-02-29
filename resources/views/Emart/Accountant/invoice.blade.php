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
                <h2 class="h3 mb-0">Invoice Printing</h2>
            </div>

            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" id="print_button" onclick="printDiv()">
                    <i class="icon-copy bi bi-printer-fill" style="font-size: 15px"></i> </button>
            </div>

            <div class="invoice-wrap" id="print">
                <div class="invoice-box">
                    <div class="invoice-header d-flex align-items-center justify-content-between">
                        <div class="logo text-center">
                            <img src="/panel/src/images/logo.png" width="100px" alt="logo" />
                        </div>
                       <div>
                        <div class="invoice-title mb-3">
                            <h5 class="title text-right">الاخطبوط الذهبي لصيانة واصلاح السيارات</h5>
                        </div>
                        <div class="invoice-title">
                            <h5 class="title">Alkhtaboot Althahbi Ror Car Maintenance And Repair</h5>
                        </div>
                       </div>
                    </div>

                    <hr>
                    {{-- <div class="d-flex justify-content-between mt-3">
                        <div class="contact-div">
                            <div class="d-flex flex-row-reverse email-web justify-content-start">
                                <p style="width: 45%">الايميل</p>
                                <p class="email-web-name">alkhtaboot.pdr@gmail.com</p>
                            </div>
                            <div class="d-flex flex-row-reverse email-web">
                                <p style="width: 45%">الموقع الالكتروني</p>
                                <p class="email-web-name">www.alkhtaboot.com</p>
                            </div>
                        </div>

                        <div class="">
                            <h6 class="address">فرع الامارات العربية المتحدة - الشارقة - الصناعية الرابعة -
                                00971561000840</h6>
                            <h6 class="address">فرع المملكة العربية السعودية - الرياض - شارع الملك فهد - 0096581799997
                            </h6>
                        </div>

                    </div> --}}
                    <div class="d-flex justify-content-between mt-3 flex-row-reverse">
                        <div class="contact-div">
                            <div class="d-flex email-web justify-content-start">
                                <p style="width: 45%;text-align:left;">E-mail : </p>
                                <p class="email-web-name"> alkhtaboot.pdr@gmail.com</p>
                            </div>
                            <div class="d-flex  email-web">
                                <p style="width: 45%;text-align:left;">Website : </p>
                                <p class="email-web-name"> www.alkhtaboot.com</p>
                            </div>
                        </div>

                        <div class="">
                            <h6 class="address"> United Arab Emirates Branch - Sharjah - Fourth Industrial Area -
                                00971561000840 </h6>
                            <h6 class="address"> United Arab Emirates Branch - Al ain - Aldamn street  -
                                00971561000840 </h6>
                            <h6 class="address"> Kingdom of Saudi Arabia branch - Riyadh - King Fahd Street -
                                0096581799997</h6>
                            <h6 class="address"> Kingdom of Saudi Arabia branch - Jeddah - King Fahd Street -
                                0096536999559</h6>
                           
                        </div>

                    </div>

                    <hr>

                    <div class="invoice_type  w-50 m-auto text-center mt-2" style="margin-bottom: 20px !important">
                        {{ $invoice->invoice_type }}
                    </div>

                    <div class="row pb-30" style="margin-top: 10px;">
                        <div class="d-flex align-items-start justify-content-end w-100">
                            <p class="mb-5">{{ $invoice->name }}</p>
                            <p class="mb-15 mx-3" style="direction: rtl">اسم العميل : </p>
                        </div>
                        <div class="d-flex align-items-start justify-content-end w-100">
                            <p class="mb-5">{{ $invoice->phone }}</p>
                            <p class="mb-15 mx-3" style="direction: rtl"> رقم الهاتف : </p>
                        </div>
                        <div class="d-flex align-items-start justify-content-end w-100">
                            <p class="mb-5">{{ $invoice->id }}</p>
                            <p class="mb-15 mx-3" style="direction: rtl"> رقم الفاتورة : </p>
                        </div>
                        <div class="d-flex align-items-start justify-content-end w-100">
                            <p class="mb-5 date"></p>
                            <p class="mb-15 mx-3" style="direction: rtl"> الناريخ : </p>
                        </div>
                    </div>

                    <div class="invoice-desc pb-30" style="height: 270px">
                        <div class="invoice-desc-head clearfix">
                            <div class="invoice-subtotal text-center">Car No</div>
                            <div class="invoice-hours text-center">Car Type</div>
                            <div class="invoice-rate text-center">Service Type</div>
                            <div class="invoice-sub text-center">Service Price</div>
                        </div>
                        <div class="invoice-desc-body">
                            <ul>
                                @foreach ( $invoice->car_info as $car )
                                <li class="clearfix">
                                    <div class="invoice-subtotal text-center">
                                        <span class="weight-600 text-center">{{ $car['car_no'] }}</span>
                                    </div>
                                    <div class="invoice-hours text-center">{{ $car['car_type'] }}</div>
                                    <div class="invoice-rate text-center">{{ $car['service'] }}</div>
                                    <div class="invoice-sub text-center">{{ $car['price'] }}</div>
                                </li>
                                @endforeach
                            </ul>


                        </div>

                    </div>




                    <div class="d-flex justify-content-end my-1 mx-4 mt-5"
                        style="direction: rtl; flex-direction:row-reverse">
                        <p class="mx-2" style="font-size: 12px;">{{ $invoice->car_description }}
                        </p>
                        <p style="direction: rtl; white-space: nowrap;font-size:14px"> وصف السيارة :</p>
                    </div>

                    <div class="d-flex justify-content-end my-1 mx-4"
                        style="direction: rtl; flex-direction:row-reverse">
                        <p class="mx-2" style="font-size: 12px;">{{ $invoice->note }}
                        </p>
                        <p style="direction: rtl;white-space: nowrap;font-size:14px "> ملاحظات :</p>
                    </div>


                 

                    <div class="text-center" style="margin-top:100px;margin-bottom:100px">
                        <img src="/panel/src/images/images.png" alt="" width="400px">
                    </div>


                    <div class="d-flex justify-content-between mt-5 signature-container">
                        <div class="Signature">
                            <p>Authorized Signature</p>
                            <p class="text-center">--------------------------</p>
                        </div>

                        <div class="Signature">
                            <p class="text-center">Customer Signature</p>
                            <p class="text-center">--------------------------</p>
                        </div>

                    </div>
                </div>

                {{-- ----------------------------------- --}}

                <div class="invoice-box">
                    <div class="invoice-header d-flex align-items-center justify-content-between">
                        <div class="logo text-center">
                            <img src="/panel/src/images/logo.png" width="100px" alt="logo" />
                        </div>
                       <div>
                        <div class="invoice-title mb-3">
                            <h5 class="title text-right">الاخطبوط الذهبي لصيانة واصلاح السيارات</h5>
                        </div>
                        <div class="invoice-title">
                            <h5 class="title">Alkhtaboot Althahbi Ror Car Maintenance And Repair</h5>
                        </div>
                       </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between mt-3 flex-row-reverse">
                        <div class="contact-div">
                            <div class="d-flex email-web justify-content-start">
                                <p style="width: 45%;text-align:left;">E-mail : </p>
                                <p class="email-web-name"> alkhtaboot.pdr@gmail.com</p>
                            </div>
                            <div class="d-flex  email-web">
                                <p style="width: 45%;text-align:left;">Website : </p>
                                <p class="email-web-name"> www.alkhtaboot.com</p>
                            </div>
                        </div>

                        <div class="">
                            <h6 class="address"> United Arab Emirates Branch - Sharjah - Fourth Industrial Area -
                                00971561000840 </h6>
                            <h6 class="address"> United Arab Emirates Branch - Al ain - Aldamn street  -
                                00971561000840 </h6>
                            <h6 class="address"> Kingdom of Saudi Arabia branch - Riyadh - King Fahd Street -
                                0096581799997</h6>
                            <h6 class="address"> Kingdom of Saudi Arabia branch - Jeddah - King Fahd Street -
                                0096536999559</h6>
                           
                        </div>

                    </div>

                    <hr>

                
                 

                    <div class="notes mt-5">
                        <p>1- خدمة Touch Paint مجانا ولا تتحمل الشركة اي مسئولية عن نتيجة Touch Paint - يجب العلم
                            هناك فرق بين (Touch Paint) و (Smart Paint)</p>

                        <p>2- الشركة تتعهد في خدمة PDR حسب النسبة المذكورة ولا تتحمل اي مسئولية عن الخدوش العمل يتم
                            علي
                            تعديل الضربة
                            فقط</p>
                        <p>3- الشركة لا تتحمل اي مسئوليةعن اي اعطال كهربائية او ميكانيكية داخل السيارة</p>
                        <p>4- احيانا يتطلب العمل علي السيارة اجراء فتحة في بعض المناطق في السيارة اذا لزم الامر -
                            احيانا نلتجأ الي فك بعض اجزاء السيارة</p>
                        <p>5- لا تتحمل الشركة اي مسؤلية عن اي خدش داخل السيارة لان شركة الاخطبوط الذهبي اختصاصها
                            هيكل
                            السيارة الخارجي</p>
                        <p>6- العربون المدفوع لا يسترد</p>
                        <p>7- من الممكن حدوث كسر في الصبغ ، اذا حدث ستتكفل الشركة بعمل الصبغ الذكي مجانا</p>
                        <p>8- اذا كان هناك قطع غيار تالفة فالشركة غير معنية بها</p>
                        <p>9- في اغلب الاحيان يتم فك الديكور الداخلي للسيارة</p>
                        <p>10-في حالة امضاء العميل فانه يوافق علي جميع بنود الخدمه</p>
                    </div>
               


                    <div class="notes-english mt-5">
                        <p>1- The Touch Paint service is free of charge and the company does not bear any responsibility for the result of Touch Paint - you must know
                            There is a difference between (Touch Paint) and (Smart Paint)</p>

                        <p>2- The company undertakes to provide the PDR service according to the mentioned percentage and does not bear any responsibility for the scratches the work is done
                            on
                            Stroke adjustment
                            Only</p>
                        <p>3- The company does not bear any responsibility for any electrical or mechanical malfunctions inside the car</p>
                        <p>4- Sometimes working on the car requires making an opening in some areas of the car if necessary -
                            Sometimes we resort to dismantling some parts of the car</p>
                        <p>5- The company does not bear any responsibility for any scratch inside the car because the Golden Octopus Company is its specialty
                            structure
                            Car exterior</p>
                        <p>6- The deposit paid is not refundable</p>
                        <p>7- It is possible for the dye to break. If it happens, the company will take care of the smart dyeing for free.</p>
                        <p>8- If there are damaged spare parts, the company is not concerned with them</p>
                        <p>9- In most cases, the car’s interior decoration is removed</p>
                        <p>10- If the customer signs, he agrees to all terms of service</p>
                    </div>

                    <div class="text-center" style="margin:70px">
                        <img src="/panel/src/images/images.png" alt="">
                    </div>


                    <div class="d-flex justify-content-between mt-5 signature-container">
                        <div class="Signature">
                            <p>Authorized Signature</p>
                            <p class="text-center">--------------------------</p>
                        </div>

                        <div class="Signature">
                            <p class="text-center">Customer Signature</p>
                            {{-- <p class="text-center">
                                <img src="/signatures/{{ $invoice->signature }}" width="50px" height="50px" alt="" srcset="">
                            </p> --}}
                            <p class="text-center">--------------------------</p>
                        </div>

                    </div>
                </div>


            </div>


            <div class="text-center mt-5">
                <button class="btn btn-primary w-50 m-auto text-center" id="print_button" onclick="printDiv()">
                    <i class="icon-copy bi bi-printer-fill"></i> طباعة الفاتورة</button>
            </div>

        </div>
    </div>

    @include('Emart.include.nav_bottom')
    @include('Emart.include.script')
    <script>
        var htmldate = document.querySelector('.date');
        const currentDate = new Date();
        const date = currentDate.toLocaleDateString();

        htmldate.innerHTML = date;
        // ---------------------------------------------------------------
        function printDiv() {
            var printcontent = document.getElementById('print').innerHTML;
            var originalcontent = document.body.innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = originalcontent;
            location.reload();
        }
    </script>
</body>

</html>
