<?php
 
include '../static/db/conection.php';

$registros=mysqli_query($link,"select * from usuarios where email='$_POST[email]'");?>

<div class="col-md-5 col-sm-7" style="margin-top:10%;left: 30%;">
  <div class="register-box-body" >
    <p class="register-box-msg" style="font-weight: bolder;">
    Restablece tu contraseña</p>

    <?  if ($reg=mysqli_fetch_array($registros)) {  ?>

    <!-- Si encontro usuario hacer..  -->
    <div style="float: right;text-align: center;" class="col-md-4">
      <img src="<?php echo '../'.$reg['imagen'];?>" style="width: 100px;" class="profile-user-img"><br>   
      <strong ><?php echo $reg['nombre'].' '.$reg['apellido'];?></strong><br>
        <?php echo '@'.$reg['usuario'];?>
    </div>
    
    <i class="fa fa-envelope"></i>  
    Te enviaremos un correo para restablecer tu contraseña.<br><br>

    <div class="form-group has-feedback">
      <input style="width:50%;" disabled value="<?php echo $reg['email'];?>">
    </div><br>

    <a href="#">
      <button type="button" class="btn btn-primary btn-flat pull-left" style="width: 25%;border-radius: 3px;">Enviar</button>
    </a>

    <a href="index.php?id=recovery.html">
      <button type="button" class="btn btn-default" style="width: 32%;border-radius: 3px;margin-left: 14px;">No eres tú</button>
    </a>        


    <?  } else {  ?>
    
    <!--- Si no encontro usuario hacer.. -->
    <div class="alert alert-danger" style="color: white;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>No hay resultados de búsqueda</strong><br>
      Tu búsqueda no arrojó ningún resultado. Vuelve a intentarlo con otros datos.
    </div>

    <form action="index.php?id=forgot.php" method="POST">

      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Vuelve a introducir tu email" required>
        <i class="fa fa-envelope form-control-feedback"></i>
      </div>

      <button style="width: 30%;border-radius: 3px;" type="submit" class="btn btn-primary btn-block btn-flat">Buscar</button>

    </form>

    <? } mysqli_close($link);  ?>
  </div>
</div>
