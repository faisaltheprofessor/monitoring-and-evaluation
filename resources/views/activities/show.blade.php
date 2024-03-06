@extends('app')

@section('page-title', $activity->name)

@section('breadcrumb',  Breadcrumbs::render('activity.show',$activity->name, $activity->id))


@section('content')
    <div class="row" id="chart">
        <div class="col-md-12">
            <!-- Default Elements -->
            <div class="block">
                <div class="block-header block-header-default bg-primary-light">
                    <h3 class="block-title">Details</h3>
                </div>
               
                <div class="block-content">
                <apexchart type="line" height="350" :options="chartOptions" :series="series"></apexchart>
                   
                </div>
                </div>
            </div>
        </div>


@stop

@section('scripts')
    <script let activity_id={{ $activity->id }}></script>
    <script src="/js/activities.js"></script> 
@stop
