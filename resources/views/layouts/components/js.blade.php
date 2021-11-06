<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script src="{{asset('js/reactivacion.js')}}"></script>
<script src="{{asset('js/reactivacion/index.js')}}"></script>
<script src="{{asset('js/reactivacion/registro.js')}}"></script>


