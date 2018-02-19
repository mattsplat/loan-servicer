@extends('partials.main')

@section('heading')
    <section class="content-header">
        <h1>
            {{$lender->name}}
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
                    <table id="customer-table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">Loan start date</th>
                            <th class="text-center">Term</th>
                            <th class="text-center">Rate</th>
                            <th class="text-center">Original Loan Amount</th>
                            <th class="text-center">Current Balance</th>
                            <th class="text-center">Monthly Mortgage Only</th>
                            <th class="text-center">Monthly Payment</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lender->loans as $loan)
                            <tr class="customer-row" data-id="{{ $loan->id }}">
                                <td class="text-center">{{ $loan->start_date->format('m/d/Y')}}</td>
                                <td class="text-center">{{ $loan->term }}</td>
                                <td class="text-center">{{ $loan->rate }}</td>
                                <td class="text-center">{{ money_format('$ %i',$loan->start_amount) }}</td>
                                <td class="text-center">{{ money_format('$ %i',$loan->balance ) }}</td>
                                <td class="text-center">{{ money_format('$ %i',$loan->monthlyMortgage()) }}</td>
                                <td class="text-center">{{ money_format('$ %i',$loan->monthlyPayment()) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <p>Total: {{count($lender->loans)}}</p>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            $(".customer-row").click(function() {
                var id = $(this).data("id");
                window.location = '/loans/'+ id;
            });
        });
    </script>

@endsection