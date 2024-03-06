@extends('app')


@section('main-content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Document</th>
                <th>Document Owner</th>
                <th>Document Type</th>
            </tr>
        </thead>


        <tbody>
            @foreach($documents as $document)
                <tr>
                    <td>
                        <a href="#">{{ $document->name }}</a>
                        
                    </td>
                    <td>{{ $document->owner }}</td>
                    <td>{{ $document->type }}</td>
                </tr>

             @endforeach
        </tbody>
    </table>
@stop