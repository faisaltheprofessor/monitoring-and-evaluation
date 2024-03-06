@extends('app')
@section('page-title', "Villages")

@section('styles')
    <link rel="stylesheet" href="assets/js/plugins/select2/css/select2.css">
@stop


@section('content')
    @error('name')
    <div class="alert alert-danger alert-dismissible">
        Village already exists
    </div>
    @enderror

    <div class="row">
        <div class="col-md-6">
            <!-- Default Elements -->
            <div class="block">
                <div class="block-header block-header-default bg-primary-light">
                    <h3 class="block-title">Add Village</h3>
                </div>
                <div class="block-content">
                    <form action="/village" method="post" enctype="multipart/form-data" class="js-validation-bootstrap">
                        @csrf

                        <div class="form-group row">
                            <label class="col-12" for="name">Village Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                <!-- <div class="form-text text-muted">Project Name in English</div> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="name_dari">Village Name - Dari</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="name_dari" name="name_dari"
                                       placeholder="Dari Name">
                            </div>
                        </div>




                        <div class="form-group row">
                            <label class="col-12" for="district_id">District</label>
                            <div class="col-md-12">
                                {!! Form::select('district_id', $districts, '', ['class' => 'form-control js-select2', 'placeholder' => '----', 'required' => 'required']) !!}
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-12" for="lat">Latitude</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="lat" name="lat"
                                       placeholder="Latitude">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="long">Longitude</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="long" name="long"
                                       placeholder="Longitude">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Default Elements -->
        </div>
        <div class="col-md-6">
            <!-- Dynamic Table Full -->
            <div class="block">
                <div class="block-header block-header-default bg-primary-light">
                    <h3 class="block-title">Village List <small>Full</small></h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table
                        class="table tasdfdvfdsdffsadfsdafble-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>District</th>
                            <th>Province</th>

                            {{--                    <th class="text-center" style="width: 15%;">Actions</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($villages as $village)
                            <tr>
                                <td class="text-center">{{ $village->id }}</td>
                                <td class="font-w600">{{ $village->name }}</td>
                                <td class="font-w600">{{ $village->district->name }}</td>
                                <td class="font-w600">{{ $village->district->province->name }}</td>
                                {{--                    <td class="d-none d-sm-table-cell">--}}
                                {{--                        <a href="#"><i class="fa fa-pencil"></i></a> &nbsp; &nbsp;--}}
                                {{--                        <a href="#"><i class="fa fa-trash" style="color:crimson"></i></a>--}}
                                {{--                    </td>--}}

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop
j
@section('scripts')

    <!-- Page JS Plugins -->
    <script src="/assets/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <!-- Page JS Helpers (Select2 plugin) -->
    <script>jQuery(function () {
            Codebase.helpers('select2');
        });</script>

    <!-- Page JS Code -->
    <script src="/assets/js/plugins/jquery-validation/additional-methods.js"></script>

    <!-- Page JS Helpers (Select2 plugin) -->
    <script>jQuery(function () {
            Codebase.helpers('select2');
        });</script>

    <!-- Page JS Code -->
    <script src="/assets/js/pages/be_forms_validation.min.js"></script>
    @include('includes.success')


@stop
