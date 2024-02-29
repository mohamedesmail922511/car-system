

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
                <h2 class="h3 mb-0">{{ __('words.dailypurchases') }}</h2>
            </div>
        
            <div class="container-fluid py-4">
                @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p class="text-center fs-6 text-white">{{ session()->get('msg') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                                class="fa-solid fa-circle-xmark fs-2"></i></button>
                    </div>
                @endif
    
                <hr>
                <form action="{{ route('add.purches') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.name') }}</label>
                            <input type="text" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="name">
                        </div>
                        <div class="col-md-3">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.price') }}</label>
                            <input type="number" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="price">
                        </div>
                        <div class="col-md-3">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.quantity') }}</label>
                            <input type="number" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="quantity">
                        </div>
    
                        <div class="col-md-3">
                            <label class="d-block w-100 @if (app()->getLocale() === 'ar') text-right @endif">{{ __('words.date') }}</label>
                            <input type="date" class="form-control @if (app()->getLocale() === 'ar') text-right @endif" name="date">
                        </div>
    
                        <div class="col-md-12 mt-4 text-center">
                            <button type="submit" class="btn btn-primary w-25">{{ __('words.add') }}</button>
                        </div>
                    </div>
                </form>
    
                <hr>
                <h6 class="text-center">{{ __('words.dailypurchases') }}</h6>
                <?php $total = 0; ?>
                <a href="{{ route('delete.purches') }}" class="btn btn-danger"><i class="icon-copy bi bi-trash-fill"></i>{{ __('words.clear') }} </a>

                <div class="card-box mb-30 mt-30 py-4">
                    <div class="pb-20">
                        <table id="myTable" class="data-table table stripe hover nowrap display">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center table-plus datatable-nosort">{{ __('words.date') }}</th>
                                    <th scope="col" class="text-center">{{ __('words.name') }}</th>
                                    <th scope="col" class="text-center">{{ __('words.price') }}</th>
                                    <th scope="col" class="text-center">{{ __('words.quantity') }}</th>
                                    <th scope="col" class="text-center">{{ __('words.total') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                <tr>
    
                                    <td class="text-center">{{ $data->date }}</td>
                                    <td class="text-center">{{ $data->name }}</td>
                                    <td class="text-center">{{ $data->price }}</td>
                                    <td class="text-center">{{ $data->quantity }}</td>
                                    <td class="text-center">{{ $data->price * $data->quantity }}</td>
    
                                    <?php $total = $total +  $data->price * $data->quantity ?>
                                    <td class="text-center"><a href="{{ route('item.delete', $data->id) }}"
                                            class="btn btn-danger">{{ __('words.clear') }} <i class="icon-copy bi bi-trash-fill"></i> </a></td>
    
                                </tr>
                            @endforeach
            

                            <tr>
                                <td colspan="4">{{ __('words.total') }}</td>
                                <td><?php echo $total ?></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            
    
            </div>

        </div>
    </div>

    @include('Emart.include.nav_bottom')
    @include('Emart.include.script')
</body>

</html>

