@extends('app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('theme/vendors/select2/css/select2.min.css') }}">
@stop

@section('main-content')
    <div class="content__inner content__inner--sm">
        <header class="content__title">
            <h1>Add new User</h1>
            <small>Nullam id dolor id nibh ultricies vehicula ut id elit</small>


        </header>

        <div class="card new-contact">
            <div class="new-contact__header">
                <a href="#" class="zmdi zmdi-camera new-contact__upload"></a>

                <img src="{{ asset('theme/demo/img/contacts/user_empty.png') }}" class="new-contact__img" alt="">
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" placeholder="i.e. Faisal">
                            <i class="form-group__bar"></i>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="i.e. Khan">
                            <i class="form-group__bar"></i>
                        </div>
                    </div>

                    {{--<div class="col-md-6">--}}
                        {{--<div class="form-group">--}}
                            {{--<label>Company</label>--}}
                            {{--<input type="text" class="form-control" placeholder="i.e. MAIL">--}}
                            {{--<i class="form-group__bar"></i>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job Title</label>
                            <input type="text" class="form-control" placeholder="i.e. Database Developer">
                            <i class="form-group__bar"></i>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" class="form-control" placeholder="i.e. faisalfazily@gmail.com">
                            <i class="form-group__bar"></i>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="role_id">Role</label>
                            {{ Form::select('rold_id', $roles, null, ['class' => 'form-control select2' ]) }}
                            <i class="form-group__bar"></i>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mobile Phone</label>
                            <input type="text" class="form-control" placeholder="i.e. 07xxxxxxxx">
                            <i class="form-group__bar"></i>
                        </div>
                    </div>


                </div>

                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control textarea-autosize" placeholder="i.e. 711-2880 Nulla St. Mankato, Mississippi, 96522." style="overflow: hidden; overflow-wrap: break-word; height: 51px;"></textarea>
                    <i class="form-group__bar"></i>
                </div>

                <div class="form-group">
                    <label>Notes</label>
                    <textarea class="form-control textarea-autosize" style="overflow: hidden; overflow-wrap: break-word; height: 51px;"></textarea>
                    <i class="form-group__bar"></i>
                </div>

                <div class="clearfix"></div>

                <div class="mt-5 text-center">
                    <a href="" class="btn btn-primary">Add User</a>
                </div>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    <script src="{{ asset('theme/vendors/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@stop