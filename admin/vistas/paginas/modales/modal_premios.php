<div class="modal fade" id="modal_premios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header" id="color_ofi">
                <h4 class="modal-title" id="myModalLabel">Seleccione un ganador</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <form method="POST" id="form_premios" name="form_premios" class="form_premios">
                <input name="identificador" type="hidden" value="RegistrarPremios">
                    <input class="idJornadaPremios" id="idJornadaPremios" name="idJornadaPremios" type="hidden"
                        value="">
                    <!-- ------------------------------------------------------------------ -->
                    <label for="lb_quest">Cantidad de premios:</label><br>
                    <div class="form-check form-check-inline">

                        <label class="form-check-label" for="optionsRadios1">
                            <input type="radio" class="form-check-input premio_1" name="radio_premio"
                                id="optionsRadios1" value="option1" required>
                            1 Premio
                        </label>
                    </div>
                    <div class="form-check form-check-inline">

                        <label class="form-check-label" for="optionsRadios2">
                            <input type="radio" class="form-check-input premio_2" name="radio_premio"
                                id="optionsRadios2" value="option2" required>
                            2 Premios
                        </label>
                    </div>
                    <div class="form-check form-check-inline">

                        <label class="form-check-label" for="optionsRadios3">
                            <input type="radio" class="form-check-input premio_3" name="radio_premio"
                                id="optionsRadios3" value="option3" required>
                            3 Premios
                        </label>
                    </div>
                    <br>
                    <!----------------------------------------------->
                    <label for="lb_quest">Premios a ganar:</label><br>
                    <div class="premios form-group form-row">

                    </div>
        

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" onclick="guardarPremios()" class="btn btn-warning btn-lg"
                    >Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="js/add_premio.js"></script>