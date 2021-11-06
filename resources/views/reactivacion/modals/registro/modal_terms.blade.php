<!-- Terms -->
<div class="modal fade" id="planRetornoTerminos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                    <div class="plan-retorno-terminos">
                        <img src="{{asset('images/terminos_condiciones.png')}}" alt="" />
                        <div class="btn-wrapper">
                            <a href="{{asset('images/terminos_condiciones.pdf')}}" target="_blank" class="btn btn-primary">VER EN PDF</a>
                            <a onclick="registroPlan()" class="btn btn-secondary">SIGUIENTE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
