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
           <div class="container">
            <div class="row">
                @foreach ($branches as $branch)
                <div class="col-12 border bg-white shadow my-3">
                    <div class="d-flex  justify-content-between align-items-center py-3 ">
                        <p>{{ $branch->branch }}</p>
                        <div>
                            <a href="{{ route('branch.edit',$branch->id) }}" class="btn btn-success"><i class="icon-copy bi bi-pencil-square"></i></a>
                            <a href="{{ route('branch.delete',$branch->id) }}" class="btn btn-danger"><i class="icon-copy bi bi-trash-fill"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
           </div>

        </div>
    </div>

    @include('Emart.include.nav_bottom')
    @include('Emart.include.script')
</body>

</html>
