<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IFAD/MAIL - Datatable</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">

    <style>

* {
  box-sizing: border-box;
  transition: all 0.15s ease 0s;
}
:root {
  --movement: 0.85;
  --stop: 0.5;
  --duration: calc((var(--movement) * (1 / var(--stop))));
  --stagger: 0.1125;
  --perspective: 500;
  --size: 50;
  --ease: cubic-bezier(1, -0.52, 0.26, 0.89);
  --bg: #e6e6e6;
  --panel: #fff;
  --color: #0d0d0d;
  --hue: 23;
  --saturation: 100;
  --lightness: 55;
}
@media (prefers-color-scheme: dark) {
  :root {
    --bg: #1a1a1a;
    --panel: #000;
    --color: #f2f2f2;
  }
}
body {

  /* background: var(--bg); */




}
.scene {
  perspective: calc(var(--perspective) * 1px);
}
.word {
  display: flex;
  transform: translate(calc(var(--size) * 0.7px), 0) rotateX(-30deg) rotateY(45deg);
  transform-style: preserve-3d;
}
.letter__wrap {
  animation: jump calc(var(--duration) * 1s) calc((var(--stagger, 0) * var(--index, 0)) * 1s) var(--ease) infinite;
  transform-origin: bottom center;
  transform-style: preserve-3d;
}
.letter__wrap .letter {
  animation: rotate calc(var(--duration) * 4s) calc((var(--stagger, 0) * var(--index, 0)) * 1s) ease infinite;
}
.letter {
  color: var(--color);
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  font-size: 2rem;
  font-weight: bold;
  height: calc(var(--size) * 1px);
  margin-right: calc(var(--size) * 0.2px);
  position: relative;
  text-transform: uppercase;
  transform-style: preserve-3d;
  width: calc(var(--size) * 1px);
}
.letter__panel {
  align-items: center;
  background: var(--panel);
  border: 5px hsl(var(--hue), calc(var(--saturation) * 1%), calc(var(--lightness) * 1%)) solid;
  display: flex;
  height: calc(var(--size) * 1px);
  justify-content: center;
  left: 50%;
  position: absolute;
  top: 50%;
  width: calc(var(--size) * 1px);
}
.letter__panel:nth-of-type(1) {
  transform: translate3d(-50%, -50%, 0) translate3d(0, 0, calc(var(--size) * 0.5px));
}
.letter__panel:nth-of-type(2) {
  transform: translate3d(-50%, -50%, 0) rotateX(90deg) translate3d(0, 0, calc(var(--size) * 0.5px));
}
.letter__panel:nth-of-type(3) {
  transform: translate3d(-50%, -50%, 0) rotateX(180deg) translate3d(0, 0, calc(var(--size) * 0.5px));
}
.letter__panel:nth-of-type(4) {
  transform: translate3d(-50%, -50%, 0) rotateX(-90deg) translate3d(0, 0, calc(var(--size) * 0.5px));
}
.letter__panel:nth-of-type(5) {
  transform: translate3d(-50%, -50%, 0) rotateY(-90deg) translate3d(0, 0, calc(var(--size) * 0.5px));
}
@-moz-keyframes rotate {
  0%, 30.625% {
    transform: rotateX(0deg);
  }
  33.125%, 81.625% {
    transform: rotateX(90deg);
  }
  83.125%, 100% {
    transform: rotateX(180deg);
  }
}
@-webkit-keyframes rotate {
  0%, 30.625% {
    transform: rotateX(0deg);
  }
  33.125%, 81.625% {
    transform: rotateX(90deg);
  }
  83.125%, 100% {
    transform: rotateX(180deg);
  }
}
@-o-keyframes rotate {
  0%, 30.625% {
    transform: rotateX(0deg);
  }
  33.125%, 81.625% {
    transform: rotateX(90deg);
  }
  83.125%, 100% {
    transform: rotateX(180deg);
  }
}
@keyframes rotate {
  0%, 30.625% {
    transform: rotateX(0deg);
  }
  33.125%, 81.625% {
    transform: rotateX(90deg);
  }
  83.125%, 100% {
    transform: rotateX(180deg);
  }
}
@-moz-keyframes jump {
  0%, 50%, 100% {
    transform: scaleX(1) scaleY(1) translate(0, 0);
  }
  15% {
    transform: scaleX(1.2) scaleY(0.8) translate(0, 0);
  }
  25% {
    transform: scaleX(0.9) scaleY(1.1) translate(0, -100%);
  }
}
@-webkit-keyframes jump {
  0%, 50%, 100% {
    transform: scaleX(1) scaleY(1) translate(0, 0);
  }
  15% {
    transform: scaleX(1.2) scaleY(0.8) translate(0, 0);
  }
  25% {
    transform: scaleX(0.9) scaleY(1.1) translate(0, -100%);
  }
}😊
@-o-keyframes jump {
  0%, 50%, 100% {
    transform: scaleX(1) scaleY(1) translate(0, 0);
  }
  15% {
    transform: scaleX(1.2) scaleY(0.8) translate(0, 0);
  }
  25% {
    transform: scaleX(0.9) scaleY(1.1) translate(0, -100%);
  }
}
@keyframes jump {
  0%, 50%, 100% {
    transform: scaleX(1) scaleY(1) translate(0, 0);
  }
  15% {
    transform: scaleX(1.2) scaleY(0.8) translate(0, 0);
  }
  25% {
    transform: scaleX(0.9) scaleY(1.1) translate(0, -100%);
  }
}



        #table-log {
            font-size: 85%;
        }

        /* th, td {
            text-align: center;
        } */
        #loader {
           width:100%;
            height:100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items:center;
            position: absolute;
            background-color:rgba(255,255,255,0.25);
            backdrop-filter: blur( 4px );
                -webkit-backdrop-filter: blur( 4px );

            z-index: 11;
        }

        .message {
            width:60%;
            margin:0 auto;
            font-size: 3em;
            text-align: center;
        }
    </style>

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    {{-- Loader --}}

   <div id="loader">
    <div class="scene" style="--hue: 260; --saturation: 71; --lightness: 63">
       
        <div class="word">
            <div class="letter__wrap" style="--index: 0">
                <div class="letter" data-letter="L"><span class="letter__panel" aria-hidden="true">L</span><span class="letter__panel" aria-hidden="true">W</span><span class="letter__panel" aria-hidden="true">L</span><span class="letter__panel" aria-hidden="true">W</span><span class="letter__panel"></span></div>
            </div>
            <div class="letter__wrap" style="--index: 1">
                <div class="letter" data-letter="o"><span class="letter__panel" aria-hidden="true">o</span><span class="letter__panel" aria-hidden="true">a</span><span class="letter__panel" aria-hidden="true">o</span><span class="letter__panel" aria-hidden="true">a</span><span class="letter__panel"></span></div>
            </div>
            <div class="letter__wrap" style="--index: 2">
                <div class="letter" data-letter="a"><span class="letter__panel" aria-hidden="true">a</span><span class="letter__panel" aria-hidden="true">i</span><span class="letter__panel" aria-hidden="true">a</span><span class="letter__panel" aria-hidden="true">i</span><span class="letter__panel"></span></div>
            </div>
            <div class="letter__wrap" style="--index: 3">
                <div class="letter" data-letter="d"><span class="letter__panel" aria-hidden="true">d</span><span class="letter__panel" aria-hidden="true">t</span><span class="letter__panel" aria-hidden="true">d</span><span class="letter__panel" aria-hidden="true">t</span><span class="letter__panel"></span></div>
            </div>
            <div class="letter__wrap" style="--index: 4">
                <div class="letter" data-letter="i"><span class="letter__panel" aria-hidden="true">i</span><span class="letter__panel" aria-hidden="true">.</span><span class="letter__panel" aria-hidden="true">i</span><span class="letter__panel" aria-hidden="true">.</span><span class="letter__panel"></span></div>
            </div>
            <div class="letter__wrap" style="--index: 5">
                <div class="letter" data-letter="n"><span class="letter__panel" aria-hidden="true">n</span><span class="letter__panel" aria-hidden="true">.</span><span class="letter__panel" aria-hidden="true">n</span><span class="letter__panel" aria-hidden="true">.</span><span class="letter__panel"></span></div>
            </div>
            <div class="letter__wrap" style="--index: 6">
                <div class="letter" data-letter="g"><span class="letter__panel" aria-hidden="true">g</span><span class="letter__panel" aria-hidden="true">.</span><span class="letter__panel" aria-hidden="true">g</span><span class="letter__panel" aria-hidden="true">.</span><span class="letter__panel"></span></div>
            </div>

          
        </div>
        
    </div>
    <div class="message">
        The system is going to fetch {{ App\MonthlyProgress::count()}} records from the database, which makes it computationally expensive. You will have to wait for a very long time until all reocrds are loaded. Thank you for your patience. It is worth mentioning that we are working hard to refactor the code so that it loads records fast and efficiently.
        
    </div>
   </div>

    {{-- End Loader --}}
    <div class="container-fluid" id="app">
        <div class="row">
            <div align="center">
                <h4><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> All Records</h4>
            </div>
    
    <div class="col-sm-12 col-md-12 table-container table-responsive">
        <table cellspacing="0" width="100%" id="table-log"
               class="table  table-bordered table-sm table-hover table-condensed dt-responsive nowrap">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Project</th>
                    <th>Component</th>
                    <th>Subcomponent</th>
                    <th>Activity</th>
                    <th>Province</th>
                    <th>District</th>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Start Date</th>
                   
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
                        <th>Year</th>
                        <th>Month</th>
                        <th>Start Date</th>
                       
                        </tr>
                    </tfoot>
    
                    <tbody>
                        <tr v-for="progress in progresses">
                            <td>@{{ progress.id }}</td>
                            <td>@{{ progress.project.name }}</td>
                            <td>@{{ progress.component.name }}</td>
                            <td>@{{ progress.subcomponent.name }}</td>
                            <td>@{{ progress.activity.name }}</td>
                            <td>@{{ progress.province.name || ''}}</td>
                            <td>@{{ progress.district.name || ''}}</td>
                            <td>@{{ new Date(progress.start_date).getFullYear()  }}</td>
                            <td>@{{ new Date(progress.start_date).toLocaleString('default', { month: 'long' })  }}</td>
                            <td>@{{ new Date(progress.start_date).toLocaleDateString("en-US", {year: 'numeric', month: 'long', day: 'numeric' })  }}</td>
                        </tr>

                        </tr>
                        {{-- @foreach($progress as $current_progress)
                        <tr>
                            <td>{{ $current_progress->id }}</td>
                            <td>{{ $current_progress->project->name}}</td>
                            <td>{{ $current_progress->component->name}}</td>
                            <td>{{ $current_progress->subcomponent->name}}</td>
                            <td>{{ $current_progress->activity->name}}</td>
                            <td>{{ $current_progress->province->name}}</td>
                            <td>
                                @if($current_progress->district)
                                {{ $current_progress->district->name}}
                                @endif
                            </td>
                           
                            <td>{{ $current_progress->start_date->year }}</td>
                            <td>{{ $current_progress->start_date->format('F') }}</td>
                            <td>
                                {{ $current_progress->start_date->toDateString()}}
                            </td>
                            
                        </tr>
     --}}
                        {{-- @endforeach --}}
                    </tbody>
    
        </table>
    </div>
        </div>

       
    </div>




<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> --}}
<script src="https://unpkg.com/vue@next"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>


<script>

    component = {
    
        data() {
            return {
                progresses : {}
            }
        }, 
        mounted(){
            axios.get('/getProgress')
                .then(data=> {
                    console.log(data.data);
                    this.progresses = data.data
                })
                .then(()=> {
                    $('#loader').css('display', 'none')
                })
                .then(function(){
               
    $(document).ready(function () {
        var $body = $('body');

        var table = $('#table-log').DataTable({
            dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
            
        ],
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
        $("#table-log tfoot th:not(:nth-last-child(0), :nth-last-child(0))").each(function (i) {
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

                })
                
        }
    }
    Vue.createApp(component).mount('#app')
</script>


</body>
</html>