@extends('app')


@section('content')
    



<div class="row">
    <div class="col-12">
        <p>Some charts examples here</a></p>
    </div>
</div>
<!-- apex charts section start -->
<section id="apexchart">
    <div class="row">
        <!-- Line Chart -->
        <div class="col-lg-6 col-md-12">
            <div class="block">
                <div class="block-header block-header-default bg-primary-light">
                    <h4 class="block-title">Line Chart</h4>
                </div>
                <div class="block-content">
                    <div class="block-body">
                        <div id="line-chart"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Line Area Chart -->
        <div class="col-lg-6 col-md-12">
            <div class="block">
                <div class="block-header bg-primary-light">
                    <h4 class="block-title">Line Area Chart</h4>
                </div>
                <div class="block-content">
                    <div class="block-body">
                        <div id="line-area-chart"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column Chart -->
        <div class="col-lg-6 col-md-12">
            <div class="block">
                <div class="block-header bg-primary-light">
                    <h4 class="block-title">Column Chart</h4>
                </div>
                <div class="block-content">
                    <div class="block-body">
                        <div id="column-chart"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bar Chart -->
        <div class="col-lg-6 col-md-12">
            <div class="block">
                <div class="block-header bg-primary-light">
                    <h4 class="block-title">Bar Chart</h4>
                </div>
                <div class="block-content">
                    <div class="block-body">
                        <div id="bar-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mixed Chart -->
    <div class="row">
        <div class="col-12">
            <div class="block">
                <div class="block-header bg-primary-light">
                    <h4 class="block-title">Mixed Chart</h4>
                </div>
                <div class="block-content">
                    <div class="block-body">
                        <div id="mixed-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Candlestick Chart -->
    <div class="row">
        <div class="col-12">
            <div class="block">
                <div class="block-header bg-primary-light">
                    <h4 class="block-title">Candlestick Chart</h4>
                </div>
                <div class="block-content">
                    <div class="block-body">
                        <div id="candlestick-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- 3D Bubble Chart -->
        <div class="col-lg-6 col-md-12">
            <div class="block">
                <div class="block-header bg-primary-light">
                    <h4 class="block-title">3D Bubble Chart</h4>
                </div>
                <div class="block-content">
                    <div class="block-body">
                        <div id="bubble-chart"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scatter Chart -->
        <div class="col-lg-6 col-md-12">
            <div class="block">
                <div class="block-header bg-primary-light">
                    <h4 class="block-title">Scatter Chart</h4>
                </div>
                <div class="block-content">
                    <div class="block-body">
                        <div id="scatter-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Heat map Chart -->
    <div class="row">
        <div class="col-12">
            <div class="block">
                <div class="block-header bg-primary-light">
                    <h4 class="block-title">Heat Map Chart</h4>
                </div>
                <div class="block-content">
                    <div class="block-body">
                        <div id="heat-map-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Pie Chart -->
        <div class="col-lg-6 col-md-12">
            <div class="block">
                <div class="block-header bg-primary-light">
                    <h4 class="block-title">Pie Chart</h4>
                </div>
                <div class="block-content">
                    <div class="block-body">
                        <div id="pie-chart" class="mx-auto"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Donut Chart -->
        <div class="col-lg-6 col-md-12">
            <div class="block">
                <div class="block-header bg-primary-light">
                    <h4 class="block-title">Donut Chart</h4>
                </div>
                <div class="block-content">
                    <div class="block-body">
                        <div id="donut-chart" class="mx-auto"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Radial Bar Chart -->
        <div class="col-lg-6 col-md-12">
            <div class="block">
                <div class="block-header bg-primary-light">
                    <h4 class="block-title">Radial Bar Chart</h4>
                </div>
                <div class="block-content">
                    <div class="block-body">
                        <div id="radial-bar-chart"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Radar Chart -->
        <div class="col-lg-6 col-md-12">
            <div class="block">
                <div class="block-header bg-primary-light">
                    <h4 class="block-title">Radar Chart</h4>
                </div>
                <div class="block-content">
                    <div class="block-body">
                        <div id="radar-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // Apex charts section end -->


@stop


@section('styles')

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/core/colors/palette-gradient.css">
    <!-- END: Page CSS-->

   




@section('scripts')
 <!-- BEGIN: Vendor JS-->
    <script src="/assets/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/assets/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/assets/app-assets/js/core/app-menu.js"></script>
    <script src="/assets/app-assets/js/core/app.js"></script>
    <script src="/assets/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    {{-- <script src="/assets/app-assets/js/scripts/charts/chart-apex.js"></script> --}}
    <!-- END: Page JS-->/

    
@stop