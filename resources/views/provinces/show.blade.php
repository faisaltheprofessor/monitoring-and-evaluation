@extends('app')


@section('page-title', 'Province: ' .$province->name)




@section('content')

<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Districts: {{ $province->districts->count() }}</h3>
    </div>
    <div class="block-content">
        <div class="row">
            @foreach($province->districts as $district)
            <div class="col-md-4 block" data-id="{{$district->id}}">
                <!-- Primary Alert -->
                @php
                    $colors = ['primary', 'secondary', 'warning', 'info', 'success'];
                @endphp
                <div class="alert alert-{{$colors[array_rand($colors)]}} alert-dismissable" role="alert">
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button> --}}
                    <h3 class="alert-heading font-size-h4 font-w400">{{ $district->name }}</h3>
                    <p class="mb-0">This is a primary message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                </div>
                <!-- END Primary Alert -->
            </div>
            @endforeach
        </div>
    </div>
</div>

@php
$start_dates = App\MonthlyProgress::where('province_id', $province->id)->distinct('start_date')->orderBy('start_date')->pluck('start_date'); 
    // $years = App\MonthlyProgress::where('province_id', $province->id)->distinct('year')->get('year');
    $years = [];
@endphp
@foreach($start_dates as $start_date)
@php
    array_push($years, $start_date->year);
    $years = array_unique($years);
@endphp
@endforeach
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Years: {{ count($years) }}</h3>
    </div>
    <div class="block-content">
        <div class="row">
           
            @foreach($years as $year)
            <div class="col-md-4 block" data-id="{{$district->id}}">
                <!-- Primary Alert -->
                @php
                    $colors = ['primary', 'secondary', 'warning', 'info', 'success'];
                @endphp
                <div class="alert alert-{{$colors[array_rand($colors)]}} alert-dismissable" role="alert">
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button> --}}
                    <h3 class="alert-heading font-size-h4 font-w400">{{ $year }}</h3>
                    <p class="mb-0">This is a primary message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                </div>
                <!-- END Primary Alert -->
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop

@section('extra-content')
<div class="row">
@foreach($province->districts as $district)

    <div class="col-lg-3">
        <div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">{{ $district->name }}</h3>
    </div>
    <div class="block-content" data-toggle="slimscroll" data-height="350px" data-color="#9ccc65" data-opacity="1" data-always-visible="true">
        Projects: 2 <br />
        Components: 3 <br />
        Activities: 2
    </div>
</div>
    </div>

@endforeach
</div>

@stop