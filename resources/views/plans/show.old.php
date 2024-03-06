@extends('app')

@section('styles')
@include('includes.datepickerCss')

{{-- @include('includes.select2css')--}}

<style>
    .updated {
        color: green;
    }

    .modal-lg {
        max-width: 4000px !important;
        width: 1250px;
    }

    .modal table {
        color: black;
    }
</style>
@stop
@section('page-title')
{{ $plan->activity->name }}
@stop
@section('main-content')
<div class="card-title"> Plan</div>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            {{--<th>ID</th>--}}
            <th>Activity</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Cost</th>
            <th>Quarter</th>
            <th>Indicator</th>
            <th>Component</th>
            <th>Subcomponent</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            {{-- <td>{{ $plan->id }}</td>--}}
            <td>{{ $plan->activity->name }}</td>
            <td>{{ $plan->quantity}}</td>
            <td>{{ $plan->unit->name}}</td>
            <td>{{ $plan->cost }}</td>
            <td>
                @if($plan->quarter == 0) Annual
                @else {{ \App\Helpers\AppHelpers::instance()->addOrdinalNumberSuffix($plan->quarter) }}
                @endif
            </td>
            <td>@if($plan->indicator){{ $plan->indicator->name}}@endif</td>
            <td>{{ $plan->component->name}}</td>
            <td>{{ $plan->subcomponent->name}}</td>
        </tr>
    </tbody>

</table>
@if(!$plan->output)
<div class="text-center">
    {{-- <a class="btn btn-primary" href="/output/create-for-plan?plan_id={{$plan->id}}">Add Output</a> --}}
</div>
@endif

</div>
</div>
</div>

<div class="row">
    <div class="col-9">
        {{-- Progress Details--}}
        <div class="card">

            <div class="card-body">
                <div class="card-title">
                    <p class="float-left">Output Progress Details</p>
                    <div class="float-right">
                        @unless ($plan->progress == 100)
                        <button class="btn btn-primary" id="show-add-progress-modal">Add Progress</button>
                        @endunless
                    </div>
                </div>
                <div class="card-text">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Location</th>
                                <th>Start Date</th>
                                <th>Quantity</th>




                            </tr>
                        </thead>
                        <tbody>
                            @php $quantity = 0; $x = 1 @endphp
                            @foreach($plan->overAllProgress as $progress)
                            <tr>
                                <td>{{ $x++ }}</td>
                                <td>
                                    @if($progress->province)
                                    {{$progress->province->name}}
                                    @endif
                                    @if ($progress->district)
                                    - {{ $progress->district->name }}
                                    @endif
                                </td>


                                @php $quantity += $progress->quantity @endphp
                                <td>{{$progress->start_date->format('F')}} - {{$progress->start_date->year}} </td>
                                <td>{{$progress->quantity}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>{{ $quantity }}</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>


                {{--Modal--}}
                <div class="modal fade" id="monthly-progress" style="overflow:hidden;">
                    <div class="modal-dialog modal-lg modal-xlg" style="width:1250px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title pull-left">Monthly Progress</h5>
                            </div>
                            <hr>
                            <div class="modal-body modal-lg">
                                <form action="/addMonthlyProgress" method="post">
                                    @csrf
                                    {{ Form::hidden('plan_id', $plan->id, ['class' => 'form-control select2', 'placeholder' => 'Choose Plan...']) }}

                                    {{-- Province, District, Village --}}
                                    <div class="row">
                                        {{-- Province --}}


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {{ Form::label('province_id', 'Province', ['style' => 'display:block']) }}
                                                {{ Form::select('province_id', $provinces, null, ['class' => 'form-control', 'placeholder' => 'Select ...', 'required'=> 'required']) }}
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {{ Form::label('district_id', 'District', ['style' => 'display:block']) }}
                                                {{ Form::select('district_id', $districts, null, ['class' => 'form-control','placeholder' => 'Select ...']) }}
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {{ Form::label('village_id', 'Village', ['style' => 'display:block']) }}
                                                {{ Form::select('village_id', $villages, null, ['class' => 'form-control', 'placeholder' => 'Select ...']) }}
                                                <i class="form-group__bar"></i>
                                            </div>


                                            <input type="hidden" name="model" value="Progress">
                                            <div class="clearfix"></div>

                                        </div>
                                    </div>

                                    {{-- Start Date, End Date, Quantity --}}
                                    <div class="row">
                                        <div class="col col-lg-4 col-md-12 col-sm-12">
                                            <label>Start Date</label>
                                            {{--Start Date--}}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                                </div>
                                                {{--<input type="date" class="form-control hidden-md-up" placeholder="Pick a date" name="start_date">--}}
                                                <input type="text" class="form-control date-picker hidden-sm-down" placeholder="Pick a date" name="start_date" required>
                                                <i class="form-group__bar"></i>

                                            </div>
                                        </div>

                                        <div class="col col-lg-4 col-md-12 col-sm-12">
                                            <label>End Date</label>
                                            {{-- End Date--}}
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                                </div>
                                                {{--<input type="date" class="form-control hidden-md-up" placeholder="Pick a date" name="end_date">--}}
                                                <input type="text" class="form-control date-picker hidden-sm-down" placeholder="Pick a date" name="end_date">
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>


                                        <div class="col col-lg-4 col-md-12 col-sm-12">
                                            {{ Form::label('quantity', 'Quantity') }}
                                            {{ Form::text('quantity', null, ['class' => 'form-control', 'required' => 'required']) }}
                                            <i class="form-group__bar"></i>
                                        </div>

                                    </div>


                                    <div class="row">
                                        {{--Cost--}}
                                        <div class="col col-lg-4 col-md-12 col-sm-12 form-group">
                                            {{ Form::label('cost', 'Cost') }}
                                            {{ Form::number('cost', null, ['class' => 'form-control']) }}
                                            <i class="form-group__bar"></i>
                                        </div>

                                        {{-- Progress --}}

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

                                    {{-- GPS Coordinates --}}

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


                                    {{-- Descriptioin and Remarks--}}

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






                                    </div>


                                    {{-- Add Progress Button--}}

                                    <div class="row pull-right">
                                        <div class="form-group col">
                                            <input type="reset" value="Cancel" class="btn  btn-danger form-control">
                                            {{--<input type="submit" value="Save " class="btn  btn-primary">--}}
                                        </div>
                                        <div class="form-group col">
                                            <input type="submit" class="btn btn-success form-control" value="Add Progress">

                                        </div>
                                    </div>
                                    @extends('app')
                                    @section('styles')
                                    @include('includes.datepickerCss')

                                    {{-- @include('includes.select2css')--}}

                                    <style>
                                        .updated {
                                            color: green;
                                        }

                                        .modal-lg {
                                            max-width: 4000px !important;
                                            width: 1250px;
                                        }

                                        .modal table {
                                            color: black;
                                        }
                                    </style>
                                    @stop
                                    @section('page-title')
                                    {{ $plan->activity->name }}
                                    @stop
                                    @section('main-content')
                                    <div class="card-title"> Plan</div>
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                {{--<th>ID</th>--}}
                                                <th>Activity</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Cost</th>
                                                <th>Quarter</th>
                                                <th>Indicator</th>
                                                <th>Component</th>
                                                <th>Subcomponent</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                {{-- <td>{{ $plan->id }}</td>--}}
                                                <td>{{ $plan->activity->name }}</td>
                                                <td>{{ $plan->quantity}}</td>
                                                <td>{{ $plan->unit->name}}</td>
                                                <td>{{ $plan->cost }}</td>
                                                <td>
                                                    @if($plan->quarter == 0) Annual
                                                    @else {{ \App\Helpers\AppHelpers::instance()->addOrdinalNumberSuffix($plan->quarter) }}
                                                    @endif
                                                </td>
                                                <td>@if($plan->indicator){{ $plan->indicator->name}}@endif</td>
                                                <td>{{ $plan->component->name}}</td>
                                                <td>{{ $plan->subcomponent->name}}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                    @if(!$plan->output)
                                    <div class="text-center">
                                        {{-- <a class="btn btn-primary" href="/output/create-for-plan?plan_id={{$plan->id}}">Add Output</a> --}}
                                    </div>
                                    @endif

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-9">
                            {{-- Progress Details--}}
                            <div class="card">

                                <div class="card-body">
                                    <div class="card-title">
                                        <p class="float-left">Output Progress Details</p>
                                        <div class="float-right">
                                            @unless ($plan->progress == 100)
                                            <button class="btn btn-primary" id="show-add-progress-modal">Add Progress</button>
                                            @endunless
                                        </div>
                                    </div>
                                    <div class="card-text">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Location</th>
                                                    <th>Start Date</th>
                                                    <th>Quantity</th>




                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $quantity = 0; $x = 1 @endphp
                                                @foreach($plan->overAllProgress as $progress)
                                                <tr>
                                                    <td>{{ $x++ }}</td>
                                                    <td>
                                                        @if($progress->province)
                                                        {{$progress->province->name}}
                                                        @endif
                                                        @if ($progress->district)
                                                        - {{ $progress->district->name }}
                                                        @endif
                                                    </td>


                                                    @php $quantity += $progress->quantity @endphp
                                                    <td>{{$progress->start_date->format('F')}} - {{$progress->start_date->year}} </td>
                                                    <td>{{$progress->quantity}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>{{ $quantity }}</th>

                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>


                                    {{--Modal--}}
                                    <div class="modal fade" id="monthly-progress" style="overflow:hidden;">
                                        <div class="modal-dialog modal-lg modal-xlg" style="width:1250px;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title pull-left">Monthly Progress</h5>
                                                </div>
                                                <hr>
                                                <div class="modal-body modal-lg">
                                                    <form action="/addMonthlyProgress" method="post">
                                                        @csrf
                                                        {{ Form::hidden('plan_id', $plan->id, ['class' => 'form-control select2', 'placeholder' => 'Choose Plan...']) }}

                                                        {{-- Province, District, Village --}}
                                                        <div class="row">
                                                            {{-- Province --}}


                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    {{ Form::label('province_id', 'Province', ['style' => 'display:block']) }}
                                                                    {{ Form::select('province_id', $provinces, null, ['class' => 'form-control', 'placeholder' => 'Select ...', 'required'=> 'required']) }}
                                                                    <i class="form-group__bar"></i>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    {{ Form::label('district_id', 'District', ['style' => 'display:block']) }}
                                                                    {{ Form::select('district_id', $districts, null, ['class' => 'form-control','placeholder' => 'Select ...']) }}
                                                                    <i class="form-group__bar"></i>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    {{ Form::label('village_id', 'Village', ['style' => 'display:block']) }}
                                                                    {{ Form::select('village_id', $villages, null, ['class' => 'form-control', 'placeholder' => 'Select ...']) }}
                                                                    <i class="form-group__bar"></i>
                                                                </div>


                                                                <input type="hidden" name="model" value="Progress">
                                                                <div class="clearfix"></div>

                                                            </div>
                                                        </div>

                                                        {{-- Start Date, End Date, Quantity --}}
                                                        <div class="row">
                                                            <div class="col col-lg-4 col-md-12 col-sm-12">
                                                                <label>Start Date</label>
                                                                {{--Start Date--}}
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                                                    </div>
                                                                    {{--<input type="date" class="form-control hidden-md-up" placeholder="Pick a date" name="start_date">--}}
                                                                    <input type="text" class="form-control date-picker hidden-sm-down" placeholder="Pick a date" name="start_date" required>
                                                                    <i class="form-group__bar"></i>

                                                                </div>
                                                            </div>

                                                            <div class="col col-lg-4 col-md-12 col-sm-12">
                                                                <label>End Date</label>
                                                                {{-- End Date--}}
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                                                    </div>
                                                                    {{--<input type="date" class="form-control hidden-md-up" placeholder="Pick a date" name="end_date">--}}
                                                                    <input type="text" class="form-control date-picker hidden-sm-down" placeholder="Pick a date" name="end_date">
                                                                    <i class="form-group__bar"></i>
                                                                </div>
                                                            </div>


                                                            <div class="col col-lg-4 col-md-12 col-sm-12">
                                                                {{ Form::label('quantity', 'Quantity') }}
                                                                {{ Form::text('quantity', null, ['class' => 'form-control', 'required' => 'required']) }}
                                                                <i class="form-group__bar"></i>
                                                            </div>

                                                        </div>


                                                        <div class="row">
                                                            {{--Cost--}}
                                                            <div class="col col-lg-4 col-md-12 col-sm-12 form-group">
                                                                {{ Form::label('cost', 'Cost') }}
                                                                {{ Form::number('cost', null, ['class' => 'form-control']) }}
                                                                <i class="form-group__bar"></i>
                                                            </div>

                                                            {{-- Progress --}}

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

                                                        {{-- GPS Coordinates --}}

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


                                                        {{-- Descriptioin and Remarks--}}

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






                                                        </div>


                                                        {{-- Add Progress Button--}}

                                                        <div class="row pull-right">
                                                            <div class="form-group col">
                                                                <input type="reset" value="Cancel" class="btn  btn-danger form-control">
                                                                {{--<input type="submit" value="Save " class="btn  btn-primary">--}}
                                                            </div>
                                                            <div class="form-group col">
                                                                <input type="submit" class="btn btn-success form-control" value="Add Progress">

                                                            </div>
                                                        </div>




                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                {{--<button type="button" class="btn btn-link ajax-item-save" >Save changes</button>--}}
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- End of History Modal --}}


                                </div>

                            </div>
                        </div>

                        <div class="col-3">
                            <div class="card" style="background: @if($plan->progress == 100) #33c786 @endif;">

                                <div class="card-body">
                                    <div class="card-title">
                                        <h2>Current Status</h2>
                                    </div>
                                    <div class="card-text">
                                        <h4 style="color: inherit">Completion Rate:{{ $plan->progress }}%</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @stop

                    @section('scripts')
                    <!-- @include('includes.datepicker') -->
                    <!-- {{-- @include('includes.select2')--}} -->

                    {{-- <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>--}}
                    <script src="{{ asset('theme/plugins/x-edit/js/bootstrap-editable.js') }}"></script>
                    <link rel="stylesheet" href="{{ asset('theme/plugins/x-edit/css/bootstrap-editable.css') }}">
                    <script>
                        // $.fn.editable.defaults.ajaxOptions = {type: "GET"};
                        $('.view-history').click(() => $('#timeline').modal());
                        $('.update-history').click(() => $('#update').modal());
                        $(document).ready(function() {
                            // $('.editable').editable();
                        });


                        $('#show-add-progress-modal').click(() => $('#monthly-progress').modal());

                        //Moda
                    </script>

                    @include ('includes.success')

                    @stop




                </div>


            </div>
            <div class="modal-footer">
                {{--<button type="button" class="btn btn-link ajax-item-save" >Save changes</button>--}}
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

    {{-- End of History Modal --}}


</div>

</div>
</div>

<div class="col-3">
    <div class="card" style="background: @if($plan->progress == 100) #33c786 @endif;">

        <div class="card-body">
            <div class="card-title">
                <h2>Current Status</h2>
            </div>
            <div class="card-text">
                <h4 style="color: inherit">Completion Rate: {{ $plan->progress }}%</h4>
            </div>
        </div>
    </div>
</div>
</div>

@stop

@section('scripts')
@include('includes.datepicker')
{{-- @include('includes.select2')--}}

{{-- <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>--}}
<script src="{{ asset('theme/plugins/x-edit/js/bootstrap-editable.js') }}"></script>
<link rel="stylesheet" href="{{ asset('theme/plugins/x-edit/css/bootstrap-editable.css') }}">
<script>
    // $.fn.editable.defaults.ajaxOptions = {type: "GET"};
    $('.view-history').click(() => $('#timeline').modal());
    $('.update-history').click(() => $('#update').modal());
    $(document).ready(function() {
        // $('.editable').editable();
    });


    $('#show-add-progress-modal').click(() => $('#monthly-progress').modal());

    //Moda
</script>

@include ('includes.success')

@stop