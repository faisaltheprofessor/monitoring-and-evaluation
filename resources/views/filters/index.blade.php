@extends('app')

@section('content')
    <div class="row" id="app">
        <div class="col-md-5 col-xl-3">
            <!-- Collapsible Inbox Navigation -->
            <div class="js-inbox-nav d-none d-md-block">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Filters</h3>
                        <div class="block-options">
                            <div class="dropdown">
                                <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-fw fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-flask mr-5"></i>Filter
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-cogs mr-5"></i>Manage
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <ul class="nav nav-pills flex-column push">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center justify-content-between" :class ="{active : settings.showing_projects}" @click="{settings.showing_components=false;settings.showing_subcomponents=false;settings.showing_projects=true;settings.showing_activities=false;settings.showing_plans=falsee;settings.showing_provinces=false}" href="javascript:void(0)">
                                    <span><i class="fa fa-fw fa-inbox mr-5"></i> Projects</span>
                                    <span class="badge badge-pill badge-secondary">@{{ projects.length }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center justify-content-between" :class ="{active : settings.showing_components}" @click="{settings.showing_components=true;settings.showing_subcomponents=false;settings.showing_projects=false;settings.showing_activities=false;settings.showing_plans=falsee;settings.showing_provinces=false}"  href="javascript:void(0)">
                                    <span><i class="fa fa-fw fa-star mr-5"></i> Components</span>
                                    <span class="badge badge-pill badge-secondary">@{{ components.length }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center justify-content-between" :class ="{active : settings.showing_subcomponents}"  @click="{settings.showing_components=false;settings.showing_subcomponents=true;settings.showing_projects=false;settings.showing_activities=false;settings.showing_plans=falsee;settings.showing_provinces=false}" href="javascript:void(0)">
                                    <span><i class="fa fa-fw fa-send mr-5"></i> Subcomponents</span>
                                    <span class="badge badge-pill badge-secondary">@{{ subcomponents.length }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center justify-content-between" :class ="{active : settings.showing_activities}"  @click="{settings.showing_components=false;settings.showing_subcomponents=false;settings.showing_projects=false;settings.showing_activities=true;settings.showing_plans=false;settings.showing_provinces=false}"  href="javascript:void(0)">
                                    <span><i class="fa fa-fw fa-pencil mr-5"></i> Activities</span>
                                    <span class="badge badge-pill badge-secondary">@{{ activities.length }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center justify-content-between" :class="{active:settings.showing_plans}" href="javascript:void(0)" @click="{settings.showing_components=false;settings.showing_subcomponents=false;settings.showing_projects=false;settings.showing_activities=false;settings.showing_plans=true;settings.showing_provinces=false}">
                                    <span><i class="fa fa-fw fa-folder mr-5"></i> Plans</span>
                                    <span class="badge badge-pill badge-secondary">@{{ plans.length }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center justify-content-between" href="javascript:void(0)" @click="{settings.showing_components=false;settings.showing_subcomponents=false;settings.showing_projects=false;settings.showing_activities=false;settings.showing_plans=false;settings.showing_provinces=true}">
                                    <span><i class="fa fa-fw fa-trash mr-5"></i> Provinces</span>
                                    <span class="badge badge-pill badge-secondary">@{{ provinces.length }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <hr class="my-5">
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-plus mr-5"></i> Create label
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END Collapsible Inbox Navigation -->

      {{-- PLACEHOLDER --}}

      {{-- END OF PLACEHOLDER --}}
        </div>
        <div class="col-md-7 col-xl-9">
            <!-- Message List -->
            <div class="block">
                <div class="block-header block-header-default">
                    {{-- <div class="block-title">
                        <strong>1-10</strong> from <strong>23</strong>
                    </div> --}}
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option">
                            <i class="si si-arrow-left"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option">
                            <i class="si si-arrow-right"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <!-- Messages Options -->
                    <div class="push">
                       
                    </div>
                    <!-- END Messages Options -->

                    <!-- Messages -->
                    <!-- Checkable Table (.js-table-checkable class is initialized in Helpers.tableToolsCheckable()) -->
                    <table class="js-table-checkable table table-hover table-vcenter">
                        <tbody>
                            
                            <tr v-for="project in projects" @click="getProjectComponents(project.id)" v-if="settings.showing_projects">
                                <td class="text-center">
                                    @{{ project.id }}
                                </td>
                                <td class="d-none d-sm-table-cell font-w600">@{{ project.abbreviation }}</td>
                                <td>
                                    <a class="font-w600" data-toggle="modal" data-target="#modal-message" href="#">@{{ project.name }}</a>
                                    <div class="text-muted mt-5"></div>
                                </td>
                               
                            </tr>


                            <tr v-for="component in components" @click="getComponentSubcomponents(component.id)" v-if="settings.showing_components">
                                <td class="text-center">
                                    <label class="css-control css-control-primary css-checkbox">
                                        <input type="checkbox" class="css-control-input">
                                        <span class="css-control-indicator"></span>
                                    </label>
                                </td>
                                <td class="d-none d-sm-table-cell font-w600">@{{ component.name }}</td>
                                <td>
                                    <a class="font-w600" data-toggle="modal" data-target="#modal-message" href="#">@{{ component.name }}</a>
                                    <div class="text-muted mt-5"></div>
                                </td>
                               
                            </tr>

                            <tr v-for="subcomponent in subcomponents" @click="getSubcomponentActivities(subcomponent.id)" v-if="settings.showing_subcomponents">
                                <td class="text-center">
                                    <label class="css-control css-control-primary css-checkbox">
                                        <input type="checkbox" class="css-control-input">
                                        <span class="css-control-indicator"></span>
                                    </label>
                                </td>
                                <td class="d-none d-sm-table-cell font-w600">@{{ subcomponent.name }}</td>
                                <td>
                                    <a class="font-w600" data-toggle="modal" data-target="#modal-message" href="#">@{{ subcomponent.name }}</a>
                                    <div class="text-muted mt-5"></div>
                                </td>
                               
                            </tr>

                            <tr v-for="activity in activities" @click="getActivityPlans(activity.id)" v-if="settings.showing_activities">
                                <td class="text-center">
                                    <label class="css-control css-control-primary css-checkbox">
                                        <input type="checkbox" class="css-control-input">
                                        <span class="css-control-indicator"></span>
                                    </label>
                                </td>
                                <td class="d-none d-sm-table-cell font-w600">@{{ activity.name }}</td>
                                <td>
                                    <a class="font-w600" data-toggle="modal" data-target="#modal-message" href="#">@{{ activity.name }}</a>
                                    <div class="text-muted mt-5"></div>
                                </td>
                               
                            </tr>


                            <tr v-for="plan in plans" @click="getPlansProvinces(plan.id)" v-if="settings.showing_plans">
                                <td class="text-center">
                                    <label class="css-control css-control-primary css-checkbox">
                                        <input type="checkbox" class="css-control-input">
                                        <span class="css-control-indicator"></span>
                                    </label>
                                </td>
                                <td class="d-none d-sm-table-cell font-w600">@{{ plan.year }}</td>
                                <td>
                                    <a class="font-w600" data-toggle="modal" data-target="#modal-message" href="#">@{{ plan.activity.name }}</a>
                                    <div class="text-muted mt-5"></div>
                                </td>
                               
                            </tr>
{{-- @click="getPlansProvinces(plan.id)" --}}
                            <tr v-for="province in provinces"  v-if="settings.showing_provinces">
                                <td class="text-center">
                                    <label class="css-control css-control-primary css-checkbox">
                                        <input type="checkbox" class="css-control-input">
                                        <span class="css-control-indicator"></span>
                                    </label>
                                </td>
                                <td class="d-none d-sm-table-cell font-w600">@{{ province.province.name }}</td>
                                <td>
                                    <a class="font-w600" data-toggle="modal" data-target="#modal-message" href="#">@{{ province.province.name }}</a>
                                    <div class="text-muted mt-5"></div>
                                </td>
                               
                            </tr>
                            

                        </tbody>
                    </table>
                    <!-- END Messages -->
                </div>
            </div>
            <!-- END Message List -->
        </div>
    </div>
</div>
<!-- END Page Content -->

@stop


@section('scripts')
<script src="/js/vue.js"></script>
<script src="/js/axios.min.js"></script>
 
<script>
   let component = {
        data(){
            return {
                projects: [],
                components: [],
                subcomponents: [],
                activities: [],
                plans: [],
                outputs: [],
                provinces:[],
                settings: {
                    showing_projects : true,
                    showing_components: false,
                    showing_subcomponents: false,
                    showing_activities: false,
                    showing_plans: false,
                    showing_provinces: false,
                    showing_districts: false,
                    
                    

                }
            }
        },
        methods: {
            getProjectComponents(id){
                this.settings.showing_projects = false
                axios.get('/getComponents',{params: {project_id: id}})
                    .then(data => {
                        this.components = data.data;
                        this.settings.showing_components = true
                    })
            },

            getComponentSubcomponents(id){
                axios.get('/getSubcomponents', {params: {component_id: id}})
                    .then (data => {
                        this.subcomponents = data.data
                        this.settings.showing_subcomponents = true
                        this.settings.showing_components = false
                    })
            },
            getSubcomponentActivities(id){
                axios.get('/getActivities', {params: {subcomponent_id: id}})
                    .then (data => {
                        this.activities = data.data
                        this.settings.showing_activities = true
                        this.settings.showing_subcomponents = false
                    })
            },

            getActivityPlans(id){
                axios.get('/getPlans', {params: {activity_id: id}})
                    .then (data => {
                        this.plans = data.data
                        this.settings.showing_activities = false
                        this.settings.showing_plans = true
                    })
            },
            getPlansProvinces(id){
                axios.get('/getProvinces', {params: {plan_id: id}})
                    .then (data => {
                        console.log(data.data)
                        this.provinces = data.data
                        this.settings.showing_activities = false
                        this.settings.showing_plans = false
                        this.settings.showing_provinces = true
                    })
            },


            
        },
        mounted() {
            axios.get('/getFilterEssentials')
            .then((data) => {
                // console.log(data.data)
                this.projects = data.data.projects
                this.components = data.data.components
                this.subcomponents = data.data.subcomponents
                this.activities = data.data.activities
                this.plans = data.data.plans
                this.outputs = data.data.outputs
            })
        }
    }
    let app = Vue.createApp(component).mount('#app')
</script>

@stop