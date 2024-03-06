@extends('app')

@section('page-title', 'subcomponents (Outcomes)')

@section('styles')
    <link rel="stylesheet" href="{{ asset('theme/vendors/select2/css/select2.min.css') }}">
@stop


@section('main-content')

    <div class="row">
        {{ csrf_field() }}
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-blue text-white">
                    Add subcomponent
                </div>
                <div class="card-body">
                    <form class="row" action="/subcomponent" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">subcomponent Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <label for="name_dari">اسم بخش</label>
                                <input type="text" class="form-control" dir="rtl" id="name_dari" name="name_dari">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                {{ Form::label('component_id', 'component') }}
                                {{ Form::select('component_id', $components, null, ['class' => 'form-control select2']) }}
                            </div>

                            <div class="clearfix"></div>

                            <div class="mt-5 text-center">
                                <input type="submit" class="btn btn-primary" value="Add subcomponent">
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-cyan text-white">
                    Available subcomponents
                </div>
                <div class="card-body">
                    <div class="listview">

                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>subcomponent</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php ($x = 1)
                            @foreach($subcomponents as $subcomponent)
                                <tr style="line-height:100%">
                                    <td>{{ $x++ }}</td>
                                    <td>
                                        <div class="listview__item">
                                            <i class="avatar-char bg-light-blue">{{ $subcomponent->name[0] }}</i>
                                            <div class="listview__content">
                                                <a href="/subcomponent/{{$subcomponent->id}}">
                                                    <div class="listview__heading">{{ $subcomponent->name }}</div>
                                                </a>
                                                <p>{{ $subcomponent->name_dari }}</p>
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
