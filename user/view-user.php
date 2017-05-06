<!--Navbar -->
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
        <li style="margin-top: 10px; width: 75%;">
          <div class="col-xs-12">

            <form action="index.php?id=search.php" method="POST">
              <div class="input-group" id="busqueda">
                <input type="text" class="form-control" placeholder="Buscar artículos" onkeyup="document.getElementById('buscar').disabled=(this.value!='') ? false: true" name="results" autocomplete="off">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit" id="buscar" disabled="disabled">
                    <span class="fa fa-search"></span>
                  </button>
                </span>
              </div>
            </form>  
          </div>
        </li>


        <!--icono notificaciones -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="fa fa-bell" title="Notificaciones"></span>
          </a>

          <ul class="dropdown-menu">
            <li class="header">
              <p>No hay notificaciones</p>                
            </li>
         </ul>
        </li>

        <!--Menu Perfil -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img class='img-circle' src="<?php echo $reg['imagen'];?>" style="height: 20px;" title="<?php echo $reg['nombre'];?>">
          </a>

          <ul class="dropdown-menu">

            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo $reg['imagen'];?>"  class="img-responsive img-circle center-block">

              <!--@Usuario-->
              <p>
                <strong><?php echo $reg['nombre'].' '.$reg['apellido'];?></strong><br>
                <span class="profile-username post"><?php echo "@".$reg['usuario'];?></span>
              </p>
            </li>
                  
            <!-- Opciones Perfil-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="index.php?id=user/profile.php&<?php echo $reg['usuario'];?>" class="btn btn-default btn-flat">Ver Perfil</a>
              </div>

              <div class="pull-right">
                <a href="login/logout.php" class="btn btn-default" title="Cerrar Sesión">
                  <span class="fa fa-power-off"></span>
                </a>
              </div>
            </li>
          </ul>
        </li>    
      </ul>
    </div>
  </nav>
</header>

<!--Menu lateral -->
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
          <span>Ventas</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
      
        <ul class="treeview-menu">
          <li><a href="index.php?id=sales/newsale.php">
                <i class="fa fa-circle-o"></i>Nueva Venta
              </a>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="index.php?id=sales/cart.php">
          <i class="fa fa-shopping-cart"></i>
          <span>Carrito</span>
                
          <?php if(isset($_SESSION['total'])>0){?>
          <small class="label pull-right bg-green-gradient" 
            title="Hay <?php echo $_SESSION['contador'];?> compras pendientes."> 
            <span class='fa fa-usd'></span>
            <?php echo $_SESSION['total']."
          </small>"; }?>
        </a>
      </li>
                       
      <li>
        <a href="#">
          <i class="fa fa-plus-square"></i> <span>Ayuda</span>
          <small class="label pull-right bg-red-gradient">PDF</small>
        </a>
      </li>
  
      <li>
        <a href="index.php?id=static/about.php">
          <i class="fa fa-info-circle"></i> <span>Quienes Somos?</span>
          <small class="label pull-right bg-yellow-gradient">IT</small>
        </a>
      </li>                      
    </ul>
  </section>      
</aside>
