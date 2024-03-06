@extends('app')
@section('breadcrumb', Breadcrumbs::render('profile'))

@section('content')
    <!-- User Info -->
    <div class="bg-image bg-image-bottom" style="background-image: url('/assets/media/photos/photo13@2x.jpg');">
        <div class="bg-primary-dark-op py-30">
            <div class="content content-full text-center">
                <!-- Avatar -->
                <div class="mb-15">
                    <a class="img-link" href="be_pages_generic_profile.html">
                        <img class="img-avatar img-avatar96 img-avatar-thumb" src="/assets/media/avatars/avatar15.jpg" alt="">
                    </a>
                </div>
                <!-- END Avatar -->

                <!-- Personal -->
                <h1 class="h3 text-white font-w700 mb-10">{{ Auth::user()->first_name }} {{ AUth::user()->last_name }}</h1>
                <h2 class="h5 text-white-op">
                   {{ Auth::user()->position }} <a class="text-primary-light" href="javascript:void(0)">Database Developer</a>
                </h2>
                <!-- END Personal -->

               
            </div>
        </div>
    </div>
    <!-- END User Info -->

@stop