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
    <meta charset="utf-8" http-equiv="X-UA-Compatible" content="IE=edge">
    
      <title>Shopping</title>
   
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <link rel="stylesheet" href="static/css/font-awesome.css">
    <link rel="stylesheet" href="static/css/AdminLTE.css">
    <link rel="stylesheet" href="static/css/skin.css">
    <link rel="icon" href="static/img/favicon.ico">
    <link rel="stylesheet" href="static/css/bootstrap.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <script src="static/js/jQuery-2.1.4.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/app.js"></script>

  </head>
    <body class="hold-transition skin-blue sidebar-mini">

      <?php
//-------------------------------------------------------------
      
      //Si esta logeado y es el administrador hacer..
      if (isset($_SESSION['id']) && $_SESSION['id']=='38808595') {

      //si su session expiro (30 min) hacer ...
      $now = time();
            
      if($now > $_SESSION['expire']) {

      $sql =$link->query("UPDATE usuarios SET estado='Inactivo' where dni=$_SESSION[id]");

      session_destroy();
      header('location: login'); }

      $registros=$link->query("SELECT * FROM usuarios WHERE dni=$_SESSION[id]");

      $reg=$registros->fetch_array(MYSQLI_ASSOC);

      //mostrar vista para el administrador
      include 'admin/view-admin.php';
       } 

//-------------------------------------------------------------

      //Si esta logeado y es un usuario hacer..
      elseif (isset($_SESSION['id']) && $_SESSION['id']!='38808595') {

      //si su session expiro (30 min) hacer ...
      $now = time();
            
      if($now > $_SESSION['expire']) {

      $sql =$link->query("UPDATE usuarios SET estado='Inactivo' where dni=$_SESSION[id]");

      session_destroy();
      header('location: login');  }

      $registros=$link->query("SELECT * FROM usuarios WHERE dni=$_SESSION[id]");

      $reg=$registros->fetch_array(MYSQLI_ASSOC);

      //mostrar vista para el usuario
      include 'user/view-user.php';
      }  

//-------------------------------------------------------------
      //Si no esta loggeado mostrar la vista default...
      else {?>

      <header class="main-header">

        <div class="navbar-fixed-top" role="navigation">     
          <a href="./" class="logo">    
            <span class="logo-mini"><b>SH</b>P</span>     
            <span class="logo-lg"><b>Shopping</b></span>
          </a>
        </div>

        <nav class="navbar navbar-fixed-top" role="navigation">
      
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>


          <div class="navbar-custom-menu">
       
            <ul>

                <!--Cuadro de Busqueda -->
              <li style="margin-top: 10px;" class="nav navbar-nav pull-left">
                  
                <form action="index.php?id=search.php" method="POST">
                  <div class="input-group" id="busqueda">
                    <input type="text" class="form-control" placeholder="Buscar" onkeyup="document.getElementById('buscar').disabled=(this.value!='') ? false: true" name="results" autocomplete="off" style="width: 10px;">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit" id="buscar" disabled="disabled">
                        <span class="glyphicon glyphicon-search"></span>
                      </button>
                    </span>
                  </div>
                </form>  
              </li>

              <li style="display: inline;" class="navbar-brand">
                  <a href="login/index.php?id=request.html" >
                  <button type="button" class="btn btn-lg btn-xs btn-primary" title="Pídele un usuario al administrador">Solicitar Usuario</button>
                </a>
              </li>

              <li style="display: inline;" class="navbar-brand">
                <a href="login">
                  <button type="button" class="btn btn-lg btn-xs btn-primary">Iniciar Sesión</button>
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
              <a href="index.php?id=developers/about.php">
                <i class="fa fa-info-circle"></i> <span>Quienes Somos?</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
        
      </aside>
      
      <!-- Notificacion (Cuenta solicitada) -->
      <?php if (isset($_GET['message'])) {

           echo "<script> alert('Solicitado!!');
                </script>";
          } 
       
       } 

        //Contenido Dinamico
       echo '<div style="margin-top:50px;"';
        include($variable);  ?>
       </div>

        <footer class="main-footer">
         <strong>Copyright &copy; 2016.</strong> All rights reserved. 
          <a href="https://github.com/LukasCorr" target="_blank"><img src="static/img/github.png" style="height: 14px" class="github-phone"></a>
        </footer>
</body>
</html>