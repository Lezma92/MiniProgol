<!-- Modal -->
<div class="modal fade" id="modal_premios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Premios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="form_premios" name="form_premios" method="post" class="form_premios">
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
                    <!------------------------------------------------>

                    <div class="form-group row">
                        <div class="col-md-6 mx-auto">
                            <button type="button" onclick="guardarPremios()" class="btn btn-primary btn-lg btn-block">Guardar</button>
                </form>
            </div>
        </div>
    </div>


</div><!-- fin  -->
</div>

<script src="js/add_premio.js"></script>