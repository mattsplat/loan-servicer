@extends('partials.main')

@section('heading')
    <section class="content-header">
        <h1>
            {{$loan->property->address}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12 box">
            <div class="col-md-4">
                <div class="box-header info">
                    <p><strong>Customer Name:</strong> <a href="/customers/{{$loan->customer->id}}">
                            {{ $loan->customer->first_name .' '.$loan->customer->last_name }}
                        </a>
                    </p>
                    <hr>
                    <p><strong>Original loan amount:</strong> {{ money_format('$ %i',$loan->start_amount) }}</p>
                    <p><strong>Starting LTV:</strong> {{round(($loan->start_amount/ $loan->property->value)*100, 2)}}%</p>
                    <p><strong>Property Value:</strong> {{ money_format('$ %i',$loan->property->value) }}</p>
                    <p><strong>Current Balance:</strong> {{ money_format('$ %i',$loan->balance ) }}</p>
                    <p><strong>Current LTV:</strong> {{round(($loan->balance / $loan->property->value)*100, 2)}}%</p>
                    <p><strong>Insurance Company:</strong> {{$loan->insurance->first()->company}}</p>
                    <p><strong>Insurance Premium:</strong> {{ money_format('$ %i',$loan->property->insurance->sum('cost')) }}</p>
                    <p><strong>Yearly Taxes:</strong> {{ money_format('$ %i', $loan->property->tax) }}</p>
                    <br>
                    <p><strong>Age of Loan:</strong> {{$loan->age()}}</p>
                    <p><strong>Term:</strong> {{$loan->term}}</p>
                    <p><strong>Rate:</strong> {{$loan->rate}}%</p>


                    <p><strong>Payments Made: </strong> <a href="/loans/{{$loan->id}}/payments">{{$loan->payments->count()}}</a></p>
                </div>

            </div>
            <div class="col-md-8">
                <div class="box-body">
                    <h2>Stats</h2>
                    <div id="canvas-holder" class="chart">
                        <canvas id="myChart" style="height:500px"></canvas>
                    </div>

                </div>
            </div>
            <div class="col-md-12">
                <div id="canvas-holder" class="chart">
                    <canvas id="canvas" style="height:500px"></canvas>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')
<!-- ChartJS -->
<script src="{{asset('/bower_components/chart.js/Chart.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/bower_components/admin-lte/dist/js/demo.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Interest", "Principal", "Tax", "Insurance", "Fee"],
            datasets: [{
                data: [
                    {{$loan->payments->sum('interest')}},
                    {{$loan->payments->sum('principal')}},
                    {{$loan->payments->sum('tax')}},
                    {{$loan->payments->sum('insurance')}},
                    {{$loan->payments->sum('fee')}}
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {

        }
    });

    var lineChartData = {
        labels: {{$loan->payments->pluck('date')->keys()}},
        datasets: [{
            label: "Principal",
            borderColor: 'rgba(255,99,132,1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            fill: false,
            data: {{$loan->payments->pluck('principal')}},
            yAxisID: "y-axis-1",
        }, {
            label: "Interest",
            borderColor: 'rgba(54, 162, 235, 0.2)',
            backgroundColor: 'rgba(54, 162, 235, 1)',
            fill: false,
            data: {{$loan->payments->pluck('interest')}},
            yAxisID: "y-axis-2"
        }]
    };

    window.onload = function() {
        var btx = document.getElementById("canvas").getContext("2d");
        window.myLine = Chart.Line(btx, {
            data: lineChartData,
            options: {
                responsive: true,
                hoverMode: 'index',
                stacked: false,
                title:{
                    display: true,
                    text:'Chart.js Line Chart - Multi Axis'
                },
                scales: {
                    yAxes: [{
                        type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                        display: true,
                        position: "left",
                        id: "y-axis-1",
                    }, {
                        type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                        display: true,
                        position: "right",
                        id: "y-axis-2",

                        // grid line settings
                        gridLines: {
                            drawOnChartArea: false, // only want the grid lines for one axis to show up
                        },
                    }],
                }
            }
        });
    };


</script>

@endsection