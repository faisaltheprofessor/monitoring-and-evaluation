@extends('app')
@section('page-title', 'Home' )
@php
    $activity = new App\Activity();
    $plan = new App\Plan();
    $progress = new App\MonthlyProgress();
@endphp
@section('breadcrumb', Breadcrumbs::render('home'))
@section('content')
     <!-- Page Content -->
     <div class="content">
          <!-- Content Sliders -->
          <div class="row items-push">
          {{-- First One --}}
              <div class="col-md-4">
                  <!-- Tiles Slider 3 -->
                  <div class="js-slider slick-nav-black slick-nav-hover" data-dots="true" data-autoplay="true" data-arrows="true">

                      <div class="block text-center bg-white mb-0">
                          <div class="block-content block-content-full bg-primary-lighter">
                              <i class="fa fa-keyboard-o fa-5x text-primary"></i>
                          </div>
                          <div class="block-content block-content-full block-content-sm bg-primary">
                              @php
                                $no_of_outputs = App\MonthlyProgress::count();
                                $no_of_irrigation_schemes = App\Irrigation::count();
                              @endphp
                              <div class="font-size-h3 font-w600 text-white">{{ $no_of_outputs + $no_of_irrigation_schemes}}</div>
                              <div class="text-white-op">{{ $progress->whereDate('created_at', '>=', date('Y-m-d'))->count() + App\Irrigation::whereDate('created_at', date('Y-m-d'))->count() }} Added Today</div>
                          </div>
                      </div>

                      <div class="block text-center bg-white mb-0">
                        <div class="block-content block-content-full bg-primary-lighter">
                            <i class="fa fa-tasks fa-5x text-primary"></i>
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-primary">
                            @php
                              $no_of_plans = App\Plan::count();
                            @endphp
                            <div class="font-size-h3 font-w600 text-white">{{ $no_of_plans }}</div>
                            <div class="text-white-op">@if($no_of_plans == 1) Plan @else Plans @endif</div>
                        </div>
                    </div>

                    <div class="block text-center bg-white mb-0">
                        <div class="block-content block-content-full bg-primary-lighter">
                            <i class="si si-basket-loaded fa-5x text-primary"></i>
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-primary">
                            @php
                              $no_of_activities = App\Activity::count();
                            @endphp
                            <div class="font-size-h3 font-w600 text-white">{{ $no_of_activities }}</div>
                            <div class="text-white-op">@if($no_of_activities == 1) Activity @else Activities @endif</div>
                        </div>
                    </div>

                  </div>
                  <!-- END Tiles Slider 3 -->
              </div>
              {{-- End of first one --}}


                {{-- Second One --}}
                <div class="col-md-4">
                    <!-- Tiles Slider 3 -->
                    <div class="js-slider slick-nav-black slick-nav-hover" data-dots="true" data-autoplay="true" data-arrows="true">

                        <div class="block text-center bg-white mb-0">
                            <div class="block-content block-content-full bg-primary-lighter">
                                <i class="fa fa-android fa-5x text-primary"></i>
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-primary">
                                @php
                                  $no_of_projects = App\Project::count();
                                @endphp
                                <div class="font-size-h3 font-w600 text-white">{{ $no_of_projects }}</div>
                                <div class="text-white-op">@if($no_of_projects == 1) Project @else Projects @endif</div>
                            </div>
                        </div>

                        <div class="block text-center bg-white mb-0">
                          <div class="block-content block-content-full bg-primary-lighter">
                              <i class="fa fa-window-maximize fa-5x text-primary"></i>
                          </div>
                          <div class="block-content block-content-full block-content-sm bg-primary">
                              @php
                                $no_of_components = App\Component::count();
                              @endphp
                              <div class="font-size-h3 font-w600 text-white">{{ $no_of_components }}</div>
                              <div class="text-white-op">@if($no_of_components == 1) Component @else Components @endif</div>
                          </div>
                      </div>

                      <div class="block text-center bg-white mb-0">
                          <div class="block-content block-content-full bg-primary-lighter">
                              <i class="fa fa-tasks fa-5x text-primary"></i>
                          </div>
                          <div class="block-content block-content-full block-content-sm bg-primary">
                              @php
                                $no_of_subcomponents = App\SubComponent::count();
                              @endphp
                              <div class="font-size-h3 font-w600 text-white">{{ $no_of_subcomponents }}</div>
                              <div class="text-white-op">@if($no_of_subcomponents == 1) Subcomponents @else Subcomponents @endif</div>
                          </div>
                      </div>

                    </div>
                    <!-- END Tiles Slider 3 -->
                </div>
                {{-- End of second one --}}

                  {{-- Third One --}}
              <div class="col-md-4">
                <!-- Tiles Slider 3 -->
                <div class="js-slider slick-nav-black slick-nav-hover" data-dots="true" data-autoplay="true" data-arrows="true">

                    <div class="block text-center bg-white mb-0">
                        <div class="block-content block-content-full bg-primary-lighter">
                            <i class="fa fa-leaf fa-5x text-primary"></i>
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-primary">

                            <div class="font-size-h3 font-w600 text-white">{{ $no_of_irrigation_schemes}}</div>
                            <div class="text-white-op">@if($no_of_irrigation_schemes== 1) Irrigation Scheme @else Irrigation Schemes @endif</div>
                        </div>
                    </div>

                    <div class="block text-center bg-white mb-0">
                        <div class="block-content block-content-full bg-primary-lighter">
                            <i class="fa fa-user fa-5x text-primary"></i>
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-primary">
                            @php
                              $no_of_users = App\User::count();
                            @endphp
                            <div class="font-size-h3 font-w600 text-white">{{ $no_of_users }}</div>
                            <div class="text-white-op">@if($no_of_users == 1) User @else Users @endif</div>
                        </div>
                    </div>

                    <div class="block text-center bg-white mb-0">
                      <div class="block-content block-content-full bg-primary-lighter">
                          <i class="fa fa-files-o fa-5x text-primary"></i>
                      </div>
                      <div class="block-content block-content-full block-content-sm bg-primary">
                          @php
                            $no_of_questionnaires = App\Questionnaire::count();
                          @endphp
                          <div class="font-size-h3 font-w600 text-white">{{ $no_of_questionnaires }}</div>
                          <div class="text-white-op">@if($no_of_questionnaires == 1) Questionnaire @else Questionnaire @endif</div>
                      </div>
                  </div>



                </div>
                <!-- END Tiles Slider 3 -->
            </div>
            {{-- End of third one --}}


          </div>
          <!-- END Content Sliders -->
             <!-- Google Map -->

             {{-- Start of Entry Chart --}}


             <div class="row">
                <div class="col-md-6" id="entryProgressChart">
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default  border-b bg-primary-light">
                            <h3 class="block-title">Database Entry Trend</h3>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>

                        </div>
                        <div class="block-content">
                            <apexchart type="line" height="350" :options="chartOptions" :series="series"></apexchart>
                    </div>

             </div>
                 </div>

                 <div class="col-md-6" id="actualVsPlanned">
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default  border-b bg-primary-light">
                            <h3 class="block-title">Actual vs Planned</h3>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>

                        </div>
                        <div class="block-content">
                            <apexchart type="line" height="350" :options="chartOptions" :series="series"></apexchart>
                    </div>

             </div>
                 </div>


            </div>
             {{-- End of Entry Chart --}}
                <div class="row" id="app">
                    <div class="col-md-12" >
                        <div class="block block-rounded block-bordered">
                            <div class="block-header block-header-default  border-b bg-primary-light">
                                <h3 class="block-title">IFAD/MAIL on Map</h3>

                                    <label class="css-control css-control-warning css-switch">
                                        <input type="checkbox" class="css-control-input" :checked="showProvinces ? 'checked' : ''" @change="showProvinces = !showProvinces">
                                        <span class="css-control-indicator"></span><span style="color:white">Provinces</span>
                                    </label>




                                    <label class="css-control css-control-warning css-switch">
                                        <input type="checkbox" class="css-control-input" :checked="showDistricts" @change="showDistricts = !showDistricts">
                                        <span class="css-control-indicator"></span><span style="color:white">Districts</span>
                                    </label>
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>

                            </div>
                            <div class="block-content">

                            <gmap-map
                                :center="{lat:33.9391, lng:67.7100}"
                                :zoom="zoom"
                                style="width:100%; height:600px"
                                @click="infoWindowOpened=false; districtInfoWindowOpened=false"
                                @zoom_changed="handleZoomChange"
                                >
                            <gmap-info-window
                            :options="infoWindowOptions"
                            :position="infoWindowPosition"
                            :opened="infoWindowOpened"

                            @closeclick="handleInfoWindowClosed"
                            >
                               <div class="info-window" style="width:300px; padding:15px">
                                   <h2>@{{ activeProvince.name }}</h2>
                                   <p style="margin-bottom: 0; font-weight:bold">Districts covered: <span>@{{ activeProvince.no_of_districts }}</span></p>
                                   <hr style="margin:0 0 5px 0">
                                   <ol style="padding-left: 20px;margin-top:0; padding-top:0">
                                       <li v-for="district in activeProvince.districts" :key="district.id">@{{district.name}} <span style="color:green; font-weight:bold;">(@{{district.percentage}}%)</span></li>
                                   </ol>
                                   <p>Activities: @{{ activeProvince.activity_count }} <span style="color:green">(@{{activeProvince.percentage}}%)</span></p>
                               </div>
                            </gmap-info-window>
                                <gmap-marker v-if="showProvinces" v-for="province in provinces" :key="province.id" @click="handleMarkerClicked(province)"
                                    :position="getPosition(province)"
                                    :clickable="true"
                                    :draggable="false"
                                    {{-- :icon="{path:'M55.296 -56.375v40.32q0 1.8 -1.224 3.204t-3.096 2.178 -3.726 1.152 -3.474 0.378 -3.474 -0.378 -3.726 -1.152 -3.096 -2.178 -1.224 -3.204 1.224 -3.204 3.096 -2.178 3.726 -1.152 3.474 -0.378q3.78 0 6.912 1.404v-19.332l-27.648 8.532v25.524q0 1.8 -1.224 3.204t-3.096 2.178 -3.726 1.152 -3.474 0.378 -3.474 -0.378 -3.726 -1.152 -3.096 -2.178 -1.224 -3.204 1.224 -3.204 3.096 -2.178 3.726 -1.152 3.474 -0.378q3.78 0 6.912 1.404v-34.812q0 -1.116 0.684 -2.034t1.764 -1.278l29.952 -9.216q0.432 -0.144 1.008 -0.144 1.44 0 2.448 1.008t1.008 2.448z'}" --}}
                                    >
                                </gmap-marker>

                                    /Districts

                            <gmap-info-window
                            :options="districtInfoWindowOptions"
                            :position="districtInfoWindowPosition"
                            :opened="districtInfoWindowOpened"
                            @closeclick="handleInfoWindowClosed"
                            >
                               <div class="info-window">
                                   <h2>@{{ activeDistrict.name }}</h2>
                                    <ul>
                                        <li v-for="(count, project) in activeDistrict.projectActivityCount" :key="'districtProject' + Math.random()" v-if="count>0"> @{{project}} : @{{ count }}</li>
                                    </ul>
                               </div>
                            </gmap-info-window>

                                <gmap-marker v-if="zoom >= 8 && showDistricts" v-for="district in districts" :key="'dist' + district.id" @click="handleDistrictMarkerClicked(district)"
                                :position="getPosition(district)"
                                :clickable="true"
                                :draggable="false"
                                {{-- :icon="'https://flyclipart.com/downloadpage/images/free-cartoon-cow-682571.png/682571'" --}}
                                :icon="'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'"
                                {{-- :icon = "districIcon" --}}

                                >
                            </gmap-marker>


                            </gmap-map>
                        </div>

                 </div>
                     </div>
                </div>

         <!-- END Google Map -->




        <div class="row invisible mt-30" data-toggle="appear">
            <!-- Row #3 -->
            <div class="col-md-6">
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default  border-b bg-primary-light">
                        <h3 class="block-title">Recent Progress (Outputs)</h3>

                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th style="width: 100px;">#</th>
                                    <th>Activity</th>
                                    <th class="d-none d-sm-table-cell">Province</th>
                                    <th class="">District</th>
                                    <th>Quantity</th>
                                    <th>Entry User</th>
                                    <th>Entry Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $x = 1 @endphp
                              @foreach($progress->orderBy('id','desc')->limit(10)->get() as $current_progress)
                              <tr>
                                <td>
                                    <a class="font-w600" href="be_pages_ecom_order.html">{{ $x++ }}</a>
                                </td>
                                <td>
                                   @if($current_progress->activity)
                                   {{ $current_progress->activity->name }}
                                   @endif
                                </td>
                                <td>
                                    @if($current_progress->province)
                                    {{ $current_progress->province->name }}
                                    @endif
                                </td>
                                <td>
                                    @if($current_progress->district)
                                    {{ $current_progress->district->name }}
                                    @endif
                                </td>
                                <td>
                                    {{ $current_progress->quantity }}
                                </td>
                                  <td>{{ $current_progress->user->first_name }}</td>
                                  <td>@if($current_progress->created_at->toDateString() == Carbon\Carbon::now()->toDateString()) {{ $current_progress->created_at->diffForHumans() }} @else {{ $current_progress->created_at->toDateString() }} @endif</td>

                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Irrigation Schemes --}}
            <div class="col-md-6">
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default  border-b bg-primary-light">
                        <h3 class="block-title">Recent Progress (Irrigation Schemes)</h3>
                        @php
                            $irrigation_schemes = App\Irrigation::latest()->limit(10)->get();
                        @endphp
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th style="width: 100px;">#</th>
                                    <th>Scheme</th>
                                    <th>Code</th>
                                    <th class="d-none d-sm-table-cell">Province</th>
                                    <th class="">District</th>
                                    <th>Entry User</th>
                                    <th>Entry Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $x = 1 @endphp
                              @foreach(App\Irrigation::orderBy('id','desc')->limit(10)->get() as $irrigation)
                              <tr>
                                <td>
                                    <a class="font-w600" href="be_pages_ecom_order.html">{{ $x++ }}</a>
                                </td>
                                <td>
                                   @if($irrigation->scheme)
                                   {{ $irrigation->scheme->name }}
                                   @endif
                                </td>
                                <td>
                                    @if($irrigation->scheme)
                                    {{ $irrigation->scheme->code }}
                                    @endif
                                 </td>
                                <td>
                                    @if($irrigation->province)
                                    {{ $irrigation->province->name }}
                                    @endif
                                </td>
                                <td>
                                    @if($irrigation->district)
                                    {{ $irrigation->district->name }}
                                    @endif
                                </td>

                                  <td>{{ $irrigation->user->first_name }}</td>
                                  <td>@if($irrigation->created_at->toDateString() == Carbon\Carbon::now()->toDateString()) {{ $irrigation->created_at->diffForHumans() }} @else {{ $current_progress->created_at->toDateString() }} @endif</td>

                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>











            <!-- END Row #3 -->
        </div>



    </div>
    <!-- END Page Content -->

@stop


@section('scripts')
{{-- <script src="assets/js/codebase.core.min.js"></script> --}}

<!--
    Codebase JS

    Custom functionality including Blocks/Layout API as well as other vital and optional helpers
    webpack is putting everything together at assets/_es6/main/app.js
-->
{{-- <script src="assets/js/codebase.app.min.js"></script> --}}

<!-- Page JS Plugins -->
{{-- <script src="assets/js/plugins/chartjs/Chart.bundle.min.js"></script> --}}

<!-- Page JS Code -->
{{-- <script src="assets/js/pages/be_pages_dashboard.min.js"></script> --}}
{{--
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJy7-UzmmAi1uHTMdlZrizgi0jZkZPkNc"></script>
<script src="assets/js/plugins/gmapsjs/gmaps.min.js"></script>

<!-- Page JS Code -->
<script src="/assets/_es6/pages/be_comp_maps_google.js"></script> --}}

<script src="/js/app.js"></script>
<script>
    $('#entrySummary').click(() => window.open('/entry-summary','_blank'))
</script>

  <!-- Page JS Plugins -->
  <script src="/assets/js/plugins/slick/slick.min.js"></script>

  <!-- Page JS Helpers (Slick Slider plugin) -->
  <script>jQuery(function(){ Codebase.helpers('slick'); });</script>
@stop

@section('styles')
 <!-- Page JS Plugins CSS -->
 <link rel="stylesheet" href="assets/js/plugins/slick/slick.css">
 <link rel="stylesheet" href="assets/js/plugins/slick/slick-theme.css">
<link rel="stylesheet" href="/css/map-icons.min.css">
    <style>
        #map {
            height: 100%;
        }

        #entrySummary:hover {
            cursor: pointer !important;
        }
    </style>

@stop
