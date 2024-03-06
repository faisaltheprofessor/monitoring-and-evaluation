@extends('app')


@section('content')
    <div class="block">
        <div class="block-header block-header-default bg-primary-light">
            <h3 class="block-title">Entry Progress</h3>
        </div>
        <div class="block-content">
          <table class="table datatable" id="data-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Total Records</th>
                        <th>Today</th>
                        <th>Yesterday</th>
                        <th>Last 7 Days</th>
                        <th>Last 30 Days</th>
                        <th>Latest</th>
                    </tr>
                </thead>
             <tbody>
                 @php $users = App\User::all() @endphp
                 @foreach ($users as $user)
                     @if ( $monthlyProgress->where('user_id', $user->id)->count() > 0 )
                     <tr>
                         <td>{{ $user->first_name }}

                         </td>
                         <td>{{ $monthlyProgress->where('user_id', '=', $user->id)->count() }}</td>
                         <td><a href="/entry-summary/{{ $user->id }}/{{{ \Carbon\Carbon::today()->toDateString() }}}">{{ $monthlyProgressToday->where('user_id', '=', $user->id)->count() }}</a></td>
                         {{--Yesterday--}}
                         <td><a href="/entry-summary/{{ $user->id }}/{{{ \Carbon\Carbon::today()->subDay()->toDateString() }}}">{{
                         $monthlyProgressYesterday->where('user_id',
                         '=',
                         $user->id)->count() }}</a></td>
                         <td>{{ $monthlyProgressThisWeek->where('user_id', '=', $user->id)->count() }}</td>
                         <td>{{ $monthlyProgressThisMonth->where('user_id', '=', $user->id)->count() }}</td>
                         <td>
                             @php( $date = \App\MonthlyProgress::latest('created_at')->where('user_id', $user->id)->first()->created_at )
                                {{ $date->diffForHumans() }}
                         </td>
                     </tr>
                     @endif
                 @endforeach
             </tbody>

              <tfoot>
              <tr>
                     <td><strong>Total</strong></td>
                     <td><strong>{{ $monthlyProgress->count() }}</strong></td>
                     <td><strong>{{ $monthlyProgressToday->count() }}</strong></td>
              </tr>
              </tfoot>
          </table>
      </div>
  </div>
@endsection


@section('scripts')

    <!-- Datatables -->
    <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/pages/be_tables_datatables.min.js"></script>

    <script>
        $('table').dataTable({
            "order": [[ 1, "desc" ]]
        });
    </script>
@stop
