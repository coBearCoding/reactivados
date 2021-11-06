
<div class="modal fade" id="planRetornoRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <div class="modal-container">
                <div class="plan-retorno-registro">
                <form id="registroCarnetForm" method="POST">
                    @csrf
                    <img src="images/icon-certificado.png" alt="" />

                    <p class="heading text-primary">
                        CARGA AQUI TU CERTIFICADO DE VACUNACIÓN
                    </p>



                    <div id="info-message" class="materialert info p-2" role="alert">
                        <p class="title-inner">
                            <strong>PARÁMETROS DEL DOCUMENTO A CARGAR</strong>
                        </p>
                        <ul class="text-left">
                            <li>Archivos admitidos JPG o PNG (máx 2Mb)</li>
                            <li>Tomar Foto con buena iuminación</li>
                            <li>Toma de documento completo y legible</li>
                        </ul>
                    </div>
                    <div class="form-group file-box mb-4">

                        <input type="file" id="carnetVacunacionFile"
                            accept="image/jpeg,image/gif,image/png,application/pdf" name="image"
                            onchange="loadFile(event)" style="display: none" />

                        <div id="get_file">
                            <i class="far fa-file mt-3 mb-0"></i><br />
                            Cargar Comprobante
                        </div>
                        <img id="carnetVacunacionPreview" width="300" style="display: none" />
                        <div id="fileMessage"></div>
                        <div id="clearFile" style=""><i class="fa fa-times"></i></div>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" checked />
                        <label class="custom-control-label" for="defaultChecked2">Acepto Términos y
                            condiciones</label>
                    </div>

                    <button disabled id="aceptarRegistroButton" type="submit" class="btn btn-primary">Aceptar</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

