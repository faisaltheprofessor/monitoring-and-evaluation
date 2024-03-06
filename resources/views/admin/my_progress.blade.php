@extends('app')


@section('content')
<div class="block">
    <div class="block-header block-header-default bg-primary-light">
        <h3 class="block-title" style="float:left">My Progress</h3>
        <a href="/entry_summary" class="btn btn-primary mr-10 mb-15">Seel All Progress</a>
        {{ $monthlyProgresses->links() }}
    </div>
    <div class="block-content">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Activity</th>
                <th>Province</th>
                <th>District</th>
                <th>Quantity</th>
                <th>Date</th>

                {{-- <th>Actions</th> --}}
            </tr>

            <?php 
            $x = 1;
            if(method_exists($monthlyProgresses, 'links') && isset($_GET['page'])) $x = $x *100 * ($_GET['page']-1)+ 1;
            ?>
            @foreach($monthlyProgresses as $monthlyProgress)
            <tr>
                <td>{{ $x }}</td>
                <td>{{ $monthlyProgress->activity->name }} <small>({{ $monthlyProgress->id }})</small></td>
                <td>{{ $monthlyProgress->province->name }}</td>
                <td>
                    @if($monthlyProgress->district)
                    {{ $monthlyProgress->district->name }}
                    @endif
                </td>
                <td>{{ $monthlyProgress->quantity }}</td>
                <td>{{ $monthlyProgress->start_date->format('F Y') }}</td>


                {{-- <td><a href="/monthlyProgresss/{{$monthlyProgress->id}}/edit?redirect={{ url()->current() }}">Edit</a></td> --}}
                {{-- <td><a href="#">Edit</a></td> --}}
            </tr>
            <?php $x++ ?>
            @endforeach
        </table>
    </div>
    {{ $monthlyProgresses->links() }}
</div>

@stop