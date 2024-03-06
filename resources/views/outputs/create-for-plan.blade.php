@extends('app')
@section('styles')

@include('includes.select2css')
    @include('includes.datepickerCss')
    <link rel="stylesheet" href="{{ asset('theme/demo/css/demo.css') }}">
<style>
    .btn-new {
        float: right;
        margin-top:10px;
        font-size:1em !important;
    }

    label {
        font-weight: 700 !important;
    }
</style>
@stop
@section('page-title', 'Add Output -' . $plans[$_GET['plan_id']]);
@section('main-content')



    <form action="/outputForPlan" method="post">
        @csrf
        <div class="row">

            <div class="col col-lg-6 col-md-12 col-sm-12 form-group">
                {{ Form::label('plan_id', 'Plan') }}
                {{ Form::select('plan_id', $plans, $_GET['plan_id'], ['class' => 'form-control select2', 'placeholder' => 'Choose Plan...']) }}
                <i class="form-group__bar"></i>
                <span class="small btn-new"><a href="/components/create" class="add-ajax-item" data-add="add-component" data-target="components" data-title="Add New Component"> New </a></span>
            </div>


            <div class="col col-lg-6 col-md-12 col-sm-12 form-group">
                {{ Form::label('implementing_partner_id', 'Implementing Partner') }}
                {{ Form::select('implementing_partner_id', $implementingPartners, null, ['class' => 'form-control select2', 'placeholder' => 'Choose Implementing Partner...']) }}
                <i class="form-group__bar"></i>
                <span class="small btn-new"><a href="/components/create" class="add-ajax-item" data-add="add-component" data-target="components" data-title="Add New Component"> New </a></span>
            </div>


            <div class="col col-lg-6 col-md-12 col-sm-12 form-group">
                {{ Form::label('direct_beneficiary_id', 'Direct Beneficiary') }}
                {{ Form::select('direct_beneficiary_id', $beneficiaries, null, ['class' => 'form-control select2', 'placeholder' => 'Choose Indirect Beneficiary...']) }}
                <i class="form-group__bar"></i>
                <span class="small btn-new"><a href="/components/create" class="add-ajax-item" data-add="add-component" data-target="components" data-title="Add New Component"> New </a></span>

            </div>

            <div class="col col-lg-6 col-md-12 col-sm-12 form-group" id="activity">
                {{ Form::label('indirect_beneficiary_id', 'indirect Beneficiary') }}
                {{ Form::select('indirect_beneficiary_id', $beneficiaries, null, ['class' => 'form-control select2', 'placeholder' => 'Choose Implementing Partner...']) }}
                <i class="form-group__bar"></i>
                <span class="small btn-new"><a href="/components/create" class="add-ajax-item" data-add="add-component" data-target="components" data-title="Add New Component"> New </a></span>
            </div>



            {{--Progress--}}
            <div class="col col-lg-6 col-md-12 col-sm-12 form-group">
                {{ Form::label('quantity', 'Quantity') }}
                {{ Form::text('quantity', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>

                {{--<input type="number"  name="progress" id="progress" class="form-control">--}}
            </div>


            {{--Cost--}}
            <div class="col col-lg-6 col-md-12 col-sm-12 form-group">
                {{ Form::label('cost', 'Cost') }}
                {{ Form::number('cost', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>
            </div>

            <div class="col col-lg-6 col-md-12 col-sm-12">
                <label>Start Date</label>
                {{--Start Date--}}
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                    </div>
                    {{--<input type="date" class="form-control hidden-md-up" placeholder="Pick a date" name="start_date">--}}
                    <input type="text" class="form-control date-picker hidden-sm-down" placeholder="Pick a date" name="start_date">
                    <i class="form-group__bar"></i>

                </div>
            </div>

            <div class="col col-lg-6 col-md-12 col-sm-12">
                <label>End Date</label>
                {{-- End Date--}}
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                    </div>
                    {{--<input type="date" class="form-control hidden-md-up" placeholder="Pick a date" name="end_date">--}}
                    <input type="text" class="form-control date-picker hidden-sm-down" placeholder="Pick a date" name="end_date">
                    <i class="form-group__bar"></i>
                </div>
            </div>
        </div>

        <div class="row">




        </div>

        {{--Province District Village--}}
        <div class="row">
            {{--Project--}}
            <div class="col col-lg-6 col-md-12 col-sm-12 form-group" id="provinces">
                {{ Form::label('province_id', 'Province') }}
                <select id="province_id" name="province_id" class="select2-ajax form-control" placeholder="Select a Province...."></select>
                <i class="form-group__bar"></i>
                <span class="small btn-new"><a href="/components/create" class="add-ajax-item" data-add="add-component" data-target="components" data-title="Add New Component"> New </a></span>
            </div>

            {{--Component--}}
            <div class="col col-lg-6 col-md-12 col-sm-12 form-group" id="districts">
                {{ Form::label('district_id', 'District') }}
                <select id="district_id" name="district_id" class="select2-ajax form-control" placeholder="Select a District...."></select>
                <i class="form-group__bar"></i>
                <span class="small btn-new"><a href="/components/create" class="add-ajax-item" data-add="add-component" data-target="components" data-title="Add New Component"> New </a></span>
            </div>

            {{--Sub Components--}}
            <div class="col col-lg-6 col-md-12 col-sm-12 form-group" id="villages">

                {{ Form::label('village_id', 'Village') }}
                <select id="village_id" name="village_id" class="select2-ajax form-control" placeholder="Select a Village...."></select>
                <i class="form-group__bar"></i>
                <span class="small btn-new"><a href="/components/create" class="add-ajax-item" data-add="add-component" data-target="components" data-title="Add New Component"> New </a></span>

            </div>
        </div>

        <div class="row">



            {{--Progress--}}
            <div class="col col-lg-6 col-md-12 col-sm-12 form-group">
                {{ Form::label('Progress', 'Progress (%)') }}
                {{ Form::text('progress', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>

                {{--<input type="number"  name="progress" id="progress" class="form-control">--}}
            </div>

            {{--Command Area--}}
            <div class="col col-lg-6 col-md-12 col-sm-12 form-group">
                {{ Form::label('command_area', 'Command Area') }}
                {{ Form::text('command_area', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>
            </div>



        </div>



        <h5><i class="zmdi zmdi-pin-drop"></i> GPS Coordinates</h5>
        <div class="row">
            {{--Lat--}}
            <div class="col col-lg-3 col-md-6 col-sm-12 form-group">
                {{ Form::label('lat_start', 'GPS Latitude') }}
                {{ Form::text('lat_start', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>

            </div>


            {{--Long--}}
            <div class="col col-lg-3 col-md-6 col-sm-12 form-group">
                {{ Form::label('long_start', 'GPS Longitude') }}
                {{ Form::text('long_start', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>

            </div>

            {{--End Lat--}}

            <div class="col col-lg-3 col-md-6 col-sm-12 form-group">
                {{ Form::label('lat_end', 'End GPS Latitude') }}
                {{ Form::text('lat_end', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>

            </div>


            {{--End Long--}}

            <div class="col col-lg-3 col-md-6 col-sm-12 form-group">
                {{ Form::label('long_end', 'End GPS Longitude') }}
                {{ Form::text('long_end', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>

            </div>



        </div>


        <div class="row">


            <div class="col col-lg-6 col-md-6 col-sm-12 form-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::text('description', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>
            </div>



            <div class="col col-lg-6 col-md-6 col-sm-12 form-group">
                {{ Form::label('remarks', 'Remarks') }}
                {{ Form::text('remarks', null, ['class' => 'form-control']) }}
                <i class="form-group__bar"></i>
            </div>






        </div>

        <div class="row">
            {{--End Long--}}

            <div class="col form-group">
                {{ Form::label('output_details', 'Project Output Details') }}
                <input type="textarea" class="form-control" name="output_details" id="output_details">
                <i class="form-group__bar"></i>

            </div>
        </div>


        <div class="row pull-right">
            <div class="form-group col">
                <input type="reset" value="Cancel" class="btn  btn-danger form-control">
                {{--<input type="submit" value="Save " class="btn  btn-primary">--}}
            </div>
            <div class="form-group col">
                <input type="submit" class="btn btn-primary form-control" value="Save">

            </div>
        </div>






    </form>

    {{--Modal--}}
    <div class="modal fade" id="add-new" style="overflow:hidden;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pull-left">Default modal</h5>
                </div>
                <hr>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link ajax-item-save" >Save changes</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    @include('includes.select2')
    @include('includes.datepicker')
    @include('includes.sweetalert')
    <script src="{{ asset('theme/vendors/bootstrap-notify/bootstrap-notify.min.js') }}"></script>



    <script>


        modal = $('#add-new')

        $('a.add-ajax-item').on('click', function(e){
            e.preventDefault();
            $this = $(this)
            title = $this.data('title')
            modal.find('.modal-header h5').html(title)
            $.ajax({
                beforeSend: function(){},
                url: '/add-ajax-item',
                data: {view: $this.data('add')}
            }).done(function(returnData){
               modal.find('.modal-body').empty().append(returnData)
                $('.modal-body .select2').select2({
                    dropdownParent: $('#add-new')

            })

            })
            modal.modal()
        })


        $('.ajax-item-save').click(function() {
            form = modal.find('form')
            model = form.find('input[name="model"]').val()
            $.get({
                url: form.attr('action'),
                data: form.serialize(),
                success: (returnData) => swal({
                    title: 'Success!',
                    text: returnData,
                    type: 'success',
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-primary'
                }),
                error: (e) =>{
                    ul = '<ul></ul>';
                    $.each(e.responseJSON.errors.name,(x, y) => {
                        $.notify({
                            title: 'Failed!',
                            message: y,
                        }, {
                            type: 'danger',
                            placement: {align:'center'}
                        });
                    })
                },
                complete: () => modal.modal('hide')



            })



        });



    </script>

@include ('includes.success')
    @error('plan_id')
    <script>
        $.notify({
            title: 'Error!',
            message: "{{ $message }}",
        }, {
            allow_dismiss:true,
            timer:500,
            template:   '<div data-notify="container" class="alert alert-dismissible alert-danger alert--notify" role="alert">' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '<button type="button" aria-hidden="true" data-notify="dismiss" class="alert--notify__close">Close</button>' +
            '</div>'
        });
    </script>

    @enderror



@stop
