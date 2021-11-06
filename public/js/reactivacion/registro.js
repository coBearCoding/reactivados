$(document).ready(()=>{
    $("#get_file").click(function() {
        $("#carnetVacunacionFile").click();
    });

    $("#carnetVacunacionPreview").click(function() {
        $("#carnetVacunacionFile").click();
    });

    $("#carnetVacunacionFile").bind("change", function() {
        $("#fileMessage").html(
            "<small>Click en la imagen para cambiar"
        );
        $("#get_file").hide(100);
        var image = document.getElementById(
            "carnetVacunacionPreview"
        );
        (image.style.display = "initial"),
        (image.src = URL.createObjectURL(
            event.target.files[0]
        ));
        $("#fileMessage").show(100);
        $("#clearFile").show(100);
    });

    $("#clearFile").on("click", function() {
        $("#get_file").show(100);
        var image = document.getElementById(
            "carnetVacunacionPreview"
        );
        image.style.display = "none";
        image.src = "";
        $("#fileMessage").hide(100);
        $("#clearFile").hide(100);
    });


    $('#carnetVacunacionFile').change((e)=>{
        if($('#defaultChecked2').is(':checked') && $('#carnetVacunacionFile[type=file]').get(0).files.length > 0){
            $('#aceptarRegistroButton').prop('disabled', false);
        }else{
            $('#aceptarRegistroButton').prop('disabled', true);
        }
    });

    $('#defaultChecked2').change((e)=>{
        if($('#carnetVacunacionFile[type=file]').get(0).files.length > 0 && $('#defaultChecked2').is(':checked')){
            $('#aceptarRegistroButton').prop('disabled', false);
        }else{
             $('#aceptarRegistroButton').prop('disabled', true);
        }
    });


    $('#registroCarnetForm').submit((e)=>{
        e.preventDefault();

        let fd = new FormData();
        var cedula = $('#cedula').val();
        let carnetVacunacion = $('#carnetVacunacionFile[type=file]')[0].files[0];

        // fd.append('ced_alum', cedula);
        fd.append('carnetVacunacion', carnetVacunacion);


        $.ajax({
            url: '/saveCarnet',
            data: fd,
            type: 'POST',
            processData: false,
            contentType: false,
            statusCode: {
                201: (response) => {
                    $("#planRetornoRegistro").modal("close");
                    $('#porcentaje-quemado').text('60%');
                    $("#registroSuccess").modal("open");
                },
                400: (response) => {
                    $("#planRetornoRegistro").modal("close");
                    $("#errorSistema").modal("open");
                }
            },
        });

        return false;
    });

    $('#percentThirty').submit((e)=>{
        e.preventDefault();

        $.ajax({
            url: '/thirtyPercent',
            data: null,
            type: 'POST',
            processData: false,
            contentType: false,
            statusCode: {
                201: (response) => {
                    $("#virtualConfirmacion").modal("close");
                    $('#porcentaje-quemado').text('30%');
                    $("#registroSuccess").modal("open");
                },
                400: (response) => {
                    $("#virtualConfirmacion").modal("close");
                    $("#errorSistema").modal("open");
                }
            },
        });

        return false;
    });


})
