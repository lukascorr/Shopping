<?php //Si esta logeado y es el administrador hacer..
   if (isset($_SESSION['user']) && $_SESSION['user']=='admin') { ?>
   
<div class="content-wrapper">
     
  <section class="content">
        
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Nuevo Usuario</h3> 
             <div class="box-tools pull-right box-title">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
            </div>
          </div>
              
          <div class="box-body">
	           	<div class="col-md-8 col-sm-8">

<form  action="admin/altas.php" method="GET">

  <div class="form-group">
    <label>DNI</label>
    <input type="text" class="form-control" name="dni" maxlength="8" 
           placeholder="Introduce tu DNI" required autocomplete="off">
  </div>

  <div class="form-group">
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Introduce tu nombre" required autocomplete="off">
  </div>
  <div class="form-group">
    <label>Apellido</label>
    <input type="text" class="form-control" name="apellido"
           placeholder="Introduce tu apellido" autocomplete="off">
  </div>

  <strong>Usuario</strong>
  <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">@</span>
  <input type="text" class="form-control" name="usuario" placeholder="Introduce un nombre de usuario" required aria-describedby="basic-addon1" autocomplete="off">
</div><br>

  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" placeholder="Introduce tu email" required autocomplete="off">
  </div>
  <div class="form-group">
    <label">Contraseña</label>
    <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
  </div>
  <button type="submit" name='newuser' value="true" class="bg-green-gradient btn">Enviar</button>
</form>
              

              </div>
            </div>               
  		    </div>
       	</div>
      </div>
    </div>
  </section>
</div>

<!-- Si no esta logeado NO MOSTRAR! -->
<?php } else { echo '<meta http-equiv="refresh" content="0; url=./">'; } ?>