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
                <h2 class="h3 mb-0">Overview</h2>
            </div>

        <div class="container-fluid">
            <form action="{{ route('add.review',$client->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-4">
                        <label>{{ __('words.question1') }}</label>
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="question1">
                                <option selected value="yes"> Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <label>{{ __('words.question2') }}</label>
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="question2">
                                <option selected value="yes"> Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <label>{{ __('words.question3') }}</label>
                        <input type="text" class="form-control" name="question3">
                    </div>

                    <div class="col-12 col-md-4">
                        <label>{{ __('words.question4') }}</label>
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="question4">
                                <option selected value="yes"> Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-12 col-md-4">
                        <label>{{ __('words.question5') }}</label>
                        <input type="text" class="form-control" name="question5">
            
                    </div>

                    <div class="col-12 text-center mt-3">
                        <button class="btn btn-primary">{{ __('words.addreview') }}</button>
                    </div>
            </form>
        
        </div>
        <hr>
        <br><br>
        <div class="card-box mb-30 pt-5">
            <div class="pb-20">
                <table id="myTable" class="data-table table stripe hover nowrap display">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center table-plus datatable-nosort">ID</th>
                            <th scope="col" class="text-center table-plus datatable-nosort">{{ __('words.name') }}</th>
                            <th scope="col" class="text-center table-plus datatable-nosort">{{ __('words.question1') }}</th>
                            <th scope="col" class="text-center">{{ __('words.question2') }}</th>
                            <th scope="col" class="text-center">{{ __('words.question3') }}</th>
                            <th scope="col" class="text-center">{{ __('words.question4') }} </th>
                            <th scope="col" class="text-center">{{ __('words.question5') }} </th>
                            
                        </tr>
                    </thead>
                    <tbody>
    
                        @foreach ($reviews as $review)
                            <tr>
    
                                <td class="text-center table-plus">{{ $review->id }}</td>
                                <td class="text-center table-plus">{{ $review->name }}</td>
                                <td class="text-center table-plus">{{ $review->question1 }}</td>
                                <td class="text-center">{{ $review->question2 }}</td>
                                <td class="text-center">{{ $review->question3 }}</td>
                                <td class="text-center">{{ $review->question4 }}</td>
                                <td class="text-center">{{ $review->question5 }}</td>
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
