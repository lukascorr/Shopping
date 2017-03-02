
<div class="content-wrapper">
        
  <section class="content">
         
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Configuración Personal</h3>
            <div class="box-tools pull-right box-title">
 
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>

          <div class="box-body">
          
            <!-- Formulario para la imagen -->
            
              <form action="updates.php" method="POST" enctype="multipart/form-data">

              <div class="col-sm-12" style="margin-top: 10px;">
                  <img class="profile-user-img" src="<?php echo '../'.$reg['imagen'];?>" style="height:140px; width: 40%;">

                  <input name="imagen" type="file">
                  <button type="submit" name='newimage' value='true'> Aceptar</button>

                <hr>
              </div>
              </form>

              <!--Formulario de Configuracion de perfil -->
              <form action="updates.php" method="POST">
              <div class="col-md-6 col-sm-6">
                <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" name="nombre" required value="<?php echo $reg['nombre'];?>">
                </div>
          
                

                <div class="form-group">
                  <label for="dni">DNI</label>
                  <input type="text" class="form-control" maxlength="8" required name="dni" value="<?php echo $reg['dni'];?>">
                </div>

                <div class="form-group">
                  <label>Telefono</label>
                  <input type="text" class="form-control" name="telefono" value="<?php echo $reg['telefono'];?>">
                </div> 
              </div> 

              <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label>Apellido</label>
                  <input type="text" class="form-control" name="apellido" value="<?php echo $reg['apellido'];?>">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" required value="<?php echo $reg['email'];?>">
                </div>

                <div class="form-group">
                  <label>Localidad</label>
                  <input type="text" class="form-control" name="localidad" value="<?php echo $reg['localidad'];?>">
                </div>
              </div>
                <button type="submit" name='profile' value='true' class="btn-success btn">Aceptar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
