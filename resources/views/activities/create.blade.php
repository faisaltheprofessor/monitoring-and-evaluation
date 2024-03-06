@extends('app')
@section('page-title', 'Dashboard')


@section('main-content')

    <form class="row" action="{{ url('activity') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Activity Name</label>
                <input type="text" class="form-control" name="name" id="name">
                <i class="form-group__bar"></i>
            </div>

            <div class="form-group">
                <label for="name_dari">اسم فعالیت</label>
                <input type="text" class="form-control" dir="rtl" id="name_dari" name="name_dari">
                <i class="form-group__bar"></i>
            </div>

            <div class="form-group">
               {{ Form::label('subcomponent_id', 'Sub-component') }}
                {{ Form::select('subcomponent_id', $subComponents, null, ['class' => 'form-control select2' ]) }}
                <i class="form-group__bar"></i>
            </div>

            <div class="form-group">
                {{ Form::label('unit_id', 'Unit') }}
                {{ Form::select('unit_id', $units, null, ['class' => 'form-control select2' ]) }}
                <i class="form-group__bar"></i>
            </div>

            <div class="form-group">
                {{ Form::label('appraisal', 'Appraisal') }}
                <input type="text" class="form-control" name="appraisal" id="appraisal">
                
                <i class="form-group__bar"></i>
            </div>


            <div class="clearfix"></div>

            <div class="mt-5 text-center">
                <input type="submit" class="btn btn-primary" value="Save Activity">
            </div>

        </div>
    </form>

@stop
