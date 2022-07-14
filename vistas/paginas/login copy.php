<body  style="background-image: linear-gradient(to top, #2a374c, #263046, #222a3f, #1f2339, #1b1d32);"> 
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">

        <div class="text-center">

          <p class="text-bold text-primary" style="font-size: 24px;">Bienvenidos</p>
          <p class="text-bold text-primary">Quinielas Radilla</p </div>
          <br>
          <form method="post">

            <div class="input-group mb-3">


              <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
              <div class="input-group-append input-group-text">
                <span class="fas fa-envelope"></span>
              </div>


            </div>


            <div class="input-group mb-3">

              <input type="password" class="form-control" placeholder="Password" name="ingPassword" required>
              <div class="input-group-append input-group-text">
                <span class="fas fa-lock"></span>
              </div>

            </div>

            <div class="">
              <div class="">
                <button type="submit" class="btn btn-primary btn-block btn-flat" style="background: #fcc00d; border-color: #fcc00d">Ingresar</button>
                <a class="underlineHover btn-block  text-primary" href="<?php echo $ruta;  ?>registrate">Registrate</a>


              </div>
              <div id="formFooter">

              </div>
            </div>
            <?php

            $login = new ControladorUsuarios();
            $login->ctrIngresoUsuario();
            ?>
          </form>




        </div>
      </div>
    </div>

</body>
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