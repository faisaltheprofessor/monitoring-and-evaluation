@extends('app')
   

@section('main-content')
@php 
    $activities = \App\Activity::findMany(\App\MonthlyProgress::groupBy('activity_id')->get('activity_id'));
    $provinces = \App\Province::findMany(\App\MonthlyProgress::groupBy('province_id')->get('province_id'));
    $districts = \App\District::findMany(\App\MonthlyProgress::groupBy('district_id')->get('district_id'));
    
@endphp
@foreach($provinces as $province)
<div class="activity-title" style="display: block; width:100%; background:grey; padding:5px">{{ $province->name }}</div>
<table class="table">
    <thead>
        <tr>
            <th>January</th>
            <th>February</th>
            <th>March</th>
            <th>April</th>
            <th>May</th>
            <th>June</th>
            <th>July</th>
            <th>August</th>
            <th>September</th>
            <th>October</th>
            <th>November</th>
            <th>December</th>
        </tr>
    </thead>

</table>

@endforeach

@foreach($provinces as $province)
        @php 
            $records = DB::table('monthly_progress')->where('province_id', '=', $province->province_id);
            $districts = \App\MonthlyProgress::where('province_id', '=', $province->province_id)->groupBy('district_id')->get('district_id');
        @endphp




@endforeach

       {{-- <li>{{ $province->province->name }} : {{ $records->count() }}</li>
       <table width="100%" border="1">
           <tr>
               <td>Activity Name</td>
                @foreach($districts as $district)
                    @if($district->district_id != null) <td>{{ $district->district->name }}</td> @endif
                @endforeach
           </tr>

           
       </table> --}}
@stop