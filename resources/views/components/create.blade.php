@extends('app')

@section('page-title', 'Components (Goals)')

@section('styles')
    <link rel="stylesheet" href="{{ asset('theme/vendors/select2/css/select2.min.css') }}">
@stop


@section('main-content')

    <div class="row">
        {{ csrf_field() }}
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-blue text-white">
                    Add Component
                </div>
                <div class="card-body">
                    <form class="row" action="/component" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Component Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <label for="name_dari">اسم بخش</label>
                                <input type="text" class="form-control" dir="rtl" id="name_dari" name="name_dari">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                {{ Form::label('project_id', 'Project') }}
                                {{ Form::select('project_id', $projects, null, ['class' => 'form-control select2']) }}
                            </div>

                            <div class="clearfix"></div>

                            <div class="mt-5 text-center">
                                <input type="submit" class="btn btn-primary" value="Add Component">
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-cyan text-white">
                    Available Components
                </div>
                <div class="card-body">
                    <div class="listview">

                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Component</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php ($x = 1)
                            @foreach($components as $component)
                                <tr style="line-height:100%">
                                    <td>{{ $x++ }}</td>
                                    <td>
                                        <div class="listview__item">
                                            <i class="avatar-char bg-light-blue">{{ $component->name[0] }}</i>
                                            <div class="listview__content">
                                                <a href="/component/{{$component->id}}">
                                                    <div class="listview__heading">{{ $component->name }}</div>
                                                </a>
                                                <p>{{ $component->name_dari }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-info"><i class="zmdi zmdi-edit"></i></a>
                                        <a href="#" class="btn btn-danger"><i class="zmdi zmdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </form>

        @stop



        @section('scripts')
            <script src="{{ asset('theme/vendors/select2/js/select2.full.min.js') }}"></script>
            <script>
                $('.select2').select2();
    </script>
@stop
