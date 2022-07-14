<div class="card">
    <style>
        .ocultar {
            display: none;
        }

        .mostrar {
            display: block;
        }
    </style>
    <div class="card-header text-center">
        <p class="font-weight-bold">SOLICITUD DE ALTA PARA CLIENTE</p>
        <p class="font-weight-bold font-italic text-danger">*Una vez enviada tu solicitud de alta tendrás que esperar a
            que algún administrador te acepte</p>
    </div>

    <div class="card-body">
        <!-- Mensajes de Verificación -->
        <div id="error" class="alert alert-danger ocultar" role="alert">
            Las Contraseñas no coinciden, vuelve a intentar !
        </div>
        <div id="ok" class="alert alert-success ocultar" role="alert">
            Las Contraseñas coinciden ! (Procesando formulario ... )
        </div>
        <form method="POST" id="form_solicitud" autocomplete="off" onsubmit="verificarPasswords(); return false">
            <div class="modal-body">
                <!-- ------------------------------------------------------------ -->
                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="input_nombre_user">Nombre:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="input_nombre_user" id="input_nombre_user" class="form-control" placeholder="Ingresa Nombre Completo" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="input_apps_user">Apellidos:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="input_apps_user" id="input_apps_user" class="form-control" placeholder="Ingresa Apellidos" required>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="input_tel">Número de teléfono:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                </div>
                                <input type="number" name="input_tel" id="input_tel" class="form-control" placeholder="TELÉFONO" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="input_user">Usuario:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" name="input_user" id="input_user" onchange="verificarUser();" class="form-control" placeholder="Ingresa Nick" required>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="input_pass_1">Contraseña</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" name="input_pass_1" id="input_pass_1" class="form-control" placeholder="Ingrese su contraseña" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="input_pass_2">Vuelve a escribir tu contraseña</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" name="input_pass_2" id="input_pass_2" class="form-control" placeholder="Ingrese su contraseña" required>
                            </div>

                        </div>
                    </div>

                    <!-- ------------------------------------------------------ -->

                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" id="login" class="btn btn-primary btn-lg">Enviar solicitud</button>
                </div>

                <?php
                //$respuesta = ControladorUsuarios::ctrCrearUsuario();

                ?>
        </form>

    </div>


</div>
<script src="js/verificar_pass.js"></script>