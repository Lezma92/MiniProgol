<div class="login-box card-body login-card-body">

  <body class="text-center" id="signin-body">

    <form class="form-signin" method="POST">
      <center>
        <img class="mb-4" src="img/icono.png" alt="" width="160" height="100">
      </center>
      <h1 class="h3 mb-3 font-weight-normal text-center text-bold">Quinielas Radilla</h1>
      <label for="ingUsuario" class="sr-only">Usuario</label>
      <input type="text" id="ingUsuario" class="form-control" placeholder="Usuario" name="ingUsuario" required autofocus>
      <label for="ingPassword" class="sr-only">Contraseña</label>
      <input type="password" id="ingPassword" class="form-control" placeholder="Contraseña" name="ingPassword" required>
      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <button class="btn btn-lg btn-primary btn-block" type="submit">INICIAR SESIÓN</button>
      
      <a class="underlineHover btn-block  text-danger text-center" href="<?php echo $ruta;  ?>registrate">Registrate</a>
      <p class="mt-2 mb-2 text-muted text-center">&copy; 2021-2022</p>
      <div id="formFooter">

    </div>
    </form>
    

  </body>
</div>
<?php

$login = new ControladorUsuarios();
$login->ctrIngresoUsuario();
?>

<style>
  .underlineHover:after {
    display: block;
    left: 0;
    bottom: -10px;
    width: 0;
    height: 2px;
    background-color: #56baed;
    content: "";
    transition: width 0.2s;
  }

  .underlineHover:hover {
    color: #F30000;
  }

  .underlineHover:hover:after {
    width: 100%;
  }
</style>