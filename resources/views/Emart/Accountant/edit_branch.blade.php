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
                <h2 class="h3 mb-0">{{ __('words.edit') }}</h2>
            </div>



            @if (session()->has('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p class="text-center fs-6">{{ session()->get('msg') }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif



            <div class="container">
                <form action="{{ route('edit.branch.confirmation', $branch->id) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('words.branchname') }}</label>
                                <input type="text"
                                    class="form-control @if (app()->getLocale() === 'ar') text-right @endif"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" name='branch'
                                    value="{{ $branch->branch }}">
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"
                                    type="submit">{{ __('words.edit') }}</button>
                            </div>


                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

    @include('Emart.include.nav_bottom')
    @include('Emart.include.script')
</body>

</html>
