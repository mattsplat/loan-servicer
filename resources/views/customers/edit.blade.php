@extends('partials.main')

@section('heading')
    <section class="content-header">
        <h1>
            Customers
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
            <div class="box table-container">
                <div class="box-body table-responsive">
                   <h2>{{$customer->first_name .' '. $customer->last_name }}</h2>
                </div>
                <div class="container contacts-list-info">
                    <ul>
                    @foreach($customer->loans as $loan)
                        <li>{{$loan->start_amount}}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>



@endsection