@extends('app')
@section('styles')

    @include('includes.select2css')
    @include('includes.datepickerCss')
    <style>
        .plan:hover{
            cursor: pointer;
            background: #e3e3e3;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('theme/demo/css/demo.css') }}">
@stop
@section('page-title', 'Plans and Activities')
@section('main-content')
    <table class="table data-table" id="data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Activity</th>
                <th>Project</th>
                <th>Component</th>
                <th>Subcomponent</th>
                <th>Percentage</th>
                <th>Estimated Date of Completion</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
        @php $x = 1 @endphp
    @foreach ($outputs as $output)
       <tr data-plan="/plan/{{$output->plan->id}}" class="plan">
           <td>{{ $x++ }}</td>
           <td>{{ $output->activity->name }}</td>
           <td>{{ $output->project->name }}</td>
           <td>{{ $output->component->name }}</td>
           <td>{{ $output->subcomponent->name }}</td>
           <td>{{ $output->progress }} %</td>
           <td>{{ $output->end_date->toDateString() }} ({{ $output->end_date->diffForHumans() }})</a></td>
           <td><a href="/plan/{{$output->plan->id}}">{{ $output->description }}</a></td>
       </tr>
    @endforeach
        </tbody>
    </table>
@stop

@section('scripts')
    <script src="{{ asset('theme/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/jszip/jszip.min.js')  }}"></script>
    <script src="{{ asset('theme/vendors/datatables-buttons/buttons.html5.min.js') }}"></script>

    <script>
        $('.plan').click(function(e) {
            window.location.href = ($(this).data('plan'));
        });
    </script>
@stop