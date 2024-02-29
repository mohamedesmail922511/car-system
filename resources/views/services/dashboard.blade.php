<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    @include('Emart.include.style')
    <style>
        @media screen and (max-width: 3000px) {
            .nav-bottom {
                display: none;
            }
        }

        @media screen and (max-width: 1199px) {
            .nav-bottom {
                display: block;
            }
        }
    </style>
</head>

<body class="g-sidenav-show rtl bg-gray-100">
    @include('services.includes.side')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        <!-- Navbar -->
        @include('Emart.include.nav')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <canvas id="myChart" height="100px"></canvas>
                </div>
            </div>
        </div>
        {{-- service grid end --}}

        <!-- Modal -->
        @include('services.includes.service_model')



        @if (isset($service_id))
            @include('services.includes.worker_model')
            @include('services.includes.task_model')
        @endif

        </div>
    </main>



    @include('services.includes.back')

    <!--   Core JS Files   -->
    @include('Emart.include.script')
    <script type="text/javascript">
        var labels = {{ Js::from($labels) }};
        var users = {{ Js::from($data) }};

        const data = {
            labels: labels,
            datasets: [{
                label: 'احصائية عدد العملاء علي مدار الشهر',
                backgroundColor: 'blue',
                borderColor: 'blue',
                data: users,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>

</html>
