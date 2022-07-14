<div class="modal fade" id="modal_add_puntos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header" id="color_ofi">
                <h4 class="modal-title" id="myModalLabel">Seleccione un ganador</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <form method="POST" id="form_puntos" name="form_puntos">
                    <input id="id_encuentro" name="id_encuentro" type="hidden" value="" required>
                    <div class="row aqui">
                        <div class="col col-sm d-flex justify-content-end">
                            <div class="form-check form-check-inline">
                                <span class="mr-0 mr-md-2 mr-sm">
                                    <img id="img_local" src="" width="30" height="30">
                                </span>
                                <label id="equipo_local" class="form-check-label" for="inp_local">

                                </label>
                                <input name="equipo" class="text-center form-check-input" type="radio" id="inp_local" value="L" required>

                            </div>
                        </div>

                        <div class="col-xs d-flex justify-content-center">
                            <div class="form-check form-check-inline">
                                <input name="equipo" class="form-check-input" type="radio" value="E" required>

                            </div>
                        </div>
                        <div class="col d-flex justify-content-start">
                            <div class=" form-check form-check-inline ">
                                <input name="equipo" class="form-check-input" type="radio" id="ipt_visit" value="V" required>
                                <label id="equipo_visit" class="form-check-label" for="ipt_visit"></label>
                                <span class="mr-0 mr-md-2">
                                    <img id="img_visitante" src="" width="30" height="30">
                                </span>
                            </div>

                           
                        </div>
    
                        
                    </div>
                    <div class="col-md-12 d-flex justify-content-center" style="margin-top: 15px;">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input name="encCancelado" value="Desactivo" class="form-check-input encCancelado" type="checkbox" id="encCancelado">
                                        <label class="form-check-label" for="encCancelado">
                                            Partido Cancelado
                                        </label>
                                    </div>
                                </div>
                            </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" onclick="guardarPuntos()" class="btn btn-warning guardarPuntos btn-lg" id="guardarPuntos">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>