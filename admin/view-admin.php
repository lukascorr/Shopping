<!-- Navbar -->
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
      <ul class="nav navbar-nav">

        <!--Cuadro de Busqueda -->
        <li style="margin-top: 10px;">
          <div style="width: auto;" class="col-md-12">

            <form action="index.php?id=search.php" method="POST">
              <div class="input-group" id="busqueda">
                <input type="text" class="form-control" placeholder="Buscar" onkeyup="document.getElementById('buscar').disabled=(this.value!='') ? false: true" name="results" autocomplete="off">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit" id="buscar" disabled="disabled">
                    <span class="glyphicon glyphicon-search"></span>
                  </button>
                </span>
              </div>
            </form>  
          </div>
        </li>

        <!--icono notificaciones -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">

            <?php //Numero contador de notificaciones
            $count=mysqli_query($link,"SELECT COUNT(*) as xnotific FROM notifications where condicion=1");

            $row=mysqli_fetch_array($count);
            $xnotific=$row['xnotific'];?>                     

            <span class="glyphicon glyphicon-bell" title="<?php 

              if($xnotific==1){ echo 'Tienes '.$xnotific.' notificación';}

              elseif($xnotific>1){ echo 'Tienes '.$xnotific.' notificaciones';}

              else{ echo 'No tienes notificaciones';}?>">
  
              <?php
              if ($xnotific>=1){ echo '<small class="badge bg-red notification">'.$xnotific.'</small>';} ?>
  
            </span>
          </a>
                
          <ul class="dropdown-menu">
            
            <li class="box-header with-border">
              <div><p style='font-weight: bold;' class="pull-left">   Notificaciones</p>
              <a href='index.php?id=admin/notifications/all.php'>
                <p class="pull-right post" style="color: #647EB0;">Ver todas</p> 
              </a> 
              </div>
            </li>
            
            <li>

            <div class="list-group">
              <?php $notific=mysqli_query($link,"SELECT * FROM notifications where condicion=1 ORDER BY fecha DESC");

              while ($user=mysqli_fetch_array($notific)){    

              echo '<a href="index.php?id=admin/notifications/now.php">
              <button type="button" class="list-group-item">
              <strong>'.$user['nombre'].' '.$user['apellido'].'</strong> solicita una cuenta de usuario.</button></a>';

              } ?>
                </div>  
            </li>

          </ul>
        </li>

        <!--Menu Perfil -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img class='img-circle' src='static/img/default-user.png' style="height: 18px;" title="<?php echo $reg['nombre'];?>">
          </a>

          <ul class="dropdown-menu">
      
            <!-- User image -->
            <li class="user-header">
              <img src="static/img/default-user.png"  class="img-responsive img-circle center-block">

              <!--@Usuario-->
              <p>
                <strong><?php echo $reg['nombre'].' '.$reg['apellido'];?></strong><br>
                <span class="profile-username post"><?php echo "@".$reg['usuario'];?></span>
              </p>
            </li>
                  
            <!-- Opciones Perfil-->
            <li class="user-footer">

              <div class="pull-right">
                <a href="login/logout.php" class="btn btn-default" title="Cerrar Sesión">
                  <span class="glyphicon glyphicon-off"></span>
                </a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>

<!--Menú lateral -->
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
          <li><a href="index.php?id=warehouse/articles/list.php">
                <i class="fa fa-circle-o"></i> Artículos
              </a>
          </li>

          <li><a href="index.php?id=warehouse/categories/list.php">
                <i class="fa fa-circle-o"></i> Categorías
              </a>
          </li>
        </ul>
      </li>
            
      <li class="treeview">
        <a href="#">
          <i class="fa fa-th"></i>
          <span>Compras</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        
        <ul class="treeview-menu">

          <li><a href="index.php?id=purchases/new.php">
                <i class="fa fa-circle-o"></i> Nueva Compra
              </a>
          </li>
          <li><a href="index.php?id=purchases/registers.php">
                <i class="fa fa-circle-o"></i> Registros
              </a>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-shopping-cart"></i>
          <span>Ventas</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
      
        <ul class="treeview-menu">
          <li><a href="index.php?id=sales/reports.php">
                <i class="fa fa-circle-o"></i> Informes
              </a>
          </li>

          <li><a href="index.php?id=sales/statistics.php">
                <i class="fa fa-circle-o"></i> Estadísticas
              </a>
          </li>
        </ul>
      </li>
                       
      <li class="treeview">
        <a href="#">
          <i class="fa fa-folder"></i> <span>Acceso</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>

        <ul class="treeview-menu">
          <li><a href="index.php?id=admin/users/registers.php">
                <i class="fa fa-circle-o"></i> Usuarios
              </a>
          </li>

          <li><a href="index.php?id=admin/provides/registers.php">
                <i class="fa fa-circle-o"></i> Proveedores
              </a>
          </li>
          <li><a href="index.php?id=purchases/deposit.php">
                <i class="fa fa-circle-o"></i> Depósito
              </a>
          </li>
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