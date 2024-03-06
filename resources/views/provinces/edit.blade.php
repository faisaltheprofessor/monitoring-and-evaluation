@extends('app')
@section('styles')
    <link rel="stylesheet" href="/assets/js/plugins/select2/css/select2.css">
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Default Elements -->
        <div class="block">
            <div class="block-header block-header-default bg-primary-light">
                <h3 class="block-title">Update Province</h3>
            </div>
            <div class="block-content">
    <form class="row" action="/province/{{$province->id}}" method="post">
        {{ csrf_field() }}
        @method('put')

        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Province Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $province->name }}">
            </div>

            <div class="form-group">
                <label for="name_dari">اسم ولایت</label>
                <input type="text" class="form-control" dir="rtl" id="name_dari" name="name_dari" value="{{ $province->name_dari }}">
            </div>
            <div class="form-group row">
                <label class="col-12" for="region_id">Region</label>
                <div class="col-md-12">
                    {!! Form::select('region_id', $regions, $province->region_id, ['class' => 'form-control js-select2', 'placeholder' => '----', 'required' => 'required']) !!}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-12" for="lat">Latitude</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" id="lat" name="lat"
                           placeholder="Latitude" value="{{ $province->lat }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12" for="long">Longitude</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" id="long" name="long"
                           placeholder="Longitude" value="{{ $province->long }}">
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update Province">
                <a href="/province" class="btn btn-secondary">Cancel</a>
            </div>

        </div>
    </form>
            </div>
        </div>
    </div>
</div>

@stop


@section('scripts')
    @include('includes.success')
    <script src="/assets/js/plugins/select2/js/select2.full.min.js"></script>
    <script>
    
        jQuery(function () {
                Codebase.helpers('select2');
            });
            </script>
@stop
