@extends('app')


@section('main-content')

    <div class="row price-table price-table--basic text-left">
        <div class="col-md-5">
            <div class="price-table__item">
                <header class="price-table__header bg-light-blue">
                    <div class="price-table__title">Create Role</div>
                    <div class="price-table__desc">and assign permissions</div>
                </header>

                <form action="roles_and_permissions" class="container" style="text-align: left;" method="post">
                    @csrf
                    <div class="form-group">
                        {{ Form::input('roleName', 'roleName', null , ['class' => 'form-control form-control-lg', 'placeholder' => 'Role Name', 'autofocus' => '']) }}
                        <br>
                <p>Permissions</p>
                      <div class="form-group">

                          @foreach ($permissions as $permission)
                              <div class="checkbox">
                                  <input type="checkbox" id="{{ Str::snake($permission->name) }}" name="name[]" value="{{ $permission->name }}">
                                  <label class="checkbox__label" for="{{ Str::snake($permission->name) }}" >{{ $permission->name }}</label>
                              </div>
                              @endforeach


                      </div>

                        <div class="form-group" style="text-align: center;">
                            <input type="submit" class="price-table__action bg-light-blue" value="Save">

                        </div>
                    </div>

                </form>
            </div>
        </div>

        <div class="col-md-7" style="text-align: left;">
            <div class="price-table__item">
                <header class="price-table__header bg-purple"  style="text-align: center;">
                    <div class="price-table__title">Available Roles</div>
                    <div class="price-table__desc">and their permissions</div>
                </header>
                @php($x = 1)
                    <table class="table table-dark mb-0 table-sm table-responsive-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Role</th>
                                <th style="width: 50%;">Permissions</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($roles as $role)
                              <tr>
                                  <th scope="row">{{ $x++ }}</th>
                                  <td >{{ $role->name }}</td>
                                  <td >
                                      @foreach ($role->permissions as $permission)
                                          <a href="#" class="badge badge-primary" style="margin-top:5px">{{$permission->name }}</a>
                                      @endforeach

                                  </td>
                                  <td style="text-align: right;">
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

@stop


@section('scripts')
    <script src="{{ asset('theme/vendors/autosize/autosize.min.js') }}"></script>

 @include('includes.success')
@stop