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
                <h2 class="h3 mb-0">{{ __('words.statistics') }}</h2>
            </div>
            <div class="container-fluid">
                <a href="{{ route('show.sales.statistics') }}"class="btn btn-primary my-5">{{ __('words.salesstatics') }}</a>
                <div class="row justify-content-center">

                    <div class="col-12" style="margin-bottom: 200px">
                        <canvas id="myChart" height="500px" class="w-100" ></canvas>
                    </div>

                </div>
            </div>

        </div>
    </div>

    @include('Emart.include.nav_bottom')
    @include('Emart.include.script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        var labels = {{ Js::from($labels) }};
        var users = {{ Js::from($data) }};

        const data = {
            labels: labels,
            datasets: [{
                label: 'عدد الفواتير / يوم',
                backgroundColor: 'blue',
                borderColor: 'blue',
                data: users,
            }]
        };


        const config = {
            type: 'line',
            data: data,
            options: {
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {
                        min: 0,
                        max: 20
                    }
                }
            }
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>

</html>
