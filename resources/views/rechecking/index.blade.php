@extends('app')

@section('styles-after')

<link rel="stylesheet" href="/assets/js/plugins/select2/css/select2.css">
<style>
    /* #data-table_filter
    {
        display: none;
    } */
    /* .green {
        color: forestgreen;
        font-weight: bold;
        background: #e3e3e3;
        padding: 5px;

    } */
</style>


@include('partials.datatables-css')

@stop
@if(isset($_GET['plan_id']))



@php
    
    $plan = App\MonthlyProgress::find($_GET['plan_id']);
    $planDetails = App\Plan::find($_GET['plan_id']);
    $plan_name = $planDetails->activity->name . ' - ' . $planDetails->year;
    
    @endphp


@section('breadcrumb',  Breadcrumbs::render('planProgress',$plan_name, $plan->id))




{{-- @section('title', $plan->activity->name . ' -  ' . $plan->plan->year ) --}}
@endif
@section('page-title')

<!-- END Inline Form -->
@stop


@section('content')

<div class="row">
    
</div>
<div class="row">
    <div class="col-md-9">
        <div class="block" style="min-height:140px">
            <div class="block-header block-header-default bg-primary-light">
                <h3 class="block-title">Select Plan</h3>
            </div>
            <div class="block-content block-content-full">
                <form class="form-inline" action="be_forms_elements_bootstrap.html" method="post" onsubmit="return false;">
                    <label class="sr-only" for="plan_id">Plan</label>
                    @if(isset($_GET['plan_id']))
                    {{ Form::select('plan_id',$plans,$_GET['plan_id'], ['class' => 'form-control mb-2 mr-sm-2 mb-sm-0 select2 plan-select', 'placeholder' => 'Select a plan'])}}
                    @else
                    {{ Form::select('plan_id',$plans,null, ['class' => 'form-control mb-2 mr-sm-2 mb-sm-0 select2 plan-select', 'placeholder' => 'Select a plan'])}}
                    @endif
                    {{-- <select  class="form-control mb-2 mr-sm-2 mb-sm-0 select2" id="plan_id" name="plans_id"></select> --}}
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="block">
            <div class="block-header block-header-default bg-primary-light">
                        <h3 class="block-title">Status: <span id="planPercentage">0</span>%  </h3>
                        

            </div>
            <div class="block-content">
                <ul>
                    <li>Planned:  <span id="plannedQuantity">0</span></li>
                    <li>Acheived: <span id="acheivedQuantity">0</span></li>
                </ul>
            </div>
        </div>

       
</div>
</div>
@if(isset($_GET['plan_id']))
<div class="row">
    <div class="col-md-12">
        <div class="block">
            <div class="block-header block-header-default bg-primary-light">
                <h3 class="block-title">Plan Progress Details</h3>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>

            </div>
            <div class="block-content block-content-full">
            <table class="table table-striped table-bordered datatable" style="width:100%">
                <thead style="background:grey; color:white;">
                    <tr>
                   
                        <td>Province</td>
                        <td>District</td>
                        <td>Jan</td>
                        <td>Feb</td>
                        <td>Mar</td>
                        <td>Apr</td>
                        <td>May</td>
                        <td>Jun</td>
                        <td>Jul</td>
                        <td>Aug</td>
                        <td>Sep</td>
                        <td>Oct</td>
                        <td>Nov</td>
                        <td>Dec</td>
                        <td>Total</td>
                        <td>Remarks</td>
                        {{-- <td>Planned</td> --}}
                    </tr>
                </thead>
        
                <tbody>
                    @php
                       
                            // $provinces = MonthlyProgress::where('plan_id', 124)->groupBy('province_id');
                            $districts = App\MonthlyProgress::with('district')->where('plan_id', $_GET['plan_id'])->groupBy('district_id')->get();
                          
                        @endphp
                    @php $quantity = 0; @endphp
                    @foreach($districts as $district)
                    @php   $total = 0; @endphp
                        <tr>
                        
                            <td>@if($district->province){{ $district->province->name }}@endif </td>
                            <td>@if($district->district){{ $district->district->name }}@endif</td>
        @php $zeros = 0;@endphp
                            @for($x=1; $x<=12; $x++)
                            @php
                            $progress = App\MonthlyProgress::with('plan')->where('plan_id', $_GET['plan_id'])->where('district_id', $district->district_id)->whereMonth('start_date',$x)->first();
                            $progressCount = App\MonthlyProgress::where('plan_id', $_GET['plan_id'])->where('district_id', $district->district_id)->count('id');@endphp
                            <td>
     @if($progress){{ $progress->quantity }}@php $total += $progress->quantity;@endphp@php $quantity += $progress->quantity; @endphp@else 0
                                 @php
                                     $zeros++;
                                 @endphp
                                 @endif
                                    
                            </td>
                            @endfor
                            <td style="color: #28de81; font-weight:bold">
                                {{ $total }}
                            </td>
                            {{-- <td>
                                {{ App\MonthlyProgress::where('plan_id', $_GET['plan_id'])->first()->plan->quantity }}
                            </td> --}}
                        
                            {{-- <td>{{ $progress->quantity }}</td> --}}
                           <td> @if($progressCount>12 || $progressCount > 12-$zeros )
                                
                                <span class="text-danger small">Chances of duplication
                            </span>
                           
           
                          @endif
                          {{-- <a href="/plan/{{ $_GET['plan_id'] }}">See Plan</a> --}}
                                {{-- {{ $progressCount}} Entries  --}}
        
                               
                           </td>
                        </tr>
                    @endforeach
                      
            
                </tbody>


              
            </table>
            </div>
        </div>

        </div>

        @php $plan = App\Plan::find($_GET['plan_id']) @endphp
        @if($plan->quantity !=0 )
        @php 
        $percentage = ($quantity / $plan->quantity) * 100;
        if($percentage>100) $percentage = 100;
        @endphp
        <span id="hiddenPlanPercentage" style="display:none">{{ round($percentage) }}</span>
        @else 
        @php $percentage = 100 @endphp
        @endif
</div>




<div  style="display:none">
    <span id="hiddenPlannedQuantity">{{ $plan->quantity }}</span>
    <span id="hiddenAcheivedQuantity">{{ $quantity }}</span>
</div>
    
<div class="row">
  <div class="col-lg-4 col-md-12">
    <div id="chart">
        <div class="block">
            <div class="block-header block-header-default bg-primary-light">
                <h3 class="block-title">Province</h3>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>

            </div>
            <div class="block-content">
                {{-- <apexchart width="100%" type="line" :options="options" :series="series"></apexchart> --}}
                <apexchart type="bar" height="350" :options="chartOptions" :series="series"></apexchart>
            </div>
        </div>
    </div>
  </div>

  <div class="col-lg-4 col-md-12">
    <div id="districtChart">
        <div class="block">
            <div class="block-header block-header-default bg-primary-light">
                <h3 class="block-title">District</h3>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>

            </div>
            <div class="block-content">
                {{-- <apexchart width="100%" type="line" :options="options" :series="series"></apexchart> --}}
                <apexchart type="bar" height="350" :options="chartOptions" :series="series"></apexchart>
            </div>
        </div>
    </div>
  </div>


  <div class="col-lg-4 col-md-12">
    <div id="monthChart">
        <div class="block">
            <div class="block-header block-header-default bg-primary-light">
                <h3 class="block-title">Month</h3>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>

            </div>
            <div class="block-content">
                {{-- <apexchart width="100%" type="line" :options="options" :series="series"></apexchart> --}}
                <apexchart type="line" height="350" :options="chartOptions" :series="series"></apexchart>
            </div>
        </div>
    </div>
  </div>

  
</div>
</div>

@else 

@section('breadcrumb', Breadcrumbs::render('progress_details_select_plan'))

    <div class="alert alert-info">
        Please select a plan to see details
    </div>
@endif


@stop


@section('scripts')

<script src="/assets/js/plugins/select2/js/select2.full.min.js"></script>
<script>

$('.plan-select').on('select2:select', function (e) {
    let id = e.params.data.id;
    if(id!=='') {
        window.location.href = window.location.pathname + '?plan_id=' + id
  
    }
});


    $('.select2').select2({
    //   width: 'resolve',
    //   theme: 'classic',
    width: '100%'
    })

    $(document).ready(function(){
        let hiddenPlannedQuantity = $('#hiddenPlannedQuantity').html(),
            hiddenAcheivedQuantity = $('#hiddenAcheivedQuantity').html(),
            hiddenPlanPercentage = $('#hiddenPlanPercentage').html();
    
            $('#plannedQuantity').html(hiddenPlannedQuantity)
            $('#acheivedQuantity').html(hiddenAcheivedQuantity)
            $('#planPercentage').html(hiddenPlanPercentage)
            


    })
    
  

    
</script>


<script src="/js/charts.js"></script>







@include('partials.datatables-js')


@stop