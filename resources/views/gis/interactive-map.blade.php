@extends('app')

@section('scripts')
    <script src="/js/app.js"></script>
@stop


@section('content')
    <div id="app">
       
        <gmap-map
            :center="{lat:33.9391, lng:67.7100}"
            :zoom="7"
            style="width:100%; height:100vh"
            @click="infoWindowOpened=false"
            >
        <gmap-info-window
        :options="infoWindowOptions"
        :position="infoWindowPosition"
        :opened="infoWindowOpened"
        @closeclick="handleInfoWindowClosed"
        >
           <div class="info-window">
               <h2>@{{ activeProvince.name }}</h2>
               <p style="margin-bottom: 0; font-weight:bold">Districts covered: <span>@{{ activeProvince.no_of_districts }}</span></p>
               <hr style="margin:0 0 5px 0">
               <ol style="padding-left: 15px;margin-top:0; padding-top:0">
                   <li v-for="district in activeProvince.districts" :key="district.id">@{{district.name}} <span style="color:green; font-weight:bold;">(@{{district.percentage}}%)</span></li>
               </ol>
               <p>Activities: @{{ activeProvince.activity_count }} <span style="color:green">(@{{activeProvince.percentage}}%)</span></p>
           </div>
        </gmap-info-window>
            <gmap-marker v-for="province in provinces" :key="province.id" @click="handleMarkerClicked(province)"
                :position="getPosition(province)"
                :clickable="true"
                :draggable="false"
                {{-- :icon="{path:'M55.296 -56.375v40.32q0 1.8 -1.224 3.204t-3.096 2.178 -3.726 1.152 -3.474 0.378 -3.474 -0.378 -3.726 -1.152 -3.096 -2.178 -1.224 -3.204 1.224 -3.204 3.096 -2.178 3.726 -1.152 3.474 -0.378q3.78 0 6.912 1.404v-19.332l-27.648 8.532v25.524q0 1.8 -1.224 3.204t-3.096 2.178 -3.726 1.152 -3.474 0.378 -3.474 -0.378 -3.726 -1.152 -3.096 -2.178 -1.224 -3.204 1.224 -3.204 3.096 -2.178 3.726 -1.152 3.474 -0.378q3.78 0 6.912 1.404v-34.812q0 -1.116 0.684 -2.034t1.764 -1.278l29.952 -9.216q0.432 -0.144 1.008 -0.144 1.44 0 2.448 1.008t1.008 2.448z'}" --}}
                >
            </gmap-marker>
        </gmap-map>
    </div>
@endsection