@extends('app')

@section('page-title')
    @if($workplan) <h1> Workplan for the project - {{ $workplan->project->name }} </h1> @endif
@stop
@section('main-content')

    @if($workplan)
        <img src="/{{ $workplan->workplan }}" alt="" style="width: 100%">
    @else
        No workplan found
    @endif
    <br>

    <form action="/updateWorkplan" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $workplan->project_id }}">
        <input type="file" name="workplan" id="workplan" style="display: none">
    </form>

    <a class="btn btn-info" href="#" style="display:inline-block; margin-top:20px">See History</a>
    <a class="btn btn-success" href="#" style="display:inline-block; margin-top:20px" id="update">Update Workplan</a>
    <a class="btn btn-success" style="display: none; margin-top:20px" id="submit"> Upload</a>

@endsection


@section('scripts')
    <script>
        $('#update').click((e) => {
            $('#workplan').trigger('click')
            $('#submit').css('display', 'inline-block')
            e.preventDefault()
        })


    </script>
@stop
