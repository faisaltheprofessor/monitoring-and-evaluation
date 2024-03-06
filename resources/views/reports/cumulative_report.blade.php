@extends('app')
@section('breadcrumb', Breadcrumbs::render('report'))

@php
    $months =  [
     '1' => 'January',
     '2' => 'February',
     '3' => 'March',
     '4' => 'April',
     '5' => 'May',
     '6' => 'June',
     '7' => 'July',
     '8' => 'August',
     '9' => 'September',
     '10' => 'October',
     '11' => 'November',
     '12' => 'December',
    ];

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
    $selected_month = 1;
    $selected_year = 2019;
    if(isset($_GET['year'])) $selected_year = (int) $_GET['year'];
    if(isset($_GET['month'])) $selected_month = (int) $_GET['month'];
@endphp
@section('styles')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="/assets/js/plugins/select2/css/select2.css">
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="/assets/js/plugins/datatables/dataTables.bootstrap4.css">
@stop
@section('page-title', 'Report')
@section('content')
    <div class="block">
        <div class="block-header block-header-default bg-primary-light">
            <h3 class="block-title">Filters</h3>
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>


        </div>
        <div class="block-content block-content-full">
            <form action="/cumulative-report-result" method="get">
                <div class="row">
                    {{--Project--}}
                    <div class="col col-lg-4 col-md-12 col-sm-12 form-group" id="projects">
                        {{ Form::label('project_id', 'Project') }}
                        {{ Form::select('project_id', $projects, null, ['class' => 'form-control select2', 'placeholder' => 'Choose Project...']) }}
                        {{-- <select id="project_id" name="project_id" class="select2-ajax form-control" placeholder="Select a project...."></select> --}}
                        <i class="form-group__bar"></i>
                    </div>

                    {{--Component--}}
                    <div class="col col-lg-4 col-md-12 col-sm-12 form-group" id="components">
                        {{ Form::label('component_id', 'Component') }}
                        {{ Form::select('component_id', $components, null, ['class' => 'form-control select2', 'placeholder' => 'Choose Component...']) }}

                        {{-- <select id="component_id" name="component_id" class="select2-ajax form-control" placeholder="Select a component...."></select> --}}
                        <i class="form-group__bar"></i>
                    </div>


                    {{--Sub Components--}}
                    <div class="col col-lg-4 col-md-12 col-sm-12 fom-group" id="subcomponents">

                        {{ Form::label('subcomponent_id', 'Sub Component') }}
                        {{ Form::select('subcomponent_id', $subcomponents, null, ['class' => 'form-control select2', 'placeholder' => 'Choose Subcomponent...']) }}

                        {{-- <select id="subcomponent_id" name="subcomponent_id" class="select2-ajax form-control" placeholder="Select a Subcomponent...."></select> --}}
                        <i class="form-group__bar"></i>
                    </div>
                </div>





                <div class="row">
                    {{--Activity--}}
                    <div class="col col-lg-4 col-md-12 col-sm-12 form-group" id="activity">
                        {{ Form::label('activity_id', 'Activity') }}
                        {{ Form::select('activity_id', $activities, null, ['class' => 'form-control select2', 'placeholder' => 'Choose Activity...']) }}
                        <i class="form-group__bar"></i>
                    </div>


                    <div class="col col-lg-4 col-md-12 col-sm-12">
                        <label>Month</label>
                        {!!  Form::select('month', $months, null, ['class' => 'form-control select2', 'placeholder' => 'Select Month'] ) !!}
                    </div>

                    <div class="col col-lg-4 col-md-12 col-sm-12">
                        <label>Year</label>
                        {!!  Form::select('year', $years,null, ['class' => 'form-control select2', 'placeholder' => 'Select Month'] ) !!}
                    </div>

                    {{--
                                <div class="col col-lg-4 col-md-12 col-sm-12 form-group">
                                    {{ Form::label('implementing_partner_id', 'Implementing Partner') }}
                                    {{ Form::select('implementing_partner_id', $implementingPartners, null, ['class' => 'form-control select2', 'placeholder' => 'Choose Implementing Partner...']) }}
                                    <i class="form-group__bar"></i>
                                </div> --}}


                    {{-- <div class="col col-lg-4 col-md-12 col-sm-12 form-group">
                        {{ Form::label('direct_beneficiary_id', 'Direct Beneficiary') }}
                        {{ Form::select('direct_beneficiary_id', $beneficiaries, null, ['class' => 'form-control select2', 'placeholder' => 'Choose Indirect Beneficiary...']) }}
                        <i class="form-group__bar"></i>
                    </div> --}}

                    {{-- <div class="col col-lg-4 col-md-12 col-sm-12 form-group" id="activity">
                        {{ Form::label('indirect_beneficiary_id', 'indirect Beneficiary') }}
                        {{ Form::select('indirect_beneficiary_id', $beneficiaries, null, ['class' => 'form-control select2', 'placeholder' => 'Choose Implementing Partner...']) }}
                        <i class="form-group__bar"></i>
                    </div> --}}



                    {{--Progress--}}
                    {{-- <div class="col col-lg-4 col-md-12 col-sm-12 form-group">
                        {{ Form::label('quantity', 'Quantity') }}
                        {{ Form::text('quantity', null, ['class' => 'form-control']) }}
                        <i class="form-group__bar"></i>

                        {{--<input type="number"  name="progress" id="progress" class="form-control">--}}
                    {{-- </div> --}}


                    {{--Cost--}}
                    {{-- <div class="col col-lg-4 col-md-12 col-sm-12 form-group">
                        {{ Form::label('cost', 'Cost') }}
                        {{ Form::number('cost', null, ['class' => 'form-control']) }}
                        <i class="form-group__bar"></i>
                    </div> --}}







                </div>

                {{--Province District Village--}}
                <div class="row">
                    {{--Project--}}
                    <div class="col col-lg-4 col-md-12 col-sm-12 form-group" id="provinces">
                        {{ Form::label('province_id', 'Province') }}
                        {{ Form::select('province_id', $provinces, null, ['class' => 'form-control select2', 'placeholder' => 'Choose Province...']) }}
                        <i class="form-group__bar"></i>
                    </div>

                    {{--Component--}}
                    <div class="col col-lg-4 col-md-12 col-sm-12 form-group" id="districts">
                        {{ Form::label('district_id', 'District') }}
                        {{ Form::select('district_id', $districts, null, ['class' => 'form-control select2', 'placeholder' => 'Choose District...']) }}
                        <i class="form-group__bar"></i>
                    </div>

                    {{--Sub Components--}}
                    <div class="col col-lg-4 col-md-12 col-sm-12 form-group" id="villages">

                        {{ Form::label('village_id', 'Village') }}
                        {{ Form::select('village_id', $villages, null, ['class' => 'form-control select2', 'placeholder' => 'Choose Village...']) }}
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="col-3">
                        <input type="submit" class="btn btn-primary form-control" value="Cumulative Report" name="fetch-all-records">
                    </div>

                </div>


            {{--Progress--}}
            {{-- <div class="col col-lg-4 col-md-12 col-sm-12 form-group">
                {{ Form::label('Progress', 'Progress (%)') }}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Equal To (=)</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" data-operator="=">Equal to (=) </a>
                            <a class="dropdown-item" href="#" data-operator="<">Less than (<)</a>
                            <a class="dropdown-item" href="#" data-operator=">">Greater than (>)</a>
                            <a class="dropdown-item" href="#" data-operator="<=">Less than or Equal to (<=)</a>
                            <a class="dropdown-item" href="#" data-operator=">=">Greater than or Equal to (>=)</a>
                            <a class="dropdown-item" href="#" data-operator="!=">Not Equal to (!=)</a>
                            <a class="dropdown-item" href="#" data-operator="Between">Between</a>
                        </div>
                    </div>
                    <input type="hidden" name="progress_operator" value="=">
                    <input type="text" class="form-control" aria-label="Text input with dropdown button" name="progress">
                    <i class="form-group__bar"></i>
                </div>

            </div> --}}



        </div>
        </form>
    </div>


@stop


@section('scripts')
    <script src="/assets/js/plugins/select2/js/select2.full.min.js"></script>
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

        $("form").submit(function() {
            $(this).find(":input").filter(function () {
                return !this.value;
            }).attr("disabled", true);

            return true;
        });


        $(".dropdown-menu a").click(function(){
            $("button.dropdown-toggle").text($(this).text());
            $('input[type="hidden"]').val($(this).data('operator'));
        });

        $('.select2').select2()
    </script>



@stop
