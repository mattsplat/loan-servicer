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
                    <p><strong>Insurance Company:</strong> {{$loan->property->insurance->company}}</p>
                    <p><strong>Insurance Premium:</strong> {{ money_format('$ %i',$loan->property->insurance->cost) }}</p>
                    <p><strong>Yearly Taxes:</strong> {{ money_format('$ %i', $loan->property->tax) }}</p>
                    <br>
                    <p><strong>Age of Loan:</strong> {{$loan->age()}}</p>
                    <p><strong>Term:</strong> {{$loan->term}}</p>

                    <p><strong>Payments Made: </strong> <a href="/loans/{{$loan->id}}/payments">{{$loan->payments->count()}}</a></p>
                </div>

            </div>
            <div class="col-md-8">

            </div>
        </div>
    </div>



@endsection

@section('scripts')

    {{--<script>
        $(document).ready(function() {
            $(".customer-row").click(function() {
                var id = $(this).data("id");
                window.location = '/loans/'+ id;
            });
        });
    </script>--}}

@endsection