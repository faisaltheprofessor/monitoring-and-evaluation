@extends('app')

@section('page-title')
    <h1> Workplans for the project - {{ $workplans[0]->project->name }} </h1>
@stop
@section('main-content')

    @if($workplans)
        @foreach ($workplans as $workplan)
            <h4>{{ $workplan->created_at->diffForHumans() }}</h4>
            <img src="/{{ $workplan->workplan }}" alt="" style="width: 100%">
        @endforeach
    @else
        No workplan found
    @endif
    <br>


@endsection
