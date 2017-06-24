<?php

session_start();

//Declaracion de variable "id" para el contenido dinamico.
if (isset($_GET['id'])){ 
  
    $variable=$_GET['id'];  }

else{ $variable="body.html";}  

include 'static/db/conection.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" http-equiv="X-UA-Compatible" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Shopping</title>
    <link rel="stylesheet" href="static/css/font-awesome.css">
    <link rel="stylesheet" href="static/css/AdminLTE.css">
    <link rel="icon" href="static/img/favicon.ico">
    <link rel="stylesheet" href="static/css/bootstrap.css">

    <script src="static/js/jquery-3.2.1.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/app.js"></script>

  </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
      <?php
//-------------------------------------------------------------
      
      //Si esta logeado y es el administrador hacer..
      if (isset($_SESSION['user']) && $_SESSION['user']=='admin') {

      //si su session expiro (30 min) hacer ...
      $now = time();
            
      if($now > $_SESSION['expire']) {

      session_destroy();
      header('location: login'); }

      $registros=$link->query("SELECT * FROM usuarios WHERE usuario='$_SESSION[user]'");

      $reg=$registros->fetch_array(MYSQLI_ASSOC);

      //mostrar vista para el administrador
      include 'admin/view-admin.php';
       } 

//-------------------------------------------------------------

      //Si esta logeado y es un usuario hacer..
      elseif (isset($_SESSION['user']) && $_SESSION['user']!='admin') {

      //si su session expiro (30 min) hacer ...
      $now = time();
            
      if($now > $_SESSION['expire']) {

      $sql =$link->query("UPDATE usuarios SET estado='Inactivo' where usuario='$_SESSION[user]'");

      session_destroy();
      header('location: login');  }

      $registros=$link->query("SELECT * FROM usuarios WHERE usuario='$_SESSION[user]'");

      $reg=$registros->fetch_array(MYSQLI_ASSOC);

      //mostrar vista para el usuario
      include 'user/view-user.php';
      }  

//-------------------------------------------------------------
      //Si no esta loggeado mostrar la vista default...
      else {?>

      <header class="main-header">
  
          <a href="./" class="logo">    
            <span class="logo-mini"><b>SH</b>P</span>     
            <span class="logo-lg"><b>Shopping</b></span>
          </a>

        <nav class="navbar" role="navigation">
      
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
       
            <ul class="nav navbar-nav navbar-right">

                <!--Cuadro de Busqueda -->
              <li style="margin-top: 10px;width: 45%;">
                  
                <form action="index.php?id=search.php" method="POST">
                  <div class="input-group" id="busqueda">
                    <input type="text" class="form-control" placeholder="Buscar artículos" onkeyup="document.getElementById('buscar').disabled=(this.value!='') ? false: true" name="results" autocomplete="off" style="width: 100%;">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit" id="buscar" disabled="disabled">
                        <span class="fa fa-search"></span>
                      </button>
                    </span>
                  </div>
                </form>  
              </li>

              <li style="margin-top: -5px;">
                  <a href="login/index.php?id=request.html" >
                  <button type="button" class="btn btn-primary" title="Pídele un usuario al administrador">Solicitar Usuario</button>
                </a>
              </li>

              <li style="margin-top: -5px;">
                <a href="login">
                  <button type="button" class="btn btn-primary">Iniciar Sesión</button>
                </a>
              </li>

            </ul>

          </div>

        </nav>
      </header>


      <aside class="main-sidebar">

        <section class="sidebar">

          <ul class="sidebar-menu">
                      
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Almacén</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?id=warehouse/articles/list.php"><i class="fa fa-circle-o"></i> Artículos</a></li>
                <li><a href="index.php?id=warehouse/categories/list.php"><i class="fa fa-circle-o"></i> Categorías</a></li>
              </ul>
            </li>

             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>

            <li>
              <a href="index.php?id=static/about.php">
                <i class="fa fa-info-circle"></i> <span>Quienes Somos?</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
        
      </aside>
      
      <!-- Notificacion (Cuenta solicitada) -->
      <?php if (isset($_GET['message'])) {

           echo "<script> alert('Se ha solicitado una cuenta de usuario! En breve sera comunicado a través de su cuenta email.');
                </script>";
          } 
       
       } 

        //Contenido Dinamico
       echo '<div style="margin-top:50px;"';
        include($variable);  ?>
       </div>

        <footer class="main-footer">
         <strong>TSolutions &copy; 2016.</strong> All rights reserved.
          <a href="https://github.com/LukasCorr/Shopping" target="_blank"><span class="fa fa-github"></span></a>
        </footer>
</body>
</html>