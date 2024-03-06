@extends('app')


@section('main-content')
    <div class="row price-table price-table--basic text-left">
        <div class="col-md-5">
            <div class="price-table__item">
                <header class="price-table__header bg-light-blue">
                    <div class="price-table__title">Add Indicator</div>
                </header>
                <form class="row" action="/indicator" method="post">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Indicator Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                            <i class="form-group__bar"></i>
                        </div>

                        <div class="form-group">
                            <label for="name_dari">اسم نشانگر</label>
                            <input type="text" class="form-control" dir="rtl" id="name_dari" name="name_dari">
                            <i class="form-group__bar"></i>
                        </div>


                        <div class="clearfix"></div>

                        <div class="mt-5 text-center">
                            <input type="submit" class="btn btn-primary" value="Add Unit">
                        </div>

                    </div>
                </form>

            </div>
        </div>

        <div class="col-md-7" style="text-align: left;">
            <div class="price-table__item">
                <header class="price-table__header bg-purple"  style="text-align: center;">
                    <div class="price-table__title">Available Indicators</div>
                </header>
                @php($x = 1)
                <table class="table table-dark mb-0 table-sm table-responsive-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Indicator</th>
                        <th>نشانگر</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($indicators as $indicator)
                        <tr>
                            <td>{{ $x++ }}</td>
                            <td>{{$indicator->name }}</td>
                            <td>{{ $indicator->name_dari }}</td>
                            <td style="text-align: right;">
                                <a href="#" class="btn btn-info"><i class="zmdi zmdi-edit"></i></a>
                                <a href="#" class="btn btn-danger delete" data-id="{{ $indicator->id }}" data-model="{{ get_class($indicators)}}"><i class="zmdi zmdi-delete"></i></a>
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
    @include('includes.success')
@stop







{{--<div class="row">--}}
{{--<div class="col-6">--}}


{{--</div>--}}
{{--<div class="col-6">--}}

{{--</div>--}}
{{--</div>--}}