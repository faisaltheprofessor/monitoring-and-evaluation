@extends('app')



@section('content')

<div class="block">
    <div class="block-header block-header-default bg-primary-light">
        <h3 class="block-title">Overall</h3>
    </div>
    <div class="block-content">
        <div class="row">

            <div class="col-md-4">
                <ul class="list-group push">
                    <li class="list-group-item d-flex justify-content-between align-items-center font-w600">
                        Projects
                        <span class="badge badge-pill badge-success">{{ App\Project::count() }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center font-w600">
                        Components
                        <span class="badge badge-pill badge-success">{{ App\Component::count() }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center font-w600">
                        Subcomponents
                        <span class="badge badge-pill badge-success">{{ App\Subcomponent::count() }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center font-w600">
                        Activities
                        <span class="badge badge-pill badge-success">{{ App\Activity::count() }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center font-w600">
                        Plans
                        <span class="badge badge-pill badge-success">{{ App\Plan::count() }}</span>
                    </li>


                </ul>
            </div>


            <div class="col-md-4">
                <ul class="list-group push">
                    <li class="list-group-item d-flex justify-content-between align-items-center font-w600">
                        Provinces
                        <span
                            class="badge badge-pill badge-success">{{ App\MonthlyProgress::distinct('province_id')->count() }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center font-w600">
                        Districts
                        <span
                            class="badge badge-pill badge-success">{{ App\MonthlyProgress::distinct('district_id')->count() }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center font-w600">
                        Total Appraisals
                        <span
                            class="badge badge-pill badge-success">{{ $total_appraisals = App\Activity::sum('appraisal') }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center font-w600">
                        Acheived
                        <span
                            class="badge badge-pill badge-success">{{ $achieved_appraisals = ceil(App\MonthlyProgress::sum('quantity')) }}
                            @php
                               $acheived_appraisals =  intval($achieved_appraisals / $total_appraisals *100);
                            @endphp
                            @if($acheived_appraisals > 100) (100%) @else ({{ $acheived_appraisals}}%) @endif</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center font-w600">
                        Years
                        <span
                            class="badge badge-pill badge-success">{{ App\plan::distinct('year')->count() }}</span>
                    </li>


                </ul>
            </div>


            <div class="col-md-4">
                <ul class="list-group push">
                    <li class="list-group-item d-flex justify-content-between align-items-center font-w600">
                        All Users
                        <span class="badge badge-pill badge-success">{{ App\User::count() }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center font-w600">
                        Active Users
                        <span
                            class="badge badge-pill badge-success">{{ App\MonthlyProgress::distinct('user_id')->count() }}</span>
                    </li>

                </ul>

              
            </div>

           
         

          

        </div>

    </div>
</div>


<div class="block">
    <div class="block-header block-header-default bg-primary-light">
        <h3 class="block-title">Years</h3>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-md-4">
                <h4>Planned</h4>
                <ul class="list-group push">
                  @php $years = App\Plan::distinct('year')->orderBy('year')->pluck('year'); @endphp
                  @foreach($years as $year)
                  <li class="list-group-item d-flex justify-content-between align-items-center font-w600">
                    {{$year}}
                    <span class="badge badge-pill badge-success">{{ intval(App\Plan::where('year', $year)->sum('quantity')) }}</span>
                </li>
        
            
                  @endforeach
        
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Actual</h4>
                <ul class="list-group push">
                  @php $years = App\Plan::distinct('year')->orderBy('year')->pluck('year'); @endphp
                  @foreach($years as $year)
                  <li class="list-group-item d-flex justify-content-between align-items-center font-w600">
                    {{$year}}
                    <span class="badge badge-pill badge-success">{{ intval(App\MonthlyProgress::whereYear('start_date', $year)->sum('quantity')) }}</span>
                </li>
        
            
                  @endforeach
        
                </ul>
            </div>
    
        </div>

    </div>
</div>


<div class="block">
    <div class="block-header block-header-default bg-primary-light">
        <h3 class="block-title">Provinces</h3>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-md-4">
               
                <ul class="list-group push">
                  @php $provinces= App\MonthlyProgress::with('province')->groupBy('province_id')->get('province_id'); @endphp
                  @foreach($provinces as $province)
                  <li class="list-group-item d-flex justify-content-between align-items-center font-w600">
                    {{$province->province->name}}
                    <span class="badge badge-pill badge-success">{{ intval(App\MonthlyProgress::where('province_id', $province->province_id)->sum('quantity')) }}</span>
                </li>
        
            
                  @endforeach
        
                </ul>
            </div>
          
        </div>

    </div>
</div>


@stop

    @section('extra-content')

    <div class="row">

        <div class="col-6">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Activities</h3>
                </div>
                @livewire('activities')
            </div>
        </div>



        <div class="col-6">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Details</h3>
                </div>
                @livewire('progress-details')
            </div>
        </div>



    </div>



    {{-- @foreach($progress as $current_progress) --}}

    {{-- <li>  {{ $current_progress->activity->name }}</li>--}}
    {{-- @endforeach --}}



    @endsection



    @section('styles')
    <link rel="stylesheet" href="/assets/js/plugins/nestable2/jquery.nestable.min.css">
    <style>
        .drag_disabled {
            pointer-events: none;
        }

        .drag_enabled {
            pointer-events: all;
        }

    </style>

    @livewireStyles

        @endsection





        @section('scripts')

        <!-- Page JS Plugins -->
        <script src="/assets/js/plugins/nestable2/jquery.nestable.min.js"></script>


        <script>
            $('.dd').nestable({
                maxDepth: 1
            });

        </script>



        <!-- Datatables -->
        <script src="/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="/assets/js/pages/be_tables_datatables.min.js"></script>
        <script>
            $(".table").dataTable();

        </script>


        @livewireScripts

            @endsection
