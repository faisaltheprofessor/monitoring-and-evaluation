@extends('app')

@section('page-title', 'Outputs')
@section('main-content')
    <div class="row" style="margin-bottom: 20px;">
        <div class=" col col-md-3 offset-9">
            <select class="form-control select2" id="filter">
                <option value="all">All</option>
                <option value="ongoing">OnGoing</option>
                <option value="ontime">On Time</option>
                <option value="late">Late</option>
                <option value="completed">Completed</option>
            </select>
        </div>
    </div>
    <div class="table-responsive">
        <table id="data-table" class="table table-bordered">
            <thead class="thead-default">
            <tr>
                <th>#</th>
                <th>Activity Name</th>
                <th>Province</th>
                <th>District</th>
                <th>Start Date</th>
                <th>Estimated End Date</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>#</th>
                <th>Activity Name</th>
                <th>Province</th>
                <th>District</th>
                <th>Start Date</th>
                <th>Estimated End Date</th>
            </tr>
            </tfoot>
            <tbody>
                @foreach($outputs as $output)
                    <tr>
                        <td><a href="/plan/{{ $output->plan->id }}">{{ $output->id }}</a></td>
                        <td><a href="/plan/{{ $output->plan->id }}">{{ $output->activity->name }}</a></td>
                        <td><a href="/plan/{{ $output->plan->id }}">{{ $output->province->name }}</a></td>
                        <td><a href="/plan/{{ $output->plan->id }}">{{ $output->district->name }}</a></td>
                        <td><a href="/plan/{{ $output->plan->id }}">{{ $output->start_date->format('d-M-Y') }}</a></td>
                        <td><a href="/plan/{{ $output->plan->id }}">{{ $output->end_date->format('d-M-Y') }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $outputs->links() }}
    </div>

    <button class="btn btn-danger btn--action " data-ma-action="print"><i class="zmdi zmdi-print"></i></button>

@stop
@section('styles')
    @include('includes.select2css')
@stop

@section('scripts')
    <script src="{{ asset('theme/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/jszip/jszip.min.js')  }}"></script>
    <script src="{{ asset('theme/vendors/datatables-buttons/buttons.html5.min.js') }}"></script>
    @include('includes.select2')

    <script>
        let url = window.location.href;
        $('#filter').change(function(){
            let filter = $(this).children('option:selected').val();
            newURL = url+'?filter='+filter;
            alert(newURL);
        });
    </script>
@stop

