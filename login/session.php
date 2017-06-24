<?php
include '../static/db/conection.php';
  
  $password = $_POST['password'];
  $user = $_POST['user'];


  $result = mysqli_query($link,"SELECT * FROM usuarios where (password = '$password') and (usuario = '$user')or(password = '$password') and (email = '$user')or(password = '$password') and (telefono = '$user')");

  $row = mysqli_fetch_array($result);
 
  if($row["password"] == $password and $row['usuario'] == $user or $row["password"] == $password and $row['email'] == $user or $row["password"] == $password and $row['telefono'] == $user){

	    $_SESSION['user'] = $row["usuario"];
      $_SESSION['start'] = time();
      $_SESSION['expire'] = $_SESSION['start'] + ( 60 * 60);

      $sql =mysqli_query($link,"UPDATE usuarios SET estado='Activo' WHERE usuario=$_SESSION[user]");

mysqli_close($link);
header("Location: ../"); }

 else
 { 
 	?>

<div class="login-box">

  <div class="login-box-body">

    <p class="login-box-msg">Ingrese sus datos de Acceso</p>
    <div class="alert bg-red-gradient">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        La contraseña que ingresaste es incorrecta.
        <strong><a href="index.php?id=recovery.html" class="alert-link" style="color: white;"> ¿Olvidaste tu cuenta?</a></strong>
    </div>

    <form action="index.php?id=session.php" method="post">

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="user" placeholder="Usuario, Email o Teléfono" required>
        <span class="fa fa-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" maxlength="15">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>

      <button style="width: 30%;border-radius: 3px;" type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>

      <div style="text-align: center;">
        <a href="index.php?id=recovery.html"> ¿Olvidaste tu cuenta?</a>
        <span role="presentation" aria-hidden="true"> · </span>
        <a href="index.php?id=register.html" rel="nofollow">Regístrate</a>
      </div>
    </form>
  </div>
</div>

<?php } ?>