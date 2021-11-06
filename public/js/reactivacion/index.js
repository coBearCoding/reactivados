$(document).ready(() => {


    $(".modal").modal();

    let validacion = false;
    function ingresar() {
        if (validacion) {
            window.location.assign("./reactivacion.html");
        } else {
            $("#cedulaIncorrecta").modal("open");
        }
    }



    $('#loginForm').submit((e) => {
        e.preventDefault();

        let fd = new FormData();
        var cedula = $('#cedula').val();



        fd.append('ced_alum', cedula);

        $.ajax({
            url: '/login',
            data: fd,
            type: 'POST',
            processData: false,
            contentType: false,
            statusCode: {
                200: (response) => {
                    console.log('Registrese');
                    window.location.href = '/registro';
                },
                402: (response) => {
                    console.log('no aplica');
                    $('#porcentaje_consulta').text(`${response.responseJSON.porcentaje}%`);
                    $('#planRegistrado').modal("open");

                },
                403: (response) => {
                    $("#cedulaIncorrecta").modal("open");
                },
                400: (response) => {
                    console.log('Error de sistema');
                }
            },
        });


        return false;
    });
});

