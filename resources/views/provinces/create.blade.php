@extends('app')

@section('main-content')
    <form class="row" action="/province" method="post">
        {{ csrf_field() }}
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Province Name</label>
                <input type="text" class="form-control" name="name" id="name">
                <i class="form-group__bar"></i>
            </div>

            <div class="form-group">
                <label for="name_dari">اسم ولایت</label>
                <input type="text" class="form-control" dir="rtl" id="name_dari" name="name_dari">
                <i class="form-group__bar"></i>
            </div>

            <div class="clearfix"></div>

            <div class="mt-5 text-center">
                <input type="submit" class="btn btn-primary" value="Add Province">
            </div>

        </div>
    </form>
@stop


@section('scripts')
    @include('includes.success')
@stop