@extends('app')


@section('head')
    <!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('styles')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
<style>
    .btn-group:last-child {
        display: none;
    }
</style>
@stop


@section('content')
<div style="height: 600px;">
    <div id="fm"></div>
</div>

@stop


@section('scripts')
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

@stop