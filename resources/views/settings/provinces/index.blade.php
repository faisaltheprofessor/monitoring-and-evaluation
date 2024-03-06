@extends('app')


@section('page-title', 'Provinces')

@section('main-content')
    <div class="listview">
        @foreach($provinces as $province)
            <a href="/province/{{$province->id}}">
                <div class="listview__item">
                    <i class="avatar-char bg-light-blue">{{ $province->name[0] }}</i>
                    <div class="listview__content">
                        <div class="listview__heading">{{ $province->name }}</div>
                        <p>{{ $province->name_dari }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

@stop