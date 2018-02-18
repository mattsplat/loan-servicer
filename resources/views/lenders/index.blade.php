@extends('partials.main')

@section('heading')
    <section class="content-header">
        <h1>
            Lenders
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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lenders as $lender)
                            <tr class="customer-row" data-id="{{ $lender->id }}">
                                <td class="text-center">{{ $lender->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <p>Total: {{count($lenders)}}</p>
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
                window.location = '/lenders/'+ id;
            });
        });
    </script>

@endsection