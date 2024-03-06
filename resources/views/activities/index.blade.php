@extends('app')
@section('page-title')
<div style="display: flex; justify-content:space-between">
    <span>Activities</span>
    <span>
        <a href="/plan" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add Plan
        </a>
    </span>
</div>
@stop
@section('breadcrumb', Breadcrumbs::render('activity'))
@section('styles')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="/assets/js/plugins/select2/css/select2.css">
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="/assets/js/plugins/datatables/dataTables.bootstrap4.css">
@stop

@section('content')


    <div class="row">
        <div class="col-md-6">
            <!-- Default Elements -->
            <div class="block">
                <div class="block-header block-header-default bg-primary-light">
                    <h3 class="block-title">Add Activity</h3>
                </div>
                <div class="block-content">
                    <form class="row js-validation-bootstrap" action="{{ url('activity') }}" method="post" >
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Activity Name</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <label for="name_dari">اسم فعالیت</label>
                                <input type="text" class="form-control" dir="rtl" id="name_dari" name="name_dari">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                {{ Form::label('subcomponent_id', 'Subcomponent') }}
                                {{ Form::select('subcomponent_id', $subComponents, null, ['class' => 'form-control js-select2', 'required' => 'required', 'placeholder' => '----' ]) }}
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                {{ Form::label('unit_id', 'Unit') }}
                                {{ Form::select('unit_id', $units, null, ['class' => 'form-control js-select2', 'required' => 'required', 'placeholder' => '----' ]) }}
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                {{ Form::label('appraisal', 'Appraisal') }}
                                <input type="number" class="form-control" name="appraisal" id="appraisal">

                                <i class="form-group__bar"></i>
                            </div>

                            <div class="clearfix"></div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-alt-primary">Save</button>
                                </div>
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
                    <h3 class="block-title">Activity List <small>Full</small></h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-striped mb-0 table-responsive data-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Activity</th>
{{--                            <th>اسم فعالیت</th>--}}
                            <th style="width: 50%;">Project</th>
                            <th>Component</th>
                            <th>Subcomponent</th>
                            <th>Unit</th>
{{--                            <th>Actions</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @php($x = 1)
                        @foreach ($activities as $activity)
                            <tr>
                                <th scope="row">{{ $x++ }}</th>
                                <td><a href="/activity/{{ $activity->id }}">{{ $activity->name }}</a></td>
{{--                                <td>{{ $activity->name_dari }}</td>--}}
                                <td>{{ $activity->project->name }}</td>
                                <td>{{ $activity->component->name }}</td>
                                <td>{{ $activity->subcomponent->name }}</td>
                                <td>{{ $activity->unit->name }}</td>
{{--                                <td style="text-align: right; width:20%">--}}
{{--                                    <a href="#" class="btn btn-info"><i class="zmdi zmdi-edit"></i></a>--}}
{{--                                    <a href="#" class="btn btn-danger"><i class="zmdi zmdi-delete"></i></a>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop


@section('scripts')
    @include('includes.success')

    <!-- Page JS Plugins -->
    <script src="/assets/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <!-- Page JS Helpers (Select2 plugin) -->
    <script>jQuery(function () {
            Codebase.helpers('select2');
        });</script>


    <script src="/assets/js/plugins/jquery-validation/additional-methods.js"></script>


    <script>jQuery(function () {
            Codebase.helpers('select2');
        });</script>


    <script src="/assets/js/pages/be_forms_validation.min.js"></script>

    <!-- Datatables -->
    <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/pages/be_tables_datatables.min.js"></script>
    <script>
        $(".table").dataTable();
    </script>

@stop

