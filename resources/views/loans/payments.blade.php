@extends('partials.main')

@section('heading')
    <section class="content-header">
        <h1>
            Payments for #{{$loan->id}}
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
            <h3>Customer Name: {{$loan->customer->first_name.' '.$loan->customer->last_name}}</h3>
            <p>{{$loan->property->address}}</p>
            <div class="box table-container">
                <div class="box-body table-responsive">
                    <table id="customer-table" class="table table-bordered table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th class="text-center">Date</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Interest</th>
                            <th class="text-center">Principal</th>
                            <th class="text-center">Taxes</th>
                            <th class="text-center">Insurance</th>
                            <th class="text-center">Ending Balance</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($loan->payments as $payment)
                            <tr class="customer-row" data-id="{{ $payment->id }}">
                                <td class="text-center">{{ $payment->date->format('m/d/Y') }}</td>
                                <td class="text-center">{{ money_format('$ %i',$payment->amount )}}</td>
                                <td class="text-center">{{ money_format('$ %i',$payment->interest) }}</td>
                                <td class="text-center">{{ money_format('$ %i',$payment->principal) }}</td>
                                <td class="text-center">{{ money_format('$ %i',$payment->tax) }}</td>
                                <td class="text-center">{{ money_format('$ %i',$payment->insurance) }}</td>
                                <td class="text-center">{{ money_format('$ %i',$payment->balance) }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="thead-dark">
                        <tr>

                            <td class="text-center">Totals</td>
                            <td class="text-center">{{money_format('$ %i',$loan->payments->sum('amount') ) }}</td>
                            <td class="text-center">{{money_format('$ %i',$loan->payments->sum('interest')) }}</td>
                            <td class="text-center">{{money_format('$ %i',$loan->payments->sum('principal')) }}</td>
                            <td class="text-center">{{money_format('$ %i',$loan->payments->sum('tax')) }}</td>
                            <td class="text-center">{{money_format('$ %i',$loan->payments->sum('insurance') ) }}</td>
                            <td class="text-center"></td>

                        </tr>
                        </tfoot>
                    </table>
                    <p>Total: {{$loan->payments->count()}}</p>
                </div>
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