@extends('app')

@section('page-title') <h1>{{ $component->name }}</h1> @stop
@section('main-content')
    @include('includes.success')
    <h5>{{ $component->name_dari }}</h5>
    <hr>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-blue text-white">Add Subomponent</div>
                <div class="card-body">
                    <form class="row" action="/subcomponent" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="redirect" value="/component/{{ $component->id }}">
                        <input type="hidden" name="component_id" value="{{ $component->id }}">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Subcomponent Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <label for="name_dari" s>اسم بخش</label>
                                <input type="text" class="form-control" dir="rtl" id="name_dari" name="name_dari">
                                <i class="form-group__bar"></i>
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
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header bg-cyan text-white">Available Subomponents</div>
                <div class="card-body">
                    @php ($x = 1)
                    <table class="table mb-0 table-sm table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>بخش</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($component->subcomponents as $subcomponent)
                            <tr>
                                <td><a href="/subcomponent/{{ $subcomponent->id }}">{{ $x++ }}</a></td>
                                <td><a href="/subcomponent/{{ $subcomponent->id }}">{{ $subcomponent->name }}</a></td>
                                <td><a href="/subcomponent/{{ $subcomponent->id }}">{{ $component->name_dari }}</a></td>
                                <td>
                                    <a href="#" class="btn btn-info" data-id="{{ $component->d }}"
                                       data-model="{{ get_class($component) }}" }}><i class="zmdi zmdi-edit"></i></a>
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

@stop

