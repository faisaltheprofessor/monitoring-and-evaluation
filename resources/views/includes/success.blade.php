
<script src="/assets/js/notify/notify.js"></script>
<script>

</script>

@if(\Illuminate\Support\Facades\Session::has('success'))
    <script>
            $.notify("{{ Session::get('success') }}", "success", {position: "bottom-right"})
    </script>


@elseif(\Illuminate\Support\Facades\Session::has('failure')) 
<script>
    $.notify("{{ Session::get('failure') }}", "danger", {position: "bottom-right"})
</script>
@endif
