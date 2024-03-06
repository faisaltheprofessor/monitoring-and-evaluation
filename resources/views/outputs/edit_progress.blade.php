@extends('app')
@section('styles')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="/assets/js/plugins/select2/css/select2.css">
@stop

@section('page-title')
    {{ $progress->plan->activity->name }}
@stop

@section('content')
@php
$months =  [
 '1' => 'January',
 '2' => 'February',
 '3' => 'March',
 '4' => 'April',
 '5' => 'May',
 '6' => 'June',
 '7' => 'July',
 '8' => 'August',
 '9' => 'September',
 '10' => 'October',
 '11' => 'November',
 '12' => 'December',
];

$years = [
'2014' => '2014',
'2015' => '2015',
'2016' => '2016',
'2017' => '2017',
'2018' => '2018',
'2019' => '2019',
'2020' => '2020',
'2021' => '2021',
'2022' => '2022',
'2023' => '2023',
'2024' => '2024',
'2025' => '2025',
];

$district = null;
if($progress->district) $district = $progress->district_id;
$village = null;
if($progress->village) $village = $progress->village_id;

@endphp

<div class="block">
    <div class="block-header block-header-default bg-primary-light">
        <h3 class="block-title">Edit Progress</h3>
    </div>
    <div class="block-content">
    <form action="/progress" method="post" class="js-validation-bootstrap">
        @method('PUT')
        @csrf
        {{ Form::hidden('id', $progress->id, ['class' => 'form-control', 'placeholder' => 'Choose Plan...',]) }}

        {{-- Province, District, Village --}}
        <div class="row">
            {{--                                    Province --}}


            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('province_id', 'Province', ['style' => 'display:block']) }}
                    {{ Form::select('province_id', $provinces, $progress->province->id, ['class' => 'form-control select2', 'placeholder' => 'Select ...', 'required'=> 'required']) }}
                    <i class="form-group__bar"></i>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('district_id', 'District', ['style' => 'display:block']) }}
                    <div id="district-list">
                        {{-- {{ Form::select('district_id', [], null, ['class' => 'form-control select2','placeholder' => 'Select ...']) }} --}}
                        {{ Form::select('district_id', App\District::pluck('name', 'id')->toArray(), $district, ['class' => 'form-control select2','placeholder' => 'Select ...']) }}
                    </div>
                    <i class="form-group__bar"></i>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('village_id', 'Village', ['style' => 'display:block']) }}
                    {{ Form::select('village_id', $villages, $village, ['class' => 'form-control select2', 'placeholder' => 'Select ...']) }}
                    <i class="form-group__bar"></i>
                </div>


                <input type="hidden" name="model" value="Progress">
                <div class="clearfix"></div>

            </div>
        </div>

        {{-- Start Date, End Date, Quantity --}}
        <div class="row">
            <div class="col col-lg-4 col-md-12 col-sm-12">
                <label>Month</label>
                {!!  Form::select('month', $months, $progress->start_date->month, ['class' => 'form-control select2', 'placeholder' => 'Select Month', 'required' => 'required'] ) !!}
            </div>

            <div class="col col-lg-4 col-md-12 col-sm-12">
                <label>Year</label>
                {!!  Form::select('year', $years, $progress->start_date->year, ['class' => 'form-control select2', 'placeholder' => 'Select Month', 'required' => 'required'] ) !!}
            </div>
            <div class="col col-lg-4 col-md-12 col-sm-12">
                {{ Form::label('quantity', 'Quantity') }}
                {{ Form::text('quantity', $progress->quantity, ['class' => 'form-control', 'required' => 'required']) }}
                <i class="form-group__bar"></i>
            </div>

            .

        </div>


        <div class="row">
            {{--Cost--}}
            <div class="col col-lg-4 col-md-12 col-sm-12 form-group">
                {{ Form::label('cost', 'Cost') }}
                {{ Form::number('cost', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>
            </div>

            {{--                                        Progress --}}

            <div class="col col-lg-4 col-md-12 col-sm-12 form-group">
                {{ Form::label('Progress', 'Progress (%)') }}
                {{ Form::number('percentage', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>


            </div>

            {{-- Command Area--}}
            <div class="col col-lg-4 col-md-12 col-sm-12 form-group">
                {{ Form::label('command_area', 'Command Area') }}
                {{ Form::text('command_area', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>
            </div>

        </div>

        {{--                                    GPS Coordinates --}}

        <div class="row">
            {{--Lat--}}
            <div class="col col-lg-3 col-md-6 col-sm-12 form-group">
                {{ Form::label('lat_start', 'GPS Latitude') }}
                {{ Form::text('lat_start', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>

            </div>


            {{--Long--}}
            <div class="col col-lg-3 col-md-6 col-sm-12 form-group">
                {{ Form::label('long_start', 'GPS Longitude') }}
                {{ Form::text('long_start', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>

            </div>

            {{--End Lat--}}

            <div class="col col-lg-3 col-md-6 col-sm-12 form-group">
                {{ Form::label('lat_end', 'End GPS Latitude') }}
                {{ Form::text('lat_end', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>

            </div>


            {{--End Long--}}

            <div class="col col-lg-3 col-md-6 col-sm-12 form-group">
                {{ Form::label('long_end', 'End GPS Longitude') }}
                {{ Form::text('long_end', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>

            </div>



        </div>


        {{--                                    Descriptioin and Remarks--}}

        <div class="row">


            <div class="col col-lg-6 col-md-6 col-sm-12 form-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::text('description', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>
            </div>



            <div class="col col-lg-6 col-md-6 col-sm-12 form-group">
                {{ Form::label('remarks', 'Remarks') }}
                {{ Form::text('remarks', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>
            </div>


            <div class="col col-lg-12 col-md-12 col-sm-12 form-group">
               <input type="submit" value="Update" class="btn btn-success pull-right btn-lg">
            </div>

            


        </div>






    </div>
</div>

@endsection


@section('scripts')
@include('includes.success')
<script src="/assets/js/plugins/select2/js/select2.full.min.js"></script>
<script>
    $('.select2').select2({
    width: '100%'
});
</script>
@stop