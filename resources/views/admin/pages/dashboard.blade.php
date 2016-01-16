@extends('admin.base')



@section('content')
    <div class="cl-page-header">
        <div class="container">
            <h2 class="page-title">Home</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col l8">
            <h5 class="sub-section-heading">Visitors in the last 30 days</h5>
            <canvas class="stats-chart" id="myChart" width="800" height="400"></canvas>
        </div>
        <div class="col l4">
            <h5 class="sub-section-heading">Blog post breakdown</h5>
            <canvas class="stats-chart" id="piepie" width="300" height="300"></canvas>
        </div>
    </div>
    <div class="container">
        <div class="stat-badge">
            <span class="stat-label">Visitors last month</span>
            <span class="stat-num">{{ $totalVisitors }}</span>
        </div>
        @foreach($categories as $category)
            <div class="stat-badge">
                <span class="stat-label">published {{ str_plural($category->name) }}</span>
                <span class="stat-num">{{ $category->posts->count() }}</span>
            </div>
        @endforeach
    </div>


@endsection

@section('bodyscripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    <script>
        var ctx = document.querySelector('#myChart').getContext('2d')
        console.log({!! $cats !!});
        var data = {
            labels: {!! $labels !!},
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(137,226,177,0.5)",
                    strokeColor: "rgba(220,220,220,0.8)",
                    highlightFill: "rgba(220,220,220,0.75)",
                    highlightStroke: "rgba(220,220,220,1)",
                    data: {!! $pageViews !!}
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(62,216,147,0.5)",
                    strokeColor: "rgba(151,187,205,0.8)",
                    highlightFill: "rgba(151,187,205,0.75)",
                    highlightStroke: "rgba(151,187,205,1)",
                    data: {!! $visitors !!}
                }
            ]
        };
        var options = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero : true,

            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines : false,

            //String - Colour of the grid lines
            scaleGridLineColor : "rgba(0,0,0,.05)",

            //Number - Width of the grid lines
            scaleGridLineWidth : 1,

            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,

            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,

            //Boolean - If there is a stroke on each bar
            barShowStroke : true,

            //Number - Pixel width of the bar stroke
            barStrokeWidth : 2,

            //Number - Spacing between each of the X value sets
            barValueSpacing : 5,

            //Number - Spacing between data sets within X values
            barDatasetSpacing : 1

            //String - A legend template


        }
        var myBarChart = new Chart(ctx).Bar(data, options);

        var pctx = document.querySelector('#piepie').getContext('2d');
        var pdata = {!! $cats !!};
        var poptions = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke : true,

            //String - The colour of each segment stroke
            segmentStrokeColor : "#fff",

            //Number - The width of each segment stroke
            segmentStrokeWidth : 2,

            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout : 50, // This is 0 for Pie charts

            //Number - Amount of animation steps
            animationSteps : 100,

            //String - Animation easing effect
            animationEasing : "easeOutBounce",

            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate : true,

            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale : false,
        };
        var myDoughnutChart = new Chart(pctx).Doughnut(pdata,poptions);
    </script>
@endsection