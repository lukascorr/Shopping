
<div class="content-wrapper">
        
  <section class="content">
          
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">

            <h3 class="box-title">Configuración de la cuenta</h3>
            <div class="box-tools pull-right box-title">
 
              <button class="btn btn-box-tool" data-widget="collapse"><i class="  fa fa-minus"></i>
              </button>
            </div>
          </div>
 
          <div class="box-body">

            <!-- Formulario de configuracion de cuenta -->
            <form action="updates.php" method="POST">
            <div class="col-md-7 col-sm-8">
              <strong>Usuario</strong>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">@</span>
                <input type="text" class="form-control" name="usuario" value="<? echo $reg['usuario'];?>" placeholder="Introduce un nombre de usuario" required aria-describedby="basic-addon1">
              </div><br>

              <div class="form-group">
                <label>Nueva contraseña</label>
                <input type="password" class="form-control" placeholder="Ingrese su nueva contraseña" name="password1">
              </div>

              <div class="form-group">
                <label>Confirmar Contraseña</label>
                <input type="password" name="password2" class="form-control" placeholder="Vuelva a ingresar su nueva contraseña">
              </div>

              <button type="submit" name='account' value='true' class="btn-default btn">Aceptar</button>

            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>