@extends('app')

@section('page-title')
<div style="display: flex; justify-content:space-between">
    <span>Schemes</span>
    <span>
        <a href="/component" class="btn btn-primary">
            <i class="fa fa-plus"></i> Edit Scheme
        </a>
    </span>
</div>
@stop
@section('breadcrumb')
  {{ Breadcrumbs::render('irrigation') }} 
@stop
@section('content')
  <div id="root">
    <div class="row">
        <div class="col-md-6">
            <!-- Default Elements -->
            <div class="block">
                <div class="block-header block-header-default bg-primary-light">
                    <h3 class="block-title">Edit Irrigation Scheme</h3>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>

                </div>
                <div class="block-content">
                    <form action="/scheme/{{$irrigation->id}}" method="post" enctype="multipart/form-data" class="js-validation-bootstrap">
                        @method('PUT')
                        @csrf


                        {{-- Project --}}
                        <div class="form-group row">
                            <label class="col-2" for="project_id">Project</label>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="project_id" id="project_id_1" value="1" @if($irrigation->project_id == 1)checked @endif>
                                <label class="custom-control-label" for="project_id_1">CLAP</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="project_id" id="project_id_2" value="2" >
                                <label class="custom-control-label" for="project_id_2" @if($irrigation->project_id == 2)checked @endif>SNaPP2</label>
                            </div>
                        </div>
                            {{-- End Project --}}
                        {{-- Scheme --}}
                        <div class="form-group row">
                            <label class="col-9" for="scheme_id">Scheme</label>
                            <div class="col-md-9" v-if="scheme">
                               {!! Form::select('scheme_id', $schemes, $irrigation->scheme_id, ['class' => 'form-control select2', 'placeholder' => 'Select Scheme...', 'required' => 'required']) !!}

                            </div>
                            {{-- Scheme Not Listed --}}
              
                         

                        {{-- End of Scheme not listed --}}
                        
                          
                        </div>   

                        {{-- End of Scheme --}}

                        

                        {{-- Village --}}
                        <div class="form-group row">
                            <label class="col-9" for="village_id">Village</label>
                            <div class="col-md-9" v-if="village">
                               {!! Form::select('village_id', $villages, $irrigation->village_id, ['class' => 'form-control select2', 'placeholder' => 'Select Village...', 'required' => 'required']) !!}
                              
                            </div>
                              {{-- Village Not Listed --}}
                          
                        </div>   
                        {{-- End of Village  --}}

                      
                       
                         
                            
            
                        {{-- End of IA Not Listed --}}

                         {{-- IA --}}
                         <div class="form-group row">
                            <label class="col-9" for="ia_id">IA</label>
                            <div class="col-md-9" v-if="IA">
                               {!! Form::select('ia_id', $IAs, $irrigation->ia_id, ['class' => 'form-control select2', 'placeholder' => 'Select IA...', 'required' => 'required']) !!}
                              
                            </div>
                           
                        </div>   
                        {{-- End of IA  --}}
                      
                     

                        {{-- Start Point --}}
                        <div class="form-group row manual">
                            <label class="col-9" for="start_point_long">Start Point</label>
                            <div class="col-md-6">
                               {!! Form::text('start_point_long', $irrigation->start_point_long, ['class' => 'form-control', 'placeholder' => 'Longitude', 'required' => 'required']) !!}  
                            </div>

                            <div class="col-md-6">
                                {!! Form::text('start_point_lat', $irrigation->start_point_lat, ['class' => 'form-control', 'placeholder' => 'Latitude', 'required' => 'required']) !!}  
                             </div>
                        </div>
                        {{-- End of start point --}}


                         {{-- end Point --}}
                         <div class="form-group row manual">
                            <label class="col-9" for="end_point_long">End Point</label>
                            <div class="col-md-6">
                               {!! Form::text('end_point_long', $irrigation->end_point_long, ['class' => 'form-control', 'placeholder' => 'Longitude', 'required' => 'required']) !!}  
                            </div>

                            <div class="col-md-6">
                                {!! Form::text('end_point_lat', $irrigation->end_point_long, ['class' => 'form-control', 'placeholder' => 'Latitude', 'required' => 'required']) !!}  
                             </div>
                        </div>
                        {{-- End of end point --}}

                        {{-- Start Date  --}}
                       <div class="form-group row">
                        <div class="col-md-6">
                            <label for="start_date">Start Date</label>
                            <input type="text" class="js-flatpickr form-control bg-white" id="start_date" name="start_date" placeholder="Y-m-d" value="{{ $irrigation->start_date }}">
                            </div>
                   



                     
                        <div class="col-md-6">
                            <label for="end_date">End Date</label>
                            <input type="text" class="js-flatpickr form-control bg-white" id="end_date" name="end_date" placeholder="Y-m-d" value="{{ $irrigation->end_date }}">
                            </div>
                       </div>


                        {{-- Start Date END --}}

                          {{-- Command Area and Irrigated Area --}}
                          <div class="form-group row manual">
                            <label class="col-4" for="total_command_area">Total Command Area (ha)</label>
                            <label class="col-4" for="irrigated_area">Irrigated Area (ha)</label>
                            <label class="col-4" for="nonirrigated_area">Nonrrigated Area (ha)</label>

                            <div class="col-md-4">
                               {!! Form::text('total_command_area', $irrigation->total_command_area, ['class' => 'form-control', 'placeholder' => 'Total Command Area', 'required' => 'required']) !!}  
                            </div>

                            <div class="col-md-4">
                                {!! Form::text('irrigated_area', $irrigation->irrigated_area, ['class' => 'form-control', 'placeholder' => 'Irrigated Area', 'required' => 'required']) !!}  
                             </div>

                             <div class="col-md-4">
                                {!! Form::text('nonirrigated_area', $irrigation->nonirrigated_area, ['class' => 'form-control', 'placeholder' => 'Nonirrigated Area']) !!}  
                             </div>
                        </div>
                        {{-- Command Area and Irrigated Area --}}
                        

                         {{-- Direct Beneficiaries and Indirect Beneficiares --}}
                         <div class="form-group row manual">
                            <label class="col-6" for="direct_beneficiaries">Direct Beneficiaries</label>
                            <label class="col-6" for="indirect_beneficiaries">Indirect Beneficiaries</label>

                            <div class="col-md-6">
                               {!! Form::text('direct_beneficiaries', $irrigation->direct_beneficiaries, ['class' => 'form-control', 'placeholder' => 'Direct Beneficiaries', 'required' => 'required']) !!}  
                            </div>

                            <div class="col-md-6">
                                {!! Form::text('indirect_beneficiaries',  $irrigation->indirect_beneficiaries, ['class' => 'form-control', 'placeholder' => 'Indirect Beneficiaries', 'required' => 'required']) !!}  
                             </div>
                        </div>
                        {{-- Direct Beneficiaries and Indirect Beneficiares --}}


                          {{-- Engineering Estimated Cost --}}
                          <div class="form-group row manual">
                            <label class="col-12" for="engineering_estimated_cost">Engineering Estimated Cost</label>

                            <div class="col-md-6">
                               {!! Form::text('engineering_estimated_cost',  $irrigation->engineering_estimated_cost, ['class' => 'form-control', 'placeholder' => 'Afs', 'required' => 'required']) !!}  
                            </div>

                            <div class="col-md-6">
                                {!! Form::text('engineering_estimated_cost_usd', $irrigation->engineering_estimated_cost_usd, ['class' => 'form-control', 'placeholder' => 'USD', 'required' => 'required']) !!}  
                             </div>
                        </div>
                        {{-- Engineering Estimated Cost --}}

                         {{-- contract  Cost --}}
                          <div class="form-group row manual">
                            <label class="col-12" for="contract_cost">Contract Cost</label>

                            <div class="col-md-6">
                               {!! Form::text('contract_cost', $irrigation->contract_cost, ['class' => 'form-control', 'placeholder' => 'Afs', 'required' => 'required']) !!}  
                            </div>

                            <div class="col-md-6">
                                {!! Form::text('contract_cost_usd', $irrigation->contract_cost_usd, ['class' => 'form-control', 'placeholder' => 'USD', 'required' => 'required']) !!}  
                             </div>
                        </div>
                        {{-- contract  Cost --}}

                          {{-- Project Status and Remarks --}}
                          <div class="form-group row manual">
                            <label class="col-6" for="project_status">Project Status</label>
                            <label class="col-6" for="remarks">Remarks</label>

                            <div class="col-md-6">
                               {!! Form::text('project_status', $irrigation->project_status, ['class' => 'form-control', 'placeholder' => 'Project Status', 'required' => 'required']) !!}  
                            </div>

                            <div class="col-md-6">
                                {!! Form::text('remarks', $irrigation->remarks, ['class' => 'form-control', 'placeholder' => 'Remarks']) !!}  
                             </div>
                        </div>
                        {{-- Project Status and Remarks --}}





                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-primary">Update</button>
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
                    <h3 class="block-title">Irrigation Schemes</h3> <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table
                        class="table table-bordered table-responsive table-striped table-vcenter custom-datatable" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th>Scheme</th>
                            <th>Code</th>
                            <th>Project</th>
                            <th>Village</th>
                            <th>District</th>
                            <th>Province</th>
                            <th>IA</th>
                            <th>Start Coordinates</th>
                            <th>End Coordinates</th>
                            <th>Total Command Area (ha)</th>
                            <th>Irrigated Area (ha)</th>
                            <th>Nonirrigated Area (ha)</th>
                            <th>Direct Beneficiaries</th>
                            <th>Indirect Beneficiaries</th>
                            <th>Engineering Estimated Cost (Afn)</th>
                            <th>Engineering Estimated Cost (USD)</th>
                            <th>Project Status</th>
                            <th>Contract Cost (Afn)</th>
                            <th>Contract Cost (USD)</th>
                            <th>Remarks</th>
                            

                           
                        </tr>
                        </thead>
                        <tbody>
                                @php $x = 1 @endphp
                                @foreach($irrigationSchemes as $is)
                                    <tr>
                                        <td>{{ $x++ }}</td>
                                        <td>{{ $is->scheme->name }}</td>
                                        <td>{{ $is->scheme->code }}</td>
                                        <td>{{ $is->project->abbreviation }}</td>
                                        <td>{{ $is->village->name }}</td>
                                        <td>{{ $is->district->name }}</td>
                                        <td>{{ $is->province->name }}</td>
                                        <td>{{ $is->ia->name }}</td>
                                        <td>{{ $is->start_point_lat}}, {{ $is->start_point_long }}</td>
                                        <td>{{ $is->end_point_lat}}, {{ $is->end_point_long }}</td>
                                        <td>{{ $is->total_command_area }}</td>
                                        <td>{{ $is->irrigated_area }}</td>
                                        <td>{{ $is->nonirrigated_area }}</td>
                                        <td>{{ $is->direct_beneficiaries }}</td>
                                        <td>{{ $is->indirect_beneficiaries }}</td>
                                        <td>{{ $is->engineering_estimated_cost }}</td>
                                        <td>{{ $is->engineering_estimated_cost_usd }}</td>
                                        <td>{{ $is->project_status }}</td>
                                        <td>{{ $is->contract_cost }}</td>
                                        <td>{{ $is->contract_cost_usd }}</td>
                                        <td>{{ $is->remarks }}</td>
                                    </tr>

                                @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

  </div>
@stop
@section('styles')
<link rel="stylesheet" href="/assets/js/plugins/select2/css/select2.css">
<link rel="stylesheet" href="/assets/js/plugins/flatpickr/flatpickr.min.css">


@include('partials.datatables-css')

@stop
@section('scripts')
@include('partials.datatables-only')
    <script src="/js/irrigation.js"></script>
    <!-- Page JS Plugins -->
    <script src="/assets/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="/assets/js/plugins/flatpickr/flatpickr.min.js"></script>

    <!-- Page JS Code -->
    <script src="/assets/js/plugins/jquery-validation/additional-methods.js"></script>

  
    <!-- Page JS Code -->
    <script src="/assets/js/pages/be_forms_validation.min.js"></script>
    <script>jQuery(function(){ Codebase.helpers(['flatpickr']); });</script>
    <script>
        // $('body').on('DOMNodeInserted', 'select', function () {
        // $("select").select2(); 
        // });

        $(document).ready(function () {
        
            // $('select').select2()
            var groupColumn = 5;
            var table = $('.custom-datatable').DataTable({
                dom: 'Bftrip',
                buttons: [
                    {
                        extend: 'print',
                        className: 'btn-success',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
            extend: 'colvis',
            text: "Columns",
            postfixButtons: [ 'colvisRestore' ]
        }
             
                ],
        
                "columnDefs": [
                    { "visible": false, "targets": groupColumn }
                ],
                "order": [[ groupColumn, 'asc' ]],
                "displayLength": 25,
                keys:true,
                    searchPane: {
                        columns:[5,4,3,2,1,6],
                        threshold: 0
                    },
                    exportOptions: {
                        columns: ':visible'
                    },
                    // bFilter: false,
                  
                    "responsive": true,
        
                "drawCallback": function ( settings ) {
                    var api = this.api();
                    var rows = api.rows( {page:'current'} ).nodes();
                    var last=null;
         
                    api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                        if ( last !== group ) {
                            $(rows).eq( i ).before(
                                '<tr class="group"><td colspan="15">'+group+'</td></tr>'
                            );
         
                            last = group;
                        }
                    } );
                }
            } );
         
            // Order by the grouping
            $('.custom-datatable tbody').on( 'click', 'tr.group', function () {
                var currentOrder = table.order()[1];
                if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
                    table.order( [ groupColumn, 'desc' ] ).draw();
                }
                else {
                    table.order( [ groupColumn, 'asc' ] ).draw();
                }
            } );
        } );
 
          </script>

    @include('includes.success')


@stop
