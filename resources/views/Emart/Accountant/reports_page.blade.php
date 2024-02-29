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
                <h2 class="h3 mb-0">{{ __('words.employersreports') }}</h2>
            </div>
            <div class="container-fluid py-4">
                <hr>
                <div class="container mb-30">
                    <form action="{{ route('search.report') }}" method="GET">
                        @csrf
                        <div class="d-flex justify-content-center ">
                            <input type="text" name="search" class="form-control w-25" style="height: 45px">
                            <button class="btn btn-success" type="submit"> {{ __('words.search') }} </button>
                        </div>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover borded">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center"> {{ __('words.emplyername') }}</th>
                                <th scope="col" class="text-center">{{ __('words.report') }}</th>
                                <th scope="col" class="text-center">{{ __('words.date') }}</th>
                                <th scope="col" class="text-center">{{ __('words.clear') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td class="text-center">{{ $report->name }}</td>
                                    <td class="text-center">{{ $report->report }}</td>
                                    <td class="text-center">{{ $report->date }}</td>
                                    <td class="text-center"><a class="btn btn-danger"
                                            href="{{ route('report.delete', $report->id) }}"><i
                                                class="fa-solid fa-trash"></i> Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('Emart.include.nav_bottom')
    @include('Emart.include.script')
</body>

</html>
