@extends('partials.main')

@section('heading')
    <section class="content-header">
        <h1>
            {{$customer->first_name .' '. $customer->last_name }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body ">
                    <h2>Loans</h2>
                    <p># of Loans: {{$customer->loans->count()}}</p>
                </div>
                <div class="container">
                    <ul>

                        @foreach($customer->loans as $loan)

                            <li><a href="/loans/{{$loan->id}}"> {{$loan->property->address}} </a>{{$loan->start_amount}}  </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>



@endsection