<script src="/datatables/jquery.dataTables.min.js"></script>
<script src="/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/datatables/dataTables.buttons.min.js"></script>
<script src="/datatables/buttons.bootstrap4.min.js"></script>
<script src="/datatables/jszip.min.js"></script>

<script src="/datatables/buttons.colVis.min.js"></script>
<script src="/datatables/buttons.flash.min.js"></script>
<script src="/datatables/buttons.html5.min.js"></script>
<script src="/datatables/buttons.print.min.js"></script>
<script src="/datatables/dataTables.responsive.min.js"></script>
<script src="/datatables/responsive.bootstrap4.min.js"></script>
<script src="/datatables/dataTables.keyTable.min.js"></script>

<script src="/datatables/pdfmake.min.js"></script>
<script src="/datatables/vfs_fonts.js"></script>
<script src="/datatables/dataTables.searchPane.min.js"></script>

<script>
$(document).ready(function () {

    $(document).ready(function() {
    var groupColumn = 0;
    var table = $('.datatable').DataTable({
        dom: 'Bftrip',
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis',
     
        ],

        "columnDefs": [
            { "visible": false, "targets": groupColumn }
        ],
        "order": [[ groupColumn, 'asc' ]],
        "displayLength": 25,
        keys:true,
            searchPane: {
                columns:[0,1],
                threshold: 0
            },
            exportOptions: {
                columns: ':visible'
            },
            // bFilter: false,
          
            "responsive": true,

        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="15">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
 
    // Order by the grouping
    $('#example tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
            table.order( [ groupColumn, 'desc' ] ).draw();
        }
        else {
            table.order( [ groupColumn, 'asc' ] ).draw();
        }
    } );
} );
});
  </script>




  @section('extra')
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.jspt src="></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/keytable/2.6.0/js/dataTables.keyTable.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/plug-ins/preview/searchPane/dataTables.searchPane.min.js"></script>
  $('.datatable').DataTable({
        "columnDefs": [
            { "visible": false, "targets": groupColumn }
        ],
        "order": [[ groupColumn, 'asc' ]],
        
            dom: 'Bfrtip',
            "paging": true,
            keys:true,
            searchPane: {
                columns:[1,2],
                threshold: 0
            },
            exportOptions: {
                columns: ':visible'
            },
            // bFilter: false,
            buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis',
     
        ],

            "responsive": true,
            "pageLength": 10,
            // "autoWidth": true,
           
        });
    });
  @stop