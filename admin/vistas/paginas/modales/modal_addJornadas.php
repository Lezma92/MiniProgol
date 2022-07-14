<div class="modal fade" id="modalJornadas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header" id="color_ofi">
                <h4 class="modal-title" id="myModalLabel">Nueva Jornada</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="exampleInputFile">Nombre de la Jornada:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="hidden" id="id_liga" name="id_liga" value="">
                            <input type="text" require name="input_nombre_jornada" id="input_nombre_jornada" class="form-control" placeholder="Ingresa Nombre Completo" required>
                        </div>
                        <div class="form-group col ">
                            <label for="fecha_cierre">Fecha y Hora de cierre</label>
                            <input id="fecha_cierre" name="fecha_cierre" type="datetime-local" class="form-control" required>
                        </div>
                        <!-- <div class="form-group col ">
                            <label for="fecha_cierre">Fecha y Hora de Cierre</label>
                            <input id="fecha_cierre" name="fecha_cierre" type="datetime-local" class="form-control">
                        </div> -->
                    </div>
            </div>
            <p id="mensaje" style="color: #FF0000" value=""></p>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning guardar_jornadas" data-dismiss="modal" id="guardar_jornadas">guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>