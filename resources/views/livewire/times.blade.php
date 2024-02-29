<div>
    
    {{-- <div class="container">
        <form action="{{ route('timeline.search') }}" method="GET">
            <div class="d-flex w-100">
                <input type="text" name="query" style="height: 43px" class="form-control" placeholder="ادخل رقم السيارة او رقم الهاتف" />
               
                <button type="submit" class="btn btn-primary">{{ __('words.search') }}</button>
            </div>
            
        </form>
    </div>  --}}

    <form wire:submit.prevent='searching' class="border p-2">
        <h6 class="text-center my-3">{{ __('words.timesearch') }}</h6>
        <div class="row d-flex justify-content-center">
            <div class="col-6 col-md-3 my-1">
                <input type="text" wire:model='phone' class="form-control" placeholder="{{ __('words.phone') }}">
            </div>
            <div class="col-6 col-md-3 my-1">
                <input type="text" wire:model='car' class="form-control" placeholder="{{ __('words.carno') }}">
            </div>
            <div class="col-12 col-md-3 my-1">
                <button class="btn btn-primary w-100" type="submit">{{ __('words.search') }}</button>
            </div>
        </div>

    </form>
    
    
    <div class="table-responsive">
        <table class="table table-striped table-hover borded">
            <thead>
                <tr>
                    <th scope="col" class="text-center">{{ __('words.date') }}</th>
                    <th scope="col" class="text-center">{{ __('words.name') }}</th>
                    <th scope="col" class="text-center">{{ __('words.phone') }}</th>
                    <th scope="col" class="text-center">{{ __('words.carno') }}</th>
                    <th scope="col" class="text-center">{{ __('words.cartype') }}</th>
                    <th scope="col" class="text-center">{{ __('words.clear') }}</th>  
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $data)
                    <tr>
                        <td class="text-center">{{ $data->date }}</td>
                        <td class="text-center">{{ $data->name }}</td>
                        <td class="text-center">{{ $data->phone }}</td>
                        <td class="text-center">{{ $data->car_no }}</td>
                        <td class="text-center">{{ $data->car_type }}</td>
                        <td class="text-center"><a class="btn btn-danger" href="{{ route('delete.timeline',$data->id) }}">Delete <i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
