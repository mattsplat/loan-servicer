@extends('partials.main')

@section('heading')
    <section class="content-header">
        <h1>
            Customers Show
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
                            <th class="text-center">Name</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">SSN</th>
                            <th class="text-center">Loan Total</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr class="customer-row" data-id="{{ $customer->id }}">
                                <td class="text-center">{{ $customer->first_name .' '. $customer->last_name }}</td>
                                <td class="text-center">{{ $customer->phone }}</td>
                                <td class="text-center">{{ 'XXX-XX-'.substr($customer->ssn, -4) }}</td>
                                <td class="text-right" >{{ money_format('$ %i' ,$customer->totalLoanAmount()) }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <p>Total: {{count($customers)}}</p>
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
                window.location = '/customers/'+ id;
            });
        });
    </script>

@endsection