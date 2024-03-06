@extends('app')

@section('page-title') Project: {{ $project->name }} @stop


@section('content')

 <!-- Block Tabs Animated Slide Up -->
 <div class="block">
    <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#project-stats">Stats</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project-components">Components <span class="badge badge-primary badge-pill">{{ $project->components->count() }}</span></a> 
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#project-subcomponents">Subcomponents <span class="badge badge-primary badge-pill">{{ $project->subcomponents->count() }}</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#project-activities">Activities <span class="badge badge-primary badge-pill">{{ $project->activities->count() }}</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#project-plans">Plans <span class="badge badge-primary badge-pill">{{ $project->plans->count() }}</span></a>
        </li>

       




        <li class="nav-item ml-auto">
            <a class="nav-link" href="#btabs-animated-slideup-settings"><i class="si si-settings"></i></a>
        </li>
    </ul>
    <div class="block-content tab-content overflow-hidden">
        <div class="tab-pane fade fade-up show active" id="project-stats" role="tabpanel">
            <h4 class="font-w400">{{ $project->name }}</h4>
            <p>Content slides up..</p>
        </div>


        <div class="tab-pane fade fade-up" id="project-components" role="tabpanel">
             <!-- Multiple Items -->
             <div class="block">
                <div class="block-content">
                    
                   @foreach($project->components as $component)
                   @php $str = Str::random(10); @endphp
                   <div id="{{ Str::camel($component->name) }}_{{ $str }}" role="tablist" aria-multiselectable="true">
                    <div class="block block-bordered block-rounded mb-2">
                        <div class="block-header" role="tab" id="{{ Str::camel($component->name) }}_{{ $str }}">
                            <a class="font-w600" data-toggle="collapse" data-parent="#{{ Str::camel($component->name) }}_{{$str}}" href="#{{ Str::camel($component->name) }}_{{ $str }}_q1" aria-expanded="true" aria-controls="accordion2_q1">
                               {{ $component-> name}}
                            </a>
                        </div>
                        <div id="{{ Str::camel($component->name) }}_{{$str}}_q1" class="collapse" role="tabpanel" aria-labelledby="{{ Str::camel($component->name) }}_{{$project->id}}_h1">
                            <div class="block-content">
                              
                                @if($component->subcomponents->count() > 0)
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Subcomponents</h3>
            
                        </div>
                        
                        <div class="block-content">
                            <ul class="list list-activity">
                               
                            
                                    @foreach($component->subcomponents as $subcomponent)
                                <li>
                                    <i class="si si-wallet text-success"></i>
                                    <div class="font-w600">{{$subcomponent->name}}</div>
                                    {{-- <div>
                                        <a href="javascript:void(0)">Admin Template</a>
                                    </div>
                                    <div class="font-size-xs text-muted">5 min ago</div> --}}
                                </li>
                                @endforeach
                               
                               
                            </ul>
                        </div>
                    </div>
                    @else
                       <div class="alert alert-info">No Subcomponents</div>
                    @endif
                    <!-- END Timeline Activity -->

                   
                            </div>
                        </div>
                    </div>
                  
                </div>
                   @endforeach
                </div>
            </div>
            <!-- END Multiple Items -->
        </div>


        <div class="tab-pane fade fade-up" id="project-subcomponents" role="tabpanel">
            <!-- Multiple Items -->
            <div class="block">
               <div class="block-content">
                   
                  @foreach($project->subcomponents as $subcomponent)
                  <div id="{{ Str::camel($subcomponent->name) }}_{{$project->id}}" role="tablist" aria-multiselectable="true">
                   <div class="block block-bordered block-rounded mb-2">
                       <div class="block-header" role="tab" id="{{ Str::camel($subcomponent->name) }}_{{$project->id}}">
                           <a class="font-w600" data-toggle="collapse" data-parent="#{{ Str::camel($subcomponent->name) }}_{{$project->id}}" href="#{{ Str::camel($subcomponent->name) }}_{{$project->id}}_q1" aria-expanded="true" aria-controls="accordion2_q1">
                              {{ $subcomponent-> name}} <span class="badge badge-primary badge-pill">{{ $subcomponent->activities->count() }}</span>
                           </a>
                       </div>
                       <div id="{{ Str::camel($subcomponent->name) }}_{{$project->id}}_q1" class="collapse" role="tabpanel" aria-labelledby="{{ Str::camel($subcomponent->name) }}_{{$project->id}}_h1">
                           <div class="block-content">
                             
                               @if($subcomponent->activities->count() > 0)
                   <div class="block">
                       <div class="block-header block-header-default">
                           <h3 class="block-title">Activities</h3>
           
                       </div>
                       
                       <div class="block-content">
                           <ul class="list list-activity">
                              
                                @php $x = 1 @endphp
                                   @foreach($subcomponent->activities as $activity)
                               <li>
                                
                                   <div class="font-w600"> {{$x++}}.   {{$activity->name}}</div>
                                   {{-- <div>
                                       <a href="javascript:void(0)">Admin Template</a>
                                   </div>
                                   <div class="font-size-xs text-muted">5 min ago</div> --}}
                               </li>
                               @endforeach
                              
                              
                           </ul>
                       </div>
                   </div>
                   @else
                      <div class="alert alert-info">No Activities</div>
                   @endif
                   <!-- END Timeline Activity -->

                  
                           </div>
                       </div>
                   </div>
                 
               </div>
                  @endforeach
               </div>
           </div>
           <!-- END Multiple Items -->
       </div>
       

       <div class="tab-pane fade fade-up" id="project-activities" role="tabpanel">
        <!-- Multiple Items -->
        <div class="block">
           <div class="block-content">
               
              @foreach($project->activities as $activity)
              @php $str = Str::random(10); @endphp
              <div id="{{ $str }}_{{$project->id}}" role="tablist" aria-multiselectable="true">
               <div class="block block-bordered block-rounded mb-2">
                   <div class="block-header" role="tab" id="{{ $str }}_{{$project->id}}">
                       <a class="font-w600" data-toggle="collapse" data-parent="#{{ $str }}_{{$project->id}}" href="#{{ $str }}_{{$project->id}}_q1" aria-expanded="true" aria-controls="accordion2_q1">
                          {{ $activity->name}} <span class="badge badge-primary badge-pill">{{ $activity->plans->count() }}</span>
                       </a>
                   </div>
                   <div id="{{ $str }}_{{$project->id}}_q1" class="collapse" role="tabpanel" aria-labelledby="{{ $str }}_{{$project->id}}_h1">
                       <div class="block-content">
                         
                           @if($activity->plans->count() > 0)
            <div class="row">
                <div class="col-md-6">
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Planned</h3>
            
                        </div>
                        
                        <div class="block-content">
                            <ul class="list list-activity">
                               
                                 @php $x = 1 @endphp
                                    @foreach($activity->plans->sortBy('year') as $plan)
                                <li>
                                 
                                    <div class="font-w600"> {{$x++}}.   {{$plan->year}} <span class="badge badge-primary badge-pill">{{ $plan->quantity }}</span> <small>{{ $plan->id }} </small></div>
                                    {{-- <div>
                                        <a href="javascript:void(0)">Admin Template</a>
                                    </div>
                                    <div class="font-size-xs text-muted">5 min ago</div> --}}
                                </li>
                                @endforeach
                               
                               
                            </ul>
                        </div>
                    </div>
    
                    
                  </div>
    
                  <div class=" col-md-6">
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Acheived</h3>
            
                        </div>
                        
                        <div class="block-content">
                            <ul class="list list-activity">
                               
                          
                                    @foreach($activity->plans->sortBy('year') as $plan)
                                <li>
                                 
                                    <div class="font-w600">{{$plan->year}} <span class="badge badge-primary badge-pill">
                                        {{ App\MonthlyProgress::whereYear('start_date', $plan->year)->where('plan_id',$plan->id )->sum('quantity') }}
                                    </span></div>
                                    {{-- <div>
                                        <a href="javascript:void(0)">Admin Template</a>
                                    </div>
                                    <div class="font-size-xs text-muted">5 min ago</div> --}}
                                </li>
                                @endforeach
                               
                               
                            </ul>
                        </div>
                    </div>
    
                    
                  </div>
            </div>
               @else
                  <div class="alert alert-info">No Activities</div>
               @endif
               <!-- END Timeline Activity -->

              
                       </div>
                   </div>
               </div>
             
           </div>
              @endforeach
           </div>
       </div>
       <!-- END Multiple Items -->
   </div>

        <div class="tab-pane fade fade-up" id="project-plans" role="tabpanel">
            <h4 class="font-w400">{{ $project->name }}t</h4>
            <p>Content slides up..</p>
        </div>

        <div class="tab-pane fade fade-up" id="project-provinces" role="tabpanel">
            <h4 class="font-w400">{{ $project->name }}t</h4>
            <p>Content slides up..</p>
        </div>


        <div class="tab-pane fade fade-up" id="project-progress" role="tabpanel">
            <h4 class="font-w400">{{ $project->name }}t</h4>
            <p>Content slides up..</p>
        </div>



        <div class="tab-pane fade fade-up" id="btabs-animated-slideup-settings" role="tabpanel">
            <h4 class="font-w400">Settings Content</h4>
            <p>Content slides up..</p>
        </div>
    </div>
</div>
<!-- END Block Tabs Animated Slide Up -->

@stop
@section('extra-content')
    @include('includes.success')
    <h5>{{ $project->name_dari }}</h5>
    <hr>

    <div class="row">
        <div class="col-6">
            <div class="block">
                <div class="block-header block-header-default bg-primary-light">
                    <h3 class="block-title">Stats</h3>
                </div>
                <div class="block-content">
                   
               </div>
           </div>
       </div>
       <div class="col-6">
        <div class="block">
            <div class="block-header block-header-default bg-primary-light">
                <h3 class="block-title">Project Components</h3>
            </div>
            <div class="block-content">
                   @php ($x = 1)
                   <table class="table mb-0 table-sm table-responsive-sm">
                       <thead>
                       <tr>
                           <th>#</th>
                           <th>Name</th>
                           <th>Dari Name</th>
                           {{-- <th>Actions</th> --}}
                       </tr>
                       </thead>

                       <tbody>
                       @foreach($project->components as $component)
                           <tr>
                               <td><a href="/component/{{ $component->id }}">{{ $x++ }}</a></td>
                               <td><a href="/component/{{ $component->id }}">{{ $component->name }}</a></td>
                               <td><a href="/component/{{ $component->id }}">{{ $component->name_dari }}</a></td>
                              {{-- <td>
                                  <a href="#" class="btn btn-info" data-id="{{ $component->d }}" data-model="{{ get_class($component) }}"}}><i class="zmdi zmdi-edit"></i></a>
                                  <a href="#" class="btn btn-danger"><i class="zmdi zmdi-delete"></i></a>
                              </td> --}}

                           </tr>
                       @endforeach
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </div>


   
    <div class="row">
        <div class="col-6">
            <div class="block">
                <div class="block-header block-header-default bg-primary-light">
                    <h3 class="block-title">Add Component to the Project</h3>
                </div>
                <div class="block-content">
                    <form class="row" action="/component" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="redirect" value="/project/{{ $project->id }}">
                        <input type="hidden" name="project_id" value="{{ $project->id }}">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Component Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                               <label for="name_dari">اسم بخش</label>
                               <input type="text" class="form-control" dir="rtl" id="name_dari" name="name_dari">
                               <i class="form-group__bar"></i>
                           </div>



                           <div class="clearfix"></div>

                           <div class="form-group">
                               <input type="submit" class="btn btn-primary" value="Add Component">
                           </div>

                       </div>
                   </form>
               </div>
           </div>
       </div>
       <div class="col-6">
        <div class="block">
            <div class="block-header block-header-default bg-primary-light">
                <h3 class="block-title">Project Components</h3>
            </div>
            <div class="block-content">
                   @php ($x = 1)
                   <table class="table mb-0 table-sm table-responsive-sm">
                       <thead>
                       <tr>
                           <th>#</th>
                           <th>Name</th>
                           <th>Dari Name</th>
                           {{-- <th>Actions</th> --}}
                       </tr>
                       </thead>

                       <tbody>
                       @foreach($project->components as $component)
                           <tr>
                               <td><a href="/component/{{ $component->id }}">{{ $x++ }}</a></td>
                               <td><a href="/component/{{ $component->id }}">{{ $component->name }}</a></td>
                               <td><a href="/component/{{ $component->id }}">{{ $component->name_dari }}</a></td>
                              {{-- <td>
                                  <a href="#" class="btn btn-info" data-id="{{ $component->d }}" data-model="{{ get_class($component) }}"}}><i class="zmdi zmdi-edit"></i></a>
                                  <a href="#" class="btn btn-danger"><i class="zmdi zmdi-delete"></i></a>
                              </td> --}}

                           </tr>
                       @endforeach
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </div>

@stop

