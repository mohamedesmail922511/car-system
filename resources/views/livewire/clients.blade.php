<div>
    <div class="card-box mb-30 pt-5">
        <div class="pb-20">
            <table id="myTable" class="data-table table stripe hover nowrap display">
                <thead>
                    <tr>
                        <th scope="col" class="text-center table-plus datatable-nosort">ID</th>
                        <th scope="col" class="text-center table-plus datatable-nosort">{{ __('words.name') }}</th>
                        <th scope="col" class="text-center">{{ __('words.phone') }}</th>
                        <th scope="col" class="text-center">{{ __('words.info') }}</th>
                        <th scope="col" class="text-center datatable-nosort"> {{ __('words.select') }} </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td class="text-center table-plus">{{ $client->id }}</td>
                            <td class="text-center table-plus">{{ $client->name }}</td>
                            <td class="text-center">{{ $client->phone }}</td>
                            <td class="text-center">
                                @if ($client->car_info !== null)
                                    @foreach ($client->car_info as $car)
                                        {{ $car['car_no'] }} - {{ $car['car_type'] }} - {{ $car['service'] }} -
                                        {{ $car['price'] }} <br />
                                    @endforeach
                                @else 
                                No Cars
                                @endif

                            </td>

                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                        <a class="dropdown-item" href="{{ route('client.details', $client->id) }}">
                                            <i class="dw dw-edit2"></i> {{ __('words.details') }} </a>


                                        <a class="dropdown-item" href="https://wa.me/{{ $client->phone }}">
                                            <i class="icon-copy bi bi-envelope"></i>
                                            {{ __('words.message') }} </a>


                                        <a href="tel:{{ $client->phone }}" class="dropdown-item">
                                            <i class="icon-copy bi bi-telephone-forward"></i>
                                            {{ __('words.call') }} </a>


                                        <a href="{{ route('review', $client->id) }}" class="dropdown-item">
                                            <i class="dw dw-edit2"></i>
                                            {{ __('words.review') }} </a>

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
