<!DOCTYPE html>
<html>

<head>
    @include('Emart.include.style')
    @livewireStyles
</head>

<body>
    @include('Emart.include.header')
    @include('Emart.include.right-sidebar')
    @include('Emart.include.left-sidebar')

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="container-fluid py-4">
                <h6 class="text-center"> {{ __('words.invoices') }} ({{ $data->count() }})</h6>
                <hr>
                 <div class="conatiner-fluid">
                    <div class="card-box mb-30 py-4">
                        <div class="pb-20">
                            <table id="myTable" class="data-table table stripe hover nowrap display">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center table-plus datatable-nosort">ID</th>
                                        <th scope="col" class="text-center">{{ __('words.name') }}</th>
                                        <th scope="col" class="text-center">{{ __('words.phone') }}</th>
                                        <th scope="col" class="text-center">{{ __('words.info') }}</th>
                                       
                                        <th scope="col" class="text-center">{{ __('words.sales') }} </th>
                                        <th scope="col" class="text-center datatable-nosort"> {{ __('words.select') }} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $data)
                                        <tr>
                                            <td class="text-center table-plus">{{ $data->id }}</td>
                                            <td class="text-center">{{ $data->name }}</td>
                                            <td class="text-center">{{ $data->phone }}</td>
                                            <td class="text-center">
                                                @foreach ( $data->car_info as $car )
                                                
                                                    {{ $car['car_no'] }} - {{ $car['car_type'] }} - {{ $car['service'] }} - {{ $car['price'] }} <br/> 
                                               
                                                @endforeach
                                            </td>
                                        
                                            <td class="text-center">{{ $data->sales }}</td>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                        href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                
                                                        <a class="dropdown-item" href="{{ route('invoice.edit', $data->id) }}"><i
                                                                class="dw dw-edit2"></i> {{ __('words.edit') }}</a>
                                                        <a class="dropdown-item" href="{{ route('invoice.delete', $data->id) }}"><i
                                                                class="dw dw-delete-3"></i> {{ __('words.clear') }}</a>
                                                        <a href="{{ route('print.invoice', $data->id) }}" class="dropdown-item">
                                                            <i class="icon-copy bi bi-printer-fill"></i>
                                                            {{ __('words.print') }} </a>
                
                
                                                        <a href="{{ route('stripe', $data->id) }}" class="dropdown-item">
                                                            <i class="icon-copy bi bi-paypal"></i>
                                                            {{ __('words.pay') }} </a>
                
                                                    </div>
                                                </div>
                
                                            </td>
                                        </tr>
                                    @endforeach
                
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div>
                
            </div>

        </div>
    </div>

    @include('Emart.include.nav_bottom')
    @include('Emart.include.script')
    @livewireScripts
</body>

</html>
