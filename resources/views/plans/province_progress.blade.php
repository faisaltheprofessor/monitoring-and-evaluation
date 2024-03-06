@extends('app')
@section('page-title', $progresses[0]->province->name . ' - '. $progresses[0]->plan->activity->name)
@section('main-content')

    <table class="table table-hover table-bordered" id="data-table">
        <thead>
        <tr>
            {{--<th>ID</th>--}}
            <th>#</th>
{{--            <th>Activity</th>--}}
            <th>District</th>
{{--            <th>Village</th>--}}
            <th>Quantity</th>
            <th>Month</th>
            <th>Saved By</th>
        </tr>
        </thead>

        <tbody>
            @foreach($progresses as $progress)
                <tr>
                    <td>1</td>
{{--                    <td>--}}
{{--                        @if($progress->plan)--}}
{{--                            {{ $progress->plan->activity->name }}--}}
{{--                        @endif--}}
{{--                    </td>--}}
                    <td>
                        @if($progress->district)
                            {{ $progress->district->name }}
                        @endif
                    </td>
{{--                    <td>--}}
{{--                        @if($progress->village)--}}
{{--                            {{ $progress->village->name }}--}}
{{--                        @endif--}}
{{--                    </td>--}}

                    <td>{{ $progress->quantity }}</td>
                    <td>{{ $progress->start_date->format('F Y') }}</td>

                    <td>{{ $progress->user->first_name}} {{ $progress->user->last_name }}</td>
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
@stop
