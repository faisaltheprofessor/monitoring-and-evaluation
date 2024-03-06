@extends('app')
@php 
    $total_deleted = $trashed_items->count() + $plan_trashed_items->count();
@endphp

@section('page-title', "Trash: " . $total_deleted . ' items')


@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="block">
            <div class="block-header block-header-default bg-primary-light">
                <h3 class="block-title">Progress ({{ $trashed_items->count() }})</h3>
            </div>
            <div class="block-content">
                <table class="table table-responsive">
        
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Activity</th>
                            <th>Province</th>
                            <th>District</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Entry User</th>
                            <th>Deleted at</th>
                        </tr>
                    </thead>
                    @php
                        $x = 1;
                    @endphp
                    <tbody>
                        @foreach($trashed_items as $item)
                            <tr>
                                <td>{{ $x++ }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->activity->name }}</td>
                                <td>@if($item->province){{ $item->province->name }}@endif</td>
                                <td>@if($item->district){{ $item->district->name }}@endif</td>
                                <td>{{ $item->start_date->format('F') }}</td>
                                <td>{{ $item->start_date->year }}</td>
                                <td>{{ $item->user->first_name }}</td>
                                <td>{{ $item->deleted_at->diffForHumans() }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="block">
            <div class="block-header block-header-default bg-primary-light">
                <h3 class="block-title">Plans ({{ $plan_trashed_items->count() }})</h3>
            </div>
            <div class="block-content">
                <table class="table table-responsive">
        
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Activity</th>
                            <th>Year</th>
                            <th>Entry User</th>
                            <th>Deleted at</th>
                        </tr>
                    </thead>
                    @php
                        $x = 1;
                    @endphp
                    <tbody>
                        @foreach($plan_trashed_items as $item)
                            <tr>
                                <td>{{ $x++ }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->activity->name }}</td>
                                <td>{{ $item->year }}</td>
                                <td>{{ $item->user->first_name }}</td>
                                <td>{{ $item->deleted_at->diffForHumans() }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop