@extends('partials.main')

@section('heading')
    <section class="content-header">
        <h1>
            Properties
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
                                <th class="text-center">Type</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($properties as $property)
                            <tr class="data-row" data-id="{{ $property->id }}">
                                <td class="text-center">{{ $property->type }}</td>
                                <td class="text-center">{{ $property->address }}</td>
                                <td class="text-center">{{ $property->value }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <p>Total: {{count($properties)}}</p>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            $(".data-row").click(function() {
                var id = $(this).data("id");
                window.location = '/properties/'+ id;
            });
        });
    </script>

@endsection