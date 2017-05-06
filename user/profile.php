<!-- Si no esta logeado NO MOSTRAR! -->
<?php if (empty($_SESSION['id'])){
echo '<meta http-equiv="refresh" content="0; url=./">'; } ?>

<div class="content-wrapper">
        
  <section class="content">
          
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
                  
            <h3 class="box-title">Perfil</h3>
            <div class="box-tools pull-right box-title">

              <?php //Si esta logeado y es el administrador hacer..
                  if (isset($_SESSION['id']) && $_SESSION['id']=='38808595') { 

                    $usuarios=mysqli_query($link,"SELECT * FROM usuarios where dni='$_GET[dni]'");

                    $reg=mysqli_fetch_array($usuarios); ?>

                  <!--Boton para eliminar usuario -->
                  <a href='admin/deletes.php?deleteuser=true&dni="<?php echo $reg['dni'];?>"'>
                    <button class='btn bg-red-gradient' type='button'>
                      <span class='fa fa-trash'></span>
                      <btn class='descarto3'> Eliminar</btn>
                    </button>
                  </a>
              <?php  } //Si esta logeado y es un usuario hacer..
                      if (isset($_SESSION['id']) && $_SESSION['id']!='38808595') { ?>
                
                <a href="user/settings.php">
                  <button class="btn btn-default"> <span class="fa fa-cog"></span> Editar</button>
                </a>
              <?php } ?>

              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                    
            </div>
          </div>
             
          <div class="box-body">
            

              <!--Imagen de perfil y epigrafe (nombre de usuario) -->
	          	<div class="col-md-3 pull-left">
                <img class="profile-user-img" src="<?php echo $reg['imagen'];?>"  style="height:140px; width: 100%;"><br>

                <div class="profile-username post" style="text-align: center;">
                  <?php echo '@'.$reg['usuario'];?>
                </div><br><br>
              </div>

              <div class="col-md-7 col-sm-7 col-md-offset-1">

                <table class="table table-hover">
                  <tr><td><strong>Nombre:</strong></td><td><?php echo $reg['nombre'];?></td></tr>
                  <tr><td><strong>Apellido:</strong></td><td><?php echo $reg['apellido'];?></td></tr>
                  <tr><td><strong>DNI:</strong></td><td><?php echo $reg['dni'];?></td></tr>
                  <tr><td><strong>Email:</strong></td><td><?php echo $reg['email'];?></td></tr>
                  <tr><td><strong>Localidad:</strong></td><td><?php if ($reg['localidad']==""){echo "-";}else { echo $reg['localidad'];}?></td></tr>
                  <tr><td><strong>Teléfono:</strong></td><td><?php if ($reg['telefono']==""){echo "-";}else { echo $reg['telefono'];}?></td></tr>
                  <?php 

                  if (isset($_SESSION['id']) && $_SESSION['id']=='38808595') { ?>
                  <tr><td><strong>Registrado:</strong></td><td><?php echo $reg['fecha'];?></td></tr>

                  <tr><td><strong>Ventas concretadas:</strong></td>

                  <td><?php $count=mysqli_query($link,"SELECT COUNT(*) AS xventas FROM ventas WHERE dni_v='$_GET[dni]'");

                      $row=mysqli_fetch_array($count);                
                      echo $row['xventas'];?></td></tr>
                  <?php } ?>

                </table>
              </div>
            </div>
          </div>
        </div>               
		  </div>
  </section>
</div>

