@extends('app')
@section('styles')
    <link rel="stylesheet" href="/assets/js/plugins/select2/css/select2.css">

@stop
@section('breadcrumb', Breadcrumbs::render('create-plan'))
@section('page-title', 'Add Plan')
@section('content')
    @php
        $years = [
                '2014' => '2014',
                '2015' => '2015',
                '2016' => '2016',
                '2017' => '2017',
                '2018' => '2018',
                '2019' => '2019',
                '2020' => '2020',
                '2021' => '2021',
                '2022' => '2022',
                '2023' => '2023',
                '2024' => '2024',
                '2025' => '2025',
             ];
    @endphp
    <div class="block">
        <div class="block-header block-header-default bg-primary-light">
            <h3 class="block-title">Update Plan</h3>
        </div>
        <div class="block-content">
            <form action="/plan/{{$plan->id}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    {{--Project--}}
                    <div class="col col-lg-6 col-md-12 col-sm-12 form-group" id="projects">
                        {{ Form::label('project_id', 'Project') }}
                        {{ Form::select('project_id', $projects, $plan->project_id, ['class' => 'form-control js-select2', 'placeholder' => 'Choose Project...']) }}
                          {{-- <select id="project_id" name="project_id" class="select2-ajax form-control" placeholder="Select a project...."></select> --}}

                        {{-- <span class="small" style="float: right; margin-top:10px"><a href="/project/create" class="btn btn-sm btn-outline-info add-ajax-item" data-add="add-project" data-target="'projects" data-title="Add New Project"> New </a></span> --}}
                    </div>


                    {{--Component--}}
                    {{--<div class="col col-lg-6 col-md-12 col-sm-12 form-group" id="components">--}}
                    {{--{{ Form::label('component_id', 'Component') }}--}}
                    {{--<select id="component_id" name="component_id" class="select2-ajax form-control" placeholder="Select a component...."></select>--}}
                    {{--<i class="form-group__bar"></i>--}}
                    {{--<span class="small" style="float: right; margin-top:10px"><a href="/components/create" class="btn btn-sm btn-outline-info add-ajax-item" data-add="add-component" data-target="components" data-title="Add New Component"> New </a></span>--}}
                    {{--</div>--}}


                    {{--Sub Components--}}
                    {{--<div class="col col-lg-6 col-md-12 col-sm-12 fom-group" id="subcomponents">--}}

                    {{--{{ Form::label('subcomponent_id', 'Sub Component') }}--}}
                    {{--<select id="subcomponent_id" name="subcomponent_id" class="select2-ajax form-control" placeholder="Select a Subcomponent...."></select>--}}
                    {{--<i class="form-group__bar"></i>--}}
                    {{--<span class="small" style="float: right; margin-top:10px"><a href="/subcomponents/create" class="btn btn-sm btn-outline-info add-ajax-item" data-add="add-subcomponent" data-target="subcomponents" data-title="Add New Component"> New </a></span>--}}
                    {{--</div>--}}


                    {{--Activity--}}
                    <div class="col col-lg-6 col-md-12 col-sm-12 form-group" id="activity">
                        {{ Form::label('activity_id', 'Activity') }}
                        {{ Form::select('activity_id', $activities, $plan->activity_id, ['class' => 'form-control js-select2', 'placeholder' => 'Choose Activity...']) }}

                        {{-- <select id="activity_id" name="activity_id" class="select2-ajax form-control" placeholder="Select an Activity...."></select> --}}
                        <i class="form-group__bar"></i>
                        <span class="small" style="float: right; margin-top:10px"><a href="/components/create" class="btn btn-sm btn-outline-info add-ajax-item" data-add="add-component" data-target="components" data-title="Add New Component"> New </a></span>
                    </div>






                    {{--Quantity--}}
                    <div class="col col-lg-3 col-md-12 col-sm-12 form-group">
                        {{ Form::label('quantity', 'Quantity') }}
                        {{ Form::text('quantity', $plan->quantity, ['class' => 'form-control']) }}
                        <i class="form-group__bar"></i>

                        {{--<input type="number"  name="progress" id="progress" class="form-control">--}}
                    </div>


                    <div class="col col-lg-3 col-md-12 col-sm-12 form-group">
                        {{ Form::label('unit_id', 'Unit') }}
                        {{ Form::select('unit_id', $units, $plan->unit_id, ['class' => 'form-control js-select2']) }}
                        <i class="form-group__bar"></i>

                        {{--<input type="number"  name="progress" id="progress" class="form-control">--}}
                    </div>

                    <div class="col col-lg-6 col-md-12 col-sm-12 form-group">
                        {{ Form::label('indicator_id', 'Indicator') }}
                        {{ Form::select('indicator_id', $indicators, $plan->indicator_id, ['class' => 'form-control js-select2', 'placeholder' => 'Please select and indicator']) }}
                        <i class="form-group__bar"></i>

                    </div>

                    {{--Cost--}}
                    <div class="col col-lg-6 col-md-12 col-sm-12 form-group">
                        {{ Form::label('cost', 'Cost') }}
                        {{ Form::number('cost', $plan->cost, ['class' => 'form-control']) }}
                        <i class="form-group__bar"></i>
                    </div>




                    <div class="col col-lg-6 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    {{ Form::select('year', $years, $plan->year, ['class' => 'form-control js-select2', 'placeholder' => 'Please select year']) }}

                                </div>

                            </div>



                        </div>
                    </div>

















                </div>
                <div class="row">
                    <div class="form-group col">
                        <input type="reset" value="Cancel" class="btn-danger form-control">
                        {{--<input type="submit" value="Save " class="btn  btn-primary">--}}
                    </div>
                    <div class="form-group col">
                        <input type="submit" class="btn btn-primary form-control" value="Save">

                    </div>
                </div>






            </form>
        </div>
    </div>


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
    @include('includes.success')

    <!-- Page JS Plugins -->
    <script src="/assets/js/plugins/select2/js/select2.full.min.js"></script>

    {{-- <script src="{{ asset('theme/vendors/bootstrap-notify/bootstrap-notify.min.js') }}"></script> --}}

    <script>jQuery(function () {
            Codebase.helpers('select2');
        });</script>

    {{-- <script>

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
    </script> --}}
    {{-- @include ('includes.success') --}}

@stop
