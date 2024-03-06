@extends('app')
@section('breadcrumb',  Breadcrumbs::render('progress',$plan->activity->name, $plan->id))





@section('styles')
<link rel="stylesheet" href="/assets/js/plugins/select2/css/select2.css">
<link rel="stylesheet" href="/assets/js/plugins/datatables/dataTables.bootstrap4.css">

<style>

</style>
@stop
@section('page-title')
    {{ $plan->activity->name }} {{ $plan->year }}
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
     $selected_month = 1;
     $selected_year = 2019;
     if(isset($_GET['year'])) $selected_year = (int) $_GET['year'];
     if(isset($_GET['month'])) $selected_month = (int) $_GET['month'];
    @endphp

    <div class="row">
        <div class="col-md-12">
            <!-- Default Elements -->
            <div class="block">
                <div class="block-header block-header-default bg-primary-light">
                    <h3 class="block-title">Plan</h3>
                </div>
                <div class="block-content">
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
                            {{--                <td>{{ $plan->id }}</td>--}}
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

                        <tfoot>
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
                            </tfoot>
                    </table>

                    @if(!$plan->output)
                        <div class="text-center">
                            {{-- <a class="btn btn-primary" href="/output/create-for-plan?plan_id={{$plan->id}}">Add Output</a> --}}
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-md-9">
            <!-- Default Elements -->
            <div class="block">
                <div class="block-header block-header-default bg-primary-light">
                    <h3 class="block-title">
                        <p class="float-left">Output Progress Details</p>
                            <div class="float-right">

                                    <button class="btn btn-primary" id="show-add-progress-modal">Add Progress</button>

                            </div>
                    </h3>
                </div>
                <div class="block-content">
                    <table class="table table-striped table-bordered datatabl" id="table-log">
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Province</th>
                            <th>District</th>
                            <th>Start Date</th>
                            <th>Quantity</th>
                            <th>Entry User</th>
                            <th>Entry Time</th>
                            <th>Action</th>



                        </tr>
                        </tfoot>
                        <tbody>
                        @php $quantity = 0; $x = 1 @endphp
                        @foreach($plan->overAllProgress as $progress)
                            <tr>
                                <td>{{ $x++ }}</td>
                                <td>{{ $progress->id }}</td>
                                <td>
                                    @if($progress->province)
                                        {{$progress->province->name}}
                                    @endif
                                </td>
                                <td>
                                    @if ($progress->district)
                                        {{ $progress->district->name }}
                                    @endif
                                </td>


                                @php $quantity += $progress->quantity @endphp
                                <td>{{$progress->start_date->format('F')}} - {{$progress->start_date->year}} </td>
                                <td>{{$progress->quantity}}</td>
                                <td>{{ $progress->user->first_name }}</td>
                                <td>@if($progress->created_at->toDateString() == Carbon\Carbon::now()->toDateString()) {{ $progress->created_at->diffForHumans() }} @else {{ $progress->created_at->toDateString() }} @endif</td>
                                <td>
                                    @if($progress->user_id == Auth::user()->id || Auth::user()->id ==1) <a href="/progress/{{$progress->id}}">Edit</a>
                                    @else <a href="#" style="color: #fd5c65">Can't Edit</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Province</th>
                                <th>District</th>
                                <th>Start Date</th>
                                <th>Quantity</th>
                                <th>Entry User</th>
                                <th>Entry Time</th>
                                <th>Action</th>



                            </tr>
                            </thead>

                    </table>

                </div>
            </div>
        </div>
        @if($plan->quantity !=0 )
        @php $percentage = ($quantity / $plan->quantity) * 100  @endphp
        @else
        @php $percentage = 100 @endphp
        @endif
        <div class="col-md-3">
            <div class="block">
                <div class="block-header block-header-default bg-success">
                    <h3 class="block-title">Current Status:  @if($percentage>=100) 100% @else {{$percentage}}% @endif</h3>
                </div>
                <div class="block-content">
                    <ul>
                        <li>Planned:  @if(isset($progress)) {{ $progress->plan->quantity }} @endif</li>
                        <li>Acheived: {{ $quantity }}</li>
                    </ul>
                </div>
            </div>

            <div class="block">
                <div class="block-header block-header-default bg-success">
                    <h3 class="block-title">Actions</h3>
                </div>
                <div class="block-content">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <a href="/rechecking?plan_id={{$plan->id}}" class="btn btn-hero btn-success text-uppercase mb-10">Overall View</a>
                        </div>
                    </div>
                    {{-- <a href="/plan/{{$plan->id}}">Show plan Details</a> --}}
                    {{-- <a href="/plan/{{$plan->id}}" class="btn btn-outline-secondary min-width-125 js-click-ripple-enabled" data-toggle="click-ripple" style="overflow: hidden; position: relative; z-index: 1;">Secondary</a> --}}
                </div>
            </div>
        </div>




        </div>





{{--    Modal--}}
    <div class="modal" id="monthly-progress" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Monthly Progress</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="/addMonthlyProgress" method="post" class="js-validation-bootstrap">
                            @csrf
                            {{ Form::hidden('plan_id', $plan->id, ['class' => 'form-control', 'placeholder' => 'Choose Plan...',]) }}

                            {{-- Province, District, Village --}}
                            <div class="row">
                                {{--                                    Province --}}


                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{ Form::label('province_id', 'Province', ['style' => 'display:block']) }}
                                        {{ Form::select('province_id', $provinces, null, ['class' => 'form-control select2', 'placeholder' => 'Select ...', 'required'=> 'required']) }}
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{ Form::label('district_id', 'District', ['style' => 'display:block']) }}
                                        <div id="district-list">
                                            {{-- {{ Form::select('district_id', [], null, ['class' => 'form-control select2','placeholder' => 'Select ...']) }} --}}
                                            {{ Form::select('district_id', App\District::pluck('name', 'id')->toArray(), null, ['class' => 'form-control select2','placeholder' => 'Select ...', 'required' => 'required']) }}
                                        </div>
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{ Form::label('village_id', 'Village', ['style' => 'display:block']) }}
                                        {{ Form::select('village_id', $villages, null, ['class' => 'form-control select2', 'placeholder' => 'Select ...']) }}
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
                                    {!!  Form::select('month', $months, $selected_month, ['class' => 'form-control select2', 'placeholder' => 'Select Month', 'required' => 'required'] ) !!}
                                </div>

                                <div class="col col-lg-4 col-md-12 col-sm-12">
                                    <label>Year</label>
                                    {!!  Form::select('year', $years, $selected_year, ['class' => 'form-control select2', 'placeholder' => 'Select Month', 'required' => 'required'] ) !!}
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






                            </div>





                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-alt-success" >
                        <i class="fa fa-check"></i> Add Progress
                    </button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Large Modal -->

@stop

@section('scripts')
<script>


        $('#show-add-progress-modal').click(() => {
                $('#monthly-progress').modal()
                $('.js-select-2').select2()
            }
        );


    </script>
    <!-- Datatables -->
    <script src="/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/js/pages/be_tables_datatables.min.js"></script>

     <script>
         var $body = $('body');

var table = $('#table-log').DataTable([{
    "order": [0, 'asc'],
            "responsive": true,
            "pageLength": 25,
            "autoWidth": true,
            aoColumnDefs: [
                {
                    bSortable: false,
                    aTargets: [-1]
                }
            ]
}]);
         </script>
    //Axios
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        // $('#province_id').on('change', function(){
        //     let provinceID = $(this).val();
        //     axios.get('/refreshDistricts',{
        //         params: {
        //             province_id: provinceID
        //         }
        //     })
        //         .then(function(data){
        //             $('#district-list').empty().append(data.data);
        //         });
        // })

          // filter columns
          $("#table-log thead th:not(:nth-last-child(1), :nth-last-child(1), :nth-last-child(2), :nth-last-child(4), :nth-last-child(5))").each(function (i) {
            var select = $('<select style="width: 100%;"><option value=""></option></select>')
                .appendTo($(this).empty())
                .on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    table.column(i)
                        .search(val ? '^' + val + '$' : '', true, false)
                        .draw();
                });

            table.column(i).data().unique().sort().each(function (val, idx) {
                select.append('<option value="' + val + '">' + val + '</option>')
            });
        });


    </script>


    <!-- Page JS Plugins -->
    <script src="/assets/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <!-- Page JS Helpers (Select2 plugin) -->
    <script>jQuery(function () {
            Codebase.helpers('select2');
        });</script>

    <!-- Page JS Code -->
    <script src="/assets/js/plugins/jquery-validation/additional-methods.js"></script>



    <!-- Page JS Code -->
    <script src="/assets/js/pages/be_forms_validation.min.js"></script>
<script>
    $('.select2').select2({
        width: '100%'
    });
</script>
    @include ('includes.success')

@stop
