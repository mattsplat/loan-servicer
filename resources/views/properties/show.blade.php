@extends('partials.main')

@section('heading')
    <section class="content-header">
        <h1>
            {{$property->address}}
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
                    <p><strong>Address:</strong> {{ $property->address }}</p>
                    <hr>
                    <p><strong>Type:</strong> {{ $property->type }}</p>

                    <p><strong>Value:</strong> {{ money_format('$ %i',$property->value) }}</p>
                    <p><strong>Year Built:</strong> {{ $property->year_built }}</p>


                    <p><strong># of Active Loans: </strong> <a href="/properties/{{$property->id}}/loans">{{$property->loans->count()}}</a></p>
                    <p><strong>Total Loan Balance:</strong> {{$property->loans->sum('balance')}}</p>
                    <p><strong>Insurance:</strong> {{$property->insurance->sum('cost') ?? 0}}</p>
                    <p><strong>Total Loan Balance:</strong> {{$property->loans->sum('balance')}}</p>

                    <p><strong>Yearly Taxes:</strong> {{ money_format('$ %i', $property->tax) }}</p>
                    <br>
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

@endsection