@extends('app')

@section('styles')
    @include('includes.select2css')
@stop
@section('main-content')
    <form class="row" action="/district" method="post">
        {{ csrf_field() }}
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">District Name</label>
                <input type="text" class="form-control" name="name" id="name">
                <i class="form-group__bar"></i>
            </div>

            <div class="form-group">
                <label for="name_dari">اسم ولسوالی</label>
                <input type="text" class="form-control" dir="rtl" id="name_dari" name="name_dari">
                <i class="form-group__bar"></i>
            </div>

            <div class="form-group">
                <label for="province_id">Province</label>
                {{ Form::select('province_id', $provinces, null, ['class' => 'form-control select2', 'placeholder' => 'Choose a province']) }}
            </div>
            <div class="clearfix"></div>

            <div class="mt-5 text-center">
                <input type="submit" class="btn btn-primary" value="Add District">
            </div>

        </div>
    </form>
@stop


@section('scripts')
    @include('includes.success')
    @include('includes.select2')
@stop