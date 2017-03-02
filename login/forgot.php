<?php
 
include '../static/db/conection.php';

$registros=mysqli_query($link,"select * from usuarios where email='$_POST[email]'");?>

<div class="col-md-5 col-md-offset-3 col-sm-7 col-sm-offset-3" style="margin-top:20px;">
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
    
    <span class="glyphicon glyphicon-envelope"></span>  
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
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>No hay resultados de búsqueda</strong><br>
      Tu búsqueda no arrojó ningún resultado. Vuelve a intentarlo con otros datos.
    </div>

    <form action="index.php?id=forget.php" method="POST">

      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Vuelve a introducir tu email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <button style="width: 30%;border-radius: 3px;" type="submit" class="btn btn-primary btn-block btn-flat">Buscar</button>

    </form>

    <? } mysqli_close($link);  ?>
  </div>
</div>
