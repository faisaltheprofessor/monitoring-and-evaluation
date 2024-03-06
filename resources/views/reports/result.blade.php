@extends('app')

@section('styles')


    <style>
        #data-table_filter
        {
            display: none;
        }
        /* .green {
            color: forestgreen;
            font-weight: bold;
            background: #e3e3e3;
            padding: 5px;

        } */
    </style>
    @include('partials.datatables-css')

@stop
@section('breadcrumb', Breadcrumbs::render('result'))

@section('page-title')
    {{-- Filters: 
    @php $count = count($_GET) @endphp
    @foreach($_GET as $key=>$value)
    @if(--$count <= 0) 
    @php  break; @endphp
    @endif

    @php  --}}
   
    {{-- $filter =  Str::before(ucwords($key), '_') ;
    $class = "\App\\".$filter; --}}
    {{-- @endphp --}}
   {{-- {{ $filter }}: {{ $class::find($value)->name }} --}}
    {{-- @endforeach --}}
@stop
@section('content')
@php
  use App\Project;
  use App\Activity;   
@endphp
<div class="block">
    <div class="block-header block-header-default bg-primary-light">
        <h3 class="block-title">
            @if(method_exists($progress, 'links'))
            {{ $progress->links() }}
         @endif
        </h3>
    </div>
    <div class="block-content">
    <div class="table-responsive">
        <table id="data-table" class="datatable table table-bordered {{ !method_exists($progress, 'links') ? 'datatable' : '' }}">
            <thead class="thead-default">
                <tr>
                    <th>#</th>
                    <th>Activity Name</th>
                    <th>Project</th>
                    <th>Component</th>
                    <th>Subcomponent</th>
                    <th>Province</th>
                    <th>District</th>
                    <th>Quantity</th>
                    {{-- <th>Cummulutive Quantity</th> --}}
                    <th>Month</th>
                    <th>Year</th>
                </tr>
            </thead>
           
          


            <tbody>
            @if($progress)
            @php 
              $x = 1 ;
             if(method_exists($progress, 'links') && isset($_GET['page'])) $x = $x *100 * ($_GET['page']-1)+ 1;
            @endphp
            @foreach($progress as $output)
                @if($output->plan)
                    {{-- @php
                        $bgcolor = '';
                        $color = 'grey';
                        $progress = 0;
                        if($output->plan->progress == 100)
                            {
                            $bgcolor = "green";
                            $color = 'white';

                            }
                        $progress = $output->plan->progress;
                    @endphp --}}
                    @endif
                {{-- <tr style="background: {{ $bgcolor }}; color: {{ $color }}"> --}}
                    <tr>
                    <td>{{ $x++ }}</td>
                    <td>
                        @if($output->activity)
                            {{ $output->activity->name }}
                        @endif
                    </td>
                    <td>
                        @if($output->project)
                            {{ $output->project->name }}
                        @endif
                    </td>
                    <td>
                        @if($output->component)
                                {{ $output->component->name }}
                        @endif

                    </td>
                    <td>
                        @if($output->subcomponent)
                                {{ $output->subcomponent->name }}
                        @endif



                    </td>
                    <td>
                        @if($output->province)
                            {{ $output->province->name }}
                          
                        @endif
                    </td>
                    <td>
                        @if($output->district)
                            {{ $output->district->name }}
                       @endif
                       {{-- @if($output->village)
                        -    {{ $output->village->name }}
                       @endif --}}
                    </td>

                    <td>
                        {{ $quantity =  $output->quantity }}

                    </td>
                    {{-- <td>
                        @php
                            $no_of_years = $output->start_date->year - 2014;
                            $year = $output->start_date->year;
                            $cummulutive_quantity = 0;
                        @endphp
                        @while($year>=2015)
                            @php 
                               if($cummulutive =  App\MonthlyProgress::whereYear('start_date', $year)->where('activity_id', $output->activity_id)->first())
                               {
                                $cummulutive_quantity += $cummulutive->quantity;
                                   
                               }
                               
                               $year--;
                            @endphp
                        @endwhile
                        {{$cummulutive_quantity }}
                    </td> --}}
                    <td>
                        @if($output->start_date)
                           {{ $output->start_date->format('F') }}
                        @endif
                    </td>

                    <td>
                        @if($output->start_date)
                           {{ $output->start_date->year }}
                        @endif
                    </td>   
                </tr>
        @endforeach
    
            @endif
            </tbody>

            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Activity Name</th>
                    <th>Project</th>
                    <th>Component</th>
                    <th>Subcomponent</th>
                    <th>Province</th>
                    <th>District</th>
                    <th>Quantity</th>
                    {{-- <th>Cummulutive Quantity</th> --}}
                    <th>Month</th>
                    <th>Year</th>
                </tr>
            </tfoot>
        </table>

    </div>
    </div>
    @if(method_exists($progress, 'links'))
    {{ $progress->links() }}
 @endif
</div>



    {{-- <button class="btn btn-danger btn--action " data-ma-action="print"><i class="zmdi zmdi-print"></i></button> --}}
@stop

@section('scripts')




<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/keytable/2.6.0/js/dataTables.keyTable.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/plug-ins/preview/searchPane/dataTables.searchPane.min.js"></script>
<script>
$(document).ready(function () {

    $(document).ready(function() {
    var groupColumn = 0;
    var table = $('.datatable').DataTable({
        dom: 'Bftrip',
        buttons: [
            {
                extend: 'print',
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
            'colvis',
     
        ],

        "columnDefs": [
            { "visible": false, "targets": groupColumn }
        ],
        "order": [[ groupColumn, 'asc' ]],
        "displayLength": 25,
        keys:true,
            searchPane: {
                columns:[2,3,4,5,6,8,9],
                threshold: 0
            },
            exportOptions: {
                columns: ':visible'
            },
            // bFilter: false,
          
            "responsive": true,

       
    } );
 
   
} );
});
  </script>




  @section('extra')
  $('.datatable').DataTable({
        "columnDefs": [
            { "visible": false, "targets": groupColumn }
        ],
        "order": [[ groupColumn, 'asc' ]],
        
            dom: 'Bfrtip',
            "paging": true,
            keys:true,
            searchPane: {
                columns:[1,2],
                threshold: 0
            },
            exportOptions: {
                columns: ':visible'
            },
            // bFilter: false,
            buttons: [
            {
                extend: 'print',
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
            'colvis',
     
        ],

            "responsive": true,
            "pageLength": 10,
            // "autoWidth": true,
           
        });
    });
  @stop
</script>
@stop