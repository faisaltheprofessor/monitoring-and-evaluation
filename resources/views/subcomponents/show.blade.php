@extends('app')


@section('main-content')
    <div class="listview">

            <a href="/component/{{$component->id}}">
                <div class="listview__item">
                    <i class="avatar-char bg-light-blue">{{ $component->name[0] }}</i>
                    <div class="listview__content">
                        <div class="listview__heading">{{ $component->name }}</div>
                        <p>{{ $component->name_dari }} - {{ $component->project->abbreviation }}</p>
                    </div>
                </div>
            </a>

    </div>
@stop



