@extends('app')
@section('breadcrumb')
   {{  Breadcrumbs::render('plan') }}
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">

            <!-- Dynamic Table Full Pagination -->
            <div class="block">
                <div class="block-header block-header-default bg-primary-light">
                    <h3 class="block-title">All Plans</h3>
{{--                    <a href="/plans" style="float: right; margin-right:20px; margin-bottom: 20px;" class="btn btn-info">View--}}
{{--                        All--}}
{{--                        Plans</a>--}}
                    <a href="/plan/create" style="float: right; margin-right:10px; margin-bottom: 20px;"
                       class="btn btn-success">Create
                        Plan</a>
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Activity</th>
                            <th>Project</th>
                            <th>Component</th>
                            <th>Subcomponent</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $x = 1 @endphp
                        @foreach($plans as $plan)
                            <tr>
                                <td class="text-center">{{ $x++ }}</td>
                                <td class="font-w600">
                                    @if ($plan->activity)
                                        {{ $plan->activity->name}} - <small style="color: white;padding:5px;border-radius:5px; background:black">{{ $plan->year }}</small>
                                        -
                                        <a href="/plan/{{$plan->id}}">Progress</a>
                                        <a href="/plan/{{$plan->id}}/edit" style="float:right"><i class="fa fa-pencil"></i></a>
                                    @endif
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    @if ($plan->project)

                                        {{ $plan->project->abbreviation }}
                                    @endif
                                </td>
                                <td class="d-none d-sm-table-cell">

                                          @if ($plan->component)

                                            {{ $plan->component->name }}
                                        @endif

                                </td>
                                <td>
                                    @if ($plan->subcomponent)

                                        {{ $plan->subcomponent->name }}
                                    @endif
                                </td>
{{--                                <td class="text-center">--}}
{{--                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip"--}}
{{--                                            title="View Customer">--}}
{{--                                        <i class="fa fa-user"></i>--}}
{{--                                    </button>--}}
{{--                                </td>--}}
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table Full Pagination -->

        </div>
    </div>


@stop

@section('styles')

    <style>
        tr:hover {
            cursor: pointer;
            color: #27ae60;
        }

    </style>

@stop

@section('scripts')
    <!-- Datatables -->
    <script src="/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/js/pages/be_tables_datatables.min.js"></script>
    <script>
        // $(".table").dataTable();
    </script>

    @include('includes.success')

@stop



