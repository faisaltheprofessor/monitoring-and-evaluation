@extends('app')
@section('styles')
<link rel="stylesheet" href="">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">

@stop

@section('content')
<div class="col-sm-12 col-md-12 table-container table-responsive">
    <table cellspacing="0" width="100%" id="table-log"
           class="table table-striped table-bordered table-sm table-hover table-condensed dt-responsive nowrap">
            <thead>
            <tr>
                <th>#</th>
                <th>Project</th>
                <th>Component</th>
                <th>Subcomponent</th>
                <th>Activity</th>
                <th>Province</th>
                <th>District</th>
                <th>Start Date</th>
                <th>Progress</th>
                <th>Entry User</th>
               
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Project</th>
                    <th>Component</th>
                    <th>Subcomponent</th>
                    <th>Activity</th>
                    <th>Province</th>
                    <th>District</th>
                    <th>Start Date</th>
                    <th>Progress</th>
                    <th>Entry User</th>
                   
                    </tr>
                </tfoot>

                <tbody>
                    @foreach($progress as $current_progress)
                    <tr>
                        <td>#</td>
                        <td>{{ $current_progress->project->name}}</td>
                        <td>{{ $current_progress->component->name}}</td>
                        <td>{{ $current_progress->subcomponent->name}}</td>
                        <td>{{ $current_progress->activity->name}}</td>
                        <td>{{ $current_progress->province->name}}</td>
                        <td>
                            @if($current_progress->distric)
                            {{ $current_progress->district->name}}
                            @endif
                        </td>
                        <td>{{ $current_progress->start_date }}</td>
                        <td>{{ $current_progress->progress }}</td>
                        <td>{{ $current_progress->user->first_name }}</td>
                        
                    </tr>

                    @endforeach
                </tbody>

    </table>
@stop


@section('scripts')
{{-- <script src="//code.jquery.com/jquery-1.12.3.js"></script> --}}
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        var $body = $('body');

        var table = $('#table-log').DataTable({
            "order": [0, 'asc'],
            "responsive": true,
            "pageLength": 25,
            "autoWidth": true,
            aoColumnDefs: [
                {
                    bSortable: false,
                    aTargets: [-1]
                }
            ]
        });

        // confirm ban
        $body.on('click', '.confirm-ban', function (e) {
            var text = "";
            var className = $(this).attr('class').replace(/\s/g, "");
            var $dialog = $('#modal-ban-confirm');
            var $banForm = $('#frm_ban_submit');

            if (className === "confirm-bantext-danger") {
                text = "ban";
                $banForm.html("Ban");
            } else {
                text = "unban";
                $banForm.html("Unban");
                $banForm.removeClass('btn-danger');
                $banForm.addClass('btn-success');
            }

            $dialog.find('.modal-body').html('You are about to ' + text + ' this user, continue ?');
            $dialog.find('form').attr('action', this.rel);
            $dialog.modal('show');

            e.preventDefault();
        });

        $body.on('click', '.confirm-ban-red-button', function (e) {
            $(this).attr('disabled', true);
            $(this).closest('form')[0].submit();
        });

        // confirm delete
        $body.on('click', '.confirm-delete', function (e) {
            var label = $(this).data('label');
            var $dialog = $('#modal-delete-confirm');

            $dialog.find('.modal-body').html('You are about to delete <strong>' + label + '</strong>, continue ?');
            $dialog.find('form').attr('action', this.rel);
            $dialog.modal('show');

            e.preventDefault();
        });

        $body.on('click', '.confirm-delete-red-button', function (e) {
            $(this).attr('disabled', true);
            $(this).closest('form')[0].submit();
        });

        // filter columns
        $("#table-log tfoot th:not(:nth-last-child(1), :nth-last-child(2))").each(function (i) {
            var select = $('<select style="width: 100%;"><option value=""></option></select>')
                .appendTo($(this).empty())
                .on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    table.column(i)
                        .search(val ? '^' + val + '$' : '', true, false)
                        .draw();
                });

            table.column(i).data().unique().sort().each(function (val, idx) {
                select.append('<option value="' + val + '">' + val + '</option>')
            });
        });

        // put filters on header
        $('tfoot').css('display', 'table-header-group');

    });
</script>

@stop