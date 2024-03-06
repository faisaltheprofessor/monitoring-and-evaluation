@extends('app')

@section('main-content')
    <form class="row" action="/beneficiary" method="post">
        {{ csrf_field() }}
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Beneficiary Name</label>
                <input type="text" class="form-control" name="name" id="name">
                <i class="form-group__bar"></i>
            </div>

            <div class="form-group">
                <label for="name_dari">Beneficiary Name - Dari</label>
                <input type="text" class="form-control" dir="rtl" id="name_dari" name="name_dari">
                <i class="form-group__bar"></i>
            </div>

            <div class="form-group">
                <label for="name_dari">Abbreviation</label>
                <input type="text" class="form-control" id="abbreviation" name="abbreviation">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="clearfix"></div>

            <div class="mt-5 text-center">
                <input type="submit" class="btn btn-primary" value="Add Beneficiary">
            </div>

        </div>
    </form>
@stop


@section('scripts')
    @include('includes.success')

@stop