<div class="modal" id="modalAgregarLigas">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="form_ligas">

                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white">Alta de Ligas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputFile">Nombre:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="input_nombre_liga" id="input_nombre_liga" class="form-control" placeholder="Ej. Liga Mx 2021" required="">
                        </div>
                        <div class="form-group">
                            <label for="logo_liga">Agrega un logo:</label>
                            <input class="form-control-file" id="imagen" type="file" name="imagen" required="" accept=".jpg, .jpeg, .png">
                        </div>
                    </div>
                </div><!-- modal-body -->
                <div class="modal-footer d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn" data-dismiss="modal" id="color_ofi">Cerrar</button>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-Guardar_Propiedad" id="color_ofi">
                           Registrar </button>
                    </div>

                </div>
            </form
        </div>
    </div>
</div>