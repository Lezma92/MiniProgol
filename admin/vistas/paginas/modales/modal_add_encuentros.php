<div class="modal fade" id="modal_add_encuentros" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header" id="color_ofi">
                <h4 class="modal-title" id="myModalLabel">Agregar Proximos Encuentros</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" autocomplete="off" required>
                    <div class="form-group">
                        <div class="row">
                            <input type="hidden" id="id_jornada" name="id_jornada" value="">
                            <input type="hidden" id="estado" name="estado" value="">
                            <div class="form-group col autocomplete">
                                <label for="equi_local text-center">Local</label>
                                <input id="equi_local" name="equi_local" type="text" class="form-control" placeholder="Equipo Local" required>
                            </div>
                            <div class="form-group col autocomplete">
                                <label for="equi_visit">Visitante</label>
                                <input id="equi_visit" name="equi_visit" type="text" class="form-control" placeholder="First name" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col ">
                        <label for="fecha_p">Fecha y Hora del Partido</label>
                        <input id="fecha_p" name="fecha_p" type="datetime-local" class="form-control" required>
                    </div>
            </div>
            <p id="mensaje" style="color: #FF0000" value=""></p>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning guardar_encuentros" data-dismiss="modal" id="guardar_encuentros">guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<style>
    * {
        box-sizing: border-box;
    }

    body {
        font: 16px Arial;
    }

    /*the container must be positioned relative:*/
    .autocomplete {
        position: relative;
        display: inline-block;
    }

    input {
        border: 1px solid transparent;
        background-color: #f1f1f1;
        padding: 10px;
        font-size: 16px;
    }

    input[type=text] {
        background-color: #f1f1f1;
        width: 100%;
    }

    input[type=submit] {
        background-color: DodgerBlue;
        color: #fff;
        cursor: pointer;
    }

    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
    }

    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }

    /*when hovering an item:*/
    .autocomplete-items div:hover {
        background-color: #e9e9e9;
    }

    /*when navigating through the items using the arrow keys:*/
    .autocomplete-active {
        background-color: DodgerBlue !important;
        color: #ffffff;
    }
</style>