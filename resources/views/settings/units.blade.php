@extends('app')
@section('page-title', "Units")

@section('content')

    @error('name')
    <div class="alert alert-danger alert-dismissible">
        Unit already exists
    </div>
    @enderror
    <div class="row">

        <div class="col-md-6">
            <!-- Default Elements -->
            <div class="block">
                <div class="block-header block-header-default bg-primary-light">
                    <h3 class="block-title">Add Unit</h3>
                </div>
                <div class="block-content">
                    <form action="/unit" method="post" enctype="multipart/form-data" class="js-validation-bootstrap">
                        @csrf

                        <div class="form-group row">
                            <label class="col-12" for="name">Unit Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                <!-- <div class="form-text text-muted">Project Name in English</div> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="name_dari">Unit Name - Dari</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="name_dari" name="name_dari"
                                       placeholder="Dari Name">
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
                    <h3 class="block-title">Unit List <small>Full</small></h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table
                        class="table tasdfdvfdsdffsadfsdafble-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th>Name</th>

{{--                            <th class="d-none d-sm-table-cell" style="width: 15%;">Abbreviation</th>--}}
                            {{--                    <th class="text-center" style="width: 15%;">Actions</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($units as $unit)
                            <tr>
                                <td class="text-center">{{ $unit->id }}</td>
                                <td class="font-w600">{{ $unit->name }}</td>

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
