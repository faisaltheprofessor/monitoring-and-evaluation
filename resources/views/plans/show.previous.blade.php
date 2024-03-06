@extends('app')
@section('styles')
    <style>
        .updated {
            color: green;
        }

        .modal-lg {
            max-width: 4000px !important;
            width: 1250px;
        }

        .modal table {
            color: black;
        }
    </style>
@stop
@section('page-title')
    {{ $plan->activity->name }}
@stop
@section('main-content')
    <div class="card-title"> Plan</div>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            {{--<th>ID</th>--}}
            <th>Activity</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Cost</th>
            <th>Quarter</th>
            <th>Indicator</th>
            <th>Component</th>
            <th>Subcomponent</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            {{--                <td>{{ $plan->id }}</td>--}}
            <td>{{ $plan->activity->name }}</td>
            <td>{{ $plan->quantity}}</td>
            <td>{{ $plan->unit->name}}</td>
            <td>{{ $plan->cost }}</td>
            <td>
                @if($plan->quarter == 0) Annual
                @else {{ \App\Helpers\AppHelpers::instance()->addOrdinalNumberSuffix($plan->quarter) }}
                @endif
            </td>
            <td>@if($plan->indicator){{ $plan->indicator->name}}@endif</td>
            <td>{{ $plan->component->name}}</td>
            <td>{{ $plan->subcomponent->name}}</td>
        </tr>
        </tbody>

    </table>
    @if(!$plan->output)
        <div class="text-center">
            {{-- <a class="btn btn-primary" href="/output/create-for-plan?plan_id={{$plan->id}}">Add Output</a> --}}
        </div>
        @endif

        </div>
        </div>
        </div>

        <div class="card">

            <div class="card-body">
                <div class="card-title">
                    <p class="float-left">Output Progress Details</p>
                    <div class="float-right">
                        <button class="btn btn-primary">Add Progress</button>
                    </div>
                </div>
                <div class="card-text">

                </div>


                {{--Modal--}}
                <div class="modal fade" id="timeline" style="overflow:hidden;">
                    <div class="modal-dialog modal-lg modal-xlg" style="width:1250px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title pull-left">Output History</h5>
                            </div>
                            <hr>
                            <div class="modal-body modal-lg">

                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Activity</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>
                                        <th>Cost</th>
                                        <th>Progress</th>
                                        <th>Remarks</th>
                                        {{--                                <th>Component</th>--}}
                                        {{--                                <th>Subcomponent</th>--}}
                                        <th>Date</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($plan->output && $plan->output->history)
                                        @php $histories= $plan->output->history; @endphp
                                        @php
                                            $i = 0;
                                            $j = 0;
                                            $updates = [];
                                            $values = [];
                                        @endphp
                                        @foreach($histories as $history)
                                            <tr>

                                                @php $changes = $history->pivot->after; $originals = $history->pivot->before ;@endphp
                                                <?php $changes = json_decode($changes, true); $originals = json_decode($originals) ?>
                                                @foreach($changes as $key=>$value)
                                                    @php $updates[$key] = $value @endphp
                                                @endforeach
                                                <td>{{ $i+1 }}</td>
                                                <td>{{ $plan->activity->name }}</td>
                                                <td>@if(array_key_exists('quantity', $updates)) <span
                                                        class="updated">{{ $value }} </span> @else {{ $plan->output->quantity }} @endif
                                                </td>
                                                <td>@if(array_key_exists('unit', $updates)) <span
                                                        class="updated">{{ $updates['unit'] }} </span>  @else {{ $plan->output->unit->name }} @endif
                                                </td>
                                                <td>@if(array_key_exists('cost', $updates)) <span
                                                        class="updated">{{ $updates['cost'] }} </span>  @else {{ $plan->output->cost }} @endif
                                                </td>
                                                <td>@if(array_key_exists('progress', $updates)) <span
                                                        class="updated">{{ $updates['progress'] }} </span>  @else {{ $plan->output->progress }} @endif
                                                </td>
                                                <td>@if(array_key_exists('remarks', $updates)) <span
                                                        class="updated">{{ $updates['remarks'] }} </span>  @else {{ $plan->output->remarks }} @endif
                                                </td>
                                                {{--                                        <td>@if(array_key_exists('indicator', $updates)) <span class="updated">{{ $updates['indicator'] }} </span>  @else {{ $plan->output->indicator->name }} @endif</td>--}}
                                                {{--                                            <td>@if(array_key_exists('subcomponent', $updates)) <span class="updated">{{ $updats['subcomponent'] }} </span>  @else {{ $plan->output->subcomponent->name }}u @endif</td>--}}
                                                <td>
                                                    {{ $history->pivot->updated_at->diffForHumans()}}
                                                    {{--                                                by {{ $history->first_name . ' '. $history->last_name }}--}}
                                                    <br>
                                                    <span
                                                        class="text-muted">{{ $history->pivot->updated_at->toDateString()}}</span>
                                                </td>

                                                @php $i++ @endphp
                                            </tr>
                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>


                            </div>


                        </div>
                        <div class="modal-footer">
                            {{--<button type="button" class="btn btn-link ajax-item-save" >Save changes</button>--}}
                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>

                {{-- End of History Modal --}}


            </div>

            {{--    @if($plan->output)--}}
            {{--    <div class="modal fade" id="update" style="overflow:hidden;">--}}
            {{--        <div class="modal-dialog modal-md modal-xlg" style="width:1250px;">--}}
            {{--            <div class="modal-content">--}}
            {{--                <div class="modal-header">--}}
            {{--                    <h5 class="modal-title pull-left">Update Output Progress</h5>--}}
            {{--                </div>--}}
            {{--                <hr>--}}
            {{--                <div class="modal-body">--}}
            {{--                    {{ Form::open(['method'=>'put', 'url'=>'/output/'.$plan->output->id]) }}--}}
            {{--                        {{ Form::hidden('id', $plan->output->id) }}--}}
            {{--                    <div class="input-group mb-3">--}}
            {{--                        <label for="progress">Progress</label>--}}
            {{--                        <div class="input-group">--}}
            {{--                            <input type="text" class="form-control" placeholder="Output Progress" id="progres" name="progress" value="{{ $plan->output->progress }}">--}}
            {{--                            <div class="input-group-prepend">--}}
            {{--                                <span class="input-group-text">%</span>--}}
            {{--                            </div>--}}
            {{--                            <i class="form-group__bar"></i>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}

            {{--                    <div class="form-group">--}}
            {{--                        <label for="remarks">Quantity</label>--}}
            {{--                        <input class="form-control scroll-textarea" name="quantity" id="quantity" value="{{ $plan->output->quantity }}">--}}
            {{--                        <i class="form-group__bar"></i>--}}

            {{--                    </div>--}}
            {{--                    <div class="form-group">--}}
            {{--                        <label for="remarks">Cost</label>--}}
            {{--                        <input class="form-control scroll-textarea" name="cost" id="cost" value="{{ $plan->output->cost }}">--}}
            {{--                        <i class="form-group__bar"></i>--}}

            {{--                    </div>--}}


            {{--                        <div class="form-group">--}}
            {{--                            <label for="remarks">Remarks</label>--}}
            {{--                            <textarea class="form-control scroll-textarea" name="remarks" id="remarks">--}}
            {{--                              {{ $plan->output->remarks }}--}}
            {{--                            </textarea>--}}
            {{--                            <i class="form-group__bar"></i>--}}

            {{--                        </div>--}}


            {{--                    </div>--}}





            {{--            <div class="modal-footer">--}}
            {{--                --}}{{--<button type="button" class="btn btn-link ajax-item-save" >Save changes</button>--}}
            {{--                <input type="submit" value="update" class="btn btn-success">--}}
            {{--                {{ Form::close() }}--}}
            {{--                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--    </div>--}}
            {{--    @endif--}}


        </div>

@stop

@section('scripts')
    {{--        <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>--}}
    <script src="{{ asset('theme/plugins/x-edit/js/bootstrap-editable.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('theme/plugins/x-edit/css/bootstrap-editable.css') }}">
    <script>
        // $.fn.editable.defaults.ajaxOptions = {type: "GET"};
        $('.view-history').click(() => $('#timeline').modal());
        $('.update-history').click(() => $('#update').modal());
        $(document).ready(function () {
            // $('.editable').editable();
        });


        $('#timeline').modal();
        //Moda
    </script>

@stop
