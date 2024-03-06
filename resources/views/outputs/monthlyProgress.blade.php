@extends('app')

@section('main-content')
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header bg-blue text-white">
               Monthly Progress for <strong>{{ $output->activity->name}}</strong>, {{ $output->plan->year }} - Quarter: {{ $output->plan->quarter}}
              @php $quarter = $output->plan->quarter@endphp
              <br>
             
            </div>
            <div class="card-body">
                <form class="row" action="monthlyProgress" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if ($quarter == 0) 
                        <div class="alert alert-info">This is an annual activity and does not need monthly progress update.</div>
                    @else
                    @php $quarter = $quarter *3 @endphp
                    <input type="hidden" name="output_id" value="{{ $output->id }}">
                    <div class="col-md-12">
                        <div class="form-group">
                    
                            <label for="month_id[]">{{ date("F", mktime(0, 0, 0, $quarter - 2, 10)) }}</label>
                            <input type="hidden" class="form-control" name="month_id[]" id="month_id[]" value="{{$quarter - 2}}">
                            <input type="text" class="form-control" name="progress_id[]" id="Progress_id[]">
                            {{-- <input name="remarks[]" id="remarks[]" class="form-control" placeholder="Remarks"></input> --}}
                            <i class="form-group__bar"></i> 
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="month_id[]">{{ date("F", mktime(0, 0, 0, $quarter - 1, 10)) }}</label>
                            <input type="hidden" class="form-control" name="month_id[]" id="month_id[]" value="{{$quarter - 1}}">
                            <input type="text" class="form-control" name="progress_id[]" id="progress_id[]">
                            <i class="form-group__bar"></i> 
                        </div>

                        <div class="form-group">
                            <label for="month_id[]">{{ date("F", mktime(0, 0, 0, $quarter, 10)) }}</label>
                            <input type="hidden" class="form-control" name="month_id[]" id="month_id[]" value="{{$quarter}}">                         <input type="text" class="form-control" name="progress_id[]" id="progress_id[]">
                            <i class="form-group__bar"></i> 
                        </div>
                        <div class="clearfix"></div>

                        <div class="mt-5 text-center">
                            <input type="submit" class="btn btn-primary" value="Update Monthly Progress">
                        </div>

                    </div>
                    @endif
                </form>
            </div>
        </div>
      </div>

      {{-- <div class="col-md-7"> --}}
        {{-- <table class="table table-striped mb-0" id="data-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Activity</th>
                <th>اسم فعالیت</th>
                <th style="width: 50%;">Project</th>
                <th>Component</th>
                <th>Subcomponent</th>
                <th>Unit</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @php($x = 1)
            
                <tr>
                    <th scope="row">{{ $x++ }}</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            </tbody>
        </table> --}}
    {{-- </div> --}}
      
    </div>

      @stop


      @section('scripts')
    
    
    
      @include('includes.success')

{{--    <script>--}}
{{--        function imageToBase64(img) {--}}
{{--             let file = img.files[0],--}}
{{--                 reader = new FileReader()--}}
{{--            reader.onLoadend = function(){--}}

{{--            }--}}
{{--            reader.readAsDataURL(file)--}}
{{--        }--}}
{{--    </script>--}}

    @stop