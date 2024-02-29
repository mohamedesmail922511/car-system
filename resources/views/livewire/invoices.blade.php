<div class="container-fluid">

    <div class="container-fluid my-4 d-flex justify-content-end">
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
            aria-controls="collapseExample">
            {{ __('words.filter') }} <i class="icon-copy bi bi-filter-circle-fill"></i>
        </a>
        <a href="{{ route('delete.all.invoices') }}" class="btn btn-danger mx-2">{{ __('words.clear') }} <i
                class="icon-copy bi bi-trash-fill"></i></a>
    </div>
    <div class="container">
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <form wire:submit.prevent='searching'>
                    <div class="row d-flex justify-content-center">
                        <div class="col-6  my-1">
                            <input type="text" wire:model='phone' class="form-control"
                                placeholder="{{ __('words.phone') }}">
                        </div>
                        <div class="col-6  my-1">
                            <input type="text" wire:model='car' class="form-control"
                                placeholder="{{ __('words.carno') }}">
                        </div>
                        <div class="col-6  my-1">
                            <input type="text" wire:model='price' class="form-control"
                                placeholder="{{ __('words.price') }}">
                        </div>
                        <div class="col-6  my-1">
                            <input type="text" wire:model='cartype' class="form-control"
                                placeholder="{{ __('words.cartype') }}">
                        </div>
                        <div class="col-12  my-1">
                            <button class="btn btn-primary w-100" type="submit">{{ __('words.search') }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('words.filter') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>

            </div>
        </div>
    </div>


    <div class="conatiner-fluid">
        <div class="card-box mb-30 py-4">
            <div class="pb-20">
                <table id="myTable" class="data-table table stripe hover nowrap display responsive">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center table-plus datatable-nosort">ID</th>
                            <th scope="col" class="text-center table-plus datatable-nosort">{{ __('words.name') }}
                            </th>
                            <th scope="col" class="text-center">{{ __('words.phone') }}</th>
                            <th scope="col" class="text-center">{{ __('words.info') }}</th>
                            {{-- <th scope="col" class="text-center">{{ __('words.carno') }}</th>
                        <th scope="col" class="text-center">{{ __('words.cartype') }} </th>
                        <th scope="col" class="text-center">{{ __('words.servicetype') }} </th>
                        <th scope="col" class="text-center">{{ __('words.price') }} </th> --}}
                            <th scope="col" class="text-center">{{ __('words.sales') }} </th>
                            <th scope="col" class="text-center datatable-nosort"> {{ __('words.select') }} </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td class="text-center table-plus">{{ $data->id }}</td>
                                <td class="text-center table-plus">{{ $data->name }}</td>
                                <td class="text-center">{{ $data->phone }}</td>
                                <td class="text-center">
                                    @foreach ($data->car_info as $car)
                                        {{ $car['car_no'] }} - {{ $car['car_type'] }} - {{ $car['service'] }} -
                                        {{ $car['price'] }} <br />
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
