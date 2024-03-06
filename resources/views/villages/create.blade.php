@extends('app')

@section('styles')
    @include('includes.select2css')
@stop
@section('main-content')
    <form class="row" action="/village" method="post">
        {{ csrf_field() }}
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Village Name</label>
                <input type="text" class="form-control" name="name" id="name">
                <i class="form-group__bar"></i>
            </div>

            <div class="form-group">
                <label for="name_dari">اسم قریه</label>
                <input type="text" class="form-control" dir="rtl" id="name_dari" name="name_dari">
                <i class="form-group__bar"></i>
            </div>

            <div class="form-group">
                <label for="district_id">District</label>
                {{ Form::select('district_id', $districts, null, ['class' => 'form-control select2', 'placeholder' => 'Choose a District']) }}
            </div>
            <div class="clearfix"></div>

            <div class="mt-5 text-center">
                <input type="submit" class="btn btn-primary" value="Add Village">
            </div>

        </div>
    </form>
@stop


@section('scripts')
    @include('includes.success')
    @include('includes.select2')
@stop