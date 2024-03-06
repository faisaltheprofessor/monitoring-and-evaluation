@extends('app')

@section('main-content')
    <a href="/plans" style="float: right; margin-right:20px; margin-bottom: 20px;" class="btn btn-info">View All Plans</a>
    <a href="/plan/create" style="float: right; margin-right:10px; margin-bottom: 20px;" class="btn btn-success">Create Plan</a>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <!-- Green -->
            <div class="tab-container">
                <ul class="nav nav-tabs nav-tabs--green nav-fill" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#clap" role="tab">CLAP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#SNaPP2" role="tab">SNaPP2</a>
                    </li>
                </ul>

                <div class="tab-content" style="">
                    <div class="tab-pane active fade show" id="clap" role="tabpanel">
                        <div class="clap-treeview"></div>
                    </div>

                    <div class="tab-pane fade" id="SNaPP2" role="tabpanel">
                        <div class="snapp2-treeview"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('styles')
    <link rel="stylesheet" href="{{ asset('theme/vendors/jqTree/jqtree.css') }}">
    <style>
        .tab-content { padding-left:50px !important;
            padding-top: 40px !important;}
    </style>
@stop
@section('scripts')
    <script src="{{ asset('theme/vendors/jqTree/tree.jquery.js') }}"></script>
    <script>
        var dataClap = [
                @foreach($clapyears as $year)
            {
                name: '{{ $year }}',
                children: [
                    { name: 'Annual',
                        children: [
                                @foreach($plans->where('quarter',0)->where('year',$year)->where('project_id',1) as $plan)
                            {
                                name: '<a href="/plan/{{ $plan->id }}">{{ $plan->activity->name }}</a>'
                            },
                            @endforeach
                        ]},

                    { name: 'First Quarter',
                        children: [
                                @foreach($plans->where('quarter',1)->where('year',$year)->where('project_id',1) as $plan)
                            {
                                name: '<a href="/plan/{{ $plan->id }}">{{ $plan->activity->name }}</a>'
                            },
                            @endforeach
                        ]},

                    { name: 'Second Quarter',
                        children: [
                                @foreach($plans->where('quarter',2)->where('year',$year)->where('project_id',1) as $plan)
                            {
                                name: '<a href="/plan/{{ $plan->id }}">{{ $plan->activity->name }}</a>'
                            },
                            @endforeach
                        ]

                    },
                    { name: 'Third Quarter',
                        children: [
                                @foreach($plans->where('quarter',3)->where('year',$year)->where('project_id',1) as $plan)
                            {
                                name: '<a href="/plan/{{ $plan->id }}">{{ $plan->activity->name }}</a>'
                            },
                            @endforeach
                        ]

                    },
                    { name: 'Fourth Quarter',
                        children: [
                                @foreach($plans->where('quarter',4)->where('year',$year)->where('project_id',1) as $plan)
                            {
                                name: '<a href="/plan/{{ $plan->id }}">{{ $plan->activity->name }}</a>'
                            },
                            @endforeach
                        ]

                    },

                ]
            },


            @endforeach
        ];

        var dataSnapp = [
                @foreach($snapp2years as $year)
            {
                name: '{{ $year }}',
                children: [
                    { name: 'Annual',
                        children: [
                                @foreach($plans->where('quarter',0)->where('year',$year)->where('project_id',2) as $plan)
                            {
                                name: '<a href="/plan/{{ $plan->id }}">{{ $plan->activity->name }}</a>'
                            },
                            @endforeach
                        ]},
                    { name: 'First Quarter',
                        children: [
                                @foreach($plans->where('quarter',1)->where('year',$year)->where('project_id',2) as $plan)
                            {
                                name: '<a href="/plan/{{ $plan->id }}">{{ $plan->activity->name }}</a>'
                            },
                            @endforeach
                        ]},

                    { name: 'Second Quarter',
                        children: [
                                @foreach($plans->where('quarter',2)->where('year',$year)->where('project_id',2) as $plan)
                            {
                                name: '<a href="/plan/{{ $plan->id }}">{{ $plan->activity->name }}</a>'
                            },
                            @endforeach
                        ]

                    },
                    { name: 'Third Quarter',
                        children: [
                                @foreach($plans->where('quarter',3)->where('year',$year)->where('project_id',2) as $plan)
                            {
                                name: '<a href="/plan/{{ $plan->id }}">{{ $plan->activity->name }}</a>'
                            },
                            @endforeach
                        ]

                    },
                    { name: 'Fourth Quarter',
                        children: [
                                @foreach($plans->where('quarter',4)->where('year',$year)->where('project_id',2) as $plan)
                            {
                                name: '<a href="/plan/{{$plan->id}}">{{ $plan->activity->name }}</a>'
                            },
                            @endforeach
                        ]

                    },

                ]
            },


            @endforeach
        ];

        $('.clap-treeview').tree({
            data:dataClap,
            closedIcon: $('<i class="zmdi zmdi-plus-circle"></i>'),
            openedIcon: $('<i class="zmdi zmdi-minus-circle"></i>'),
            autoEscape:false
        });


        $('.snapp2-treeview').tree({
            data:dataSnapp,
            closedIcon: $('<i class="zmdi zmdi-plus-circle"></i>'),
            openedIcon: $('<i class="zmdi zmdi-minus-circle"></i>'),
            autoEscape: false
        });



        $('.clap-treeview, .snapp2-treeview').on(
            'tree.click',
            function(event) {
                // The clicked node is 'event.node'
                var node = event.node;
                $(this).tree('toggle', node);
            }
        );







    </script>
@stop
