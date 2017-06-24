   
<div class="content-wrapper">
     
  <section class="content">
        
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Artículos</h3>
          <div class="box-tools pull-right box-title">            
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>       
          </div>
        </div>
          
        <div class="box-body ">  
                
                  <?php if (isset($_SESSION['user']) && $_SESSION['user']=='admin') { ?>

                    <b>Buscar por proveedor:</b><select onchange="location = this.value"> 
                    <option></option>
                    <?php
                    $proveedores=$link->query("SELECT * FROM proveedores WHERE condicion=1");

                    while ($pro=mysqli_fetch_array($proveedores)){ ?>
                      
                    <option value="index.php?id=warehouse/articles/list.php&proveedor=<?php echo $pro['idproveedor'];?>">
                    <?php echo $pro['nombre'];?>
                    </option>
                    <?php } ?>
                    </select>
                  <?php } ?>




                <div class="container-fluid">

              <?php if (isset($_GET['category'])){ 

              $articles=$link->query("SELECT * FROM articulos");
        
              if(mysqli_num_rows($articles) > 0){

              $articulos=$link->query("SELECT * FROM articulos where idcategoria_a='$_GET[category]'");

              while ($reg=$articulos->fetch_array(MYSQLI_ASSOC)) {  ?> 

              <form action='index.php?id=sales/cart.php&articulo=<?php echo $reg["idarticulo"]; ?>' method='POST'>

                  <div class="col-md-3 col-sm-3 cajitas">

                    <!--imagen -->
                    <img class="profile-user-img" src="<?php echo $reg['imagen'];?>">

                    <!--nombre de producto-->
                    <div class="cajita-text"><?php echo $reg['nombre_art'];?></div>

                    <!--Descripcion -->
                    <div class="cajita-descripcion"><?php echo $reg['descripcion'];?></div>

                    <div class="cajita-footer">
                      <?php if (isset($_SESSION['user']) && $_SESSION['user']!='admin') {?>

                      <!--Agregar al carrito -->
                      <button class="btn btn-primary" style="padding: 1px 5px 0px 5px; margin-right: 15px;" type="submit" title='Agregar al carrito' name='add_to_cart'> 
                        <span class='fa fa-shopping-cart'></span>
                      </button> <?php } ?>

                      <!--Precio -->
                      <span class="label bg-green"> 
                        <?php echo "<span class='fa fa-usd'></span>".number_format($reg['precio_art']);?>
                      </span>
                    </div>
                   </div>
                          
                  <input type='hidden' name='nombre' value='<?php echo $reg["nombre_art"]; ?>'>
                  <input type='hidden' name='descripcion' value='<?php echo $reg["descripcion"];?>'>
                  <input type='hidden' name='precio' value='<?php echo $reg["precio_art"];?>'>
                  <input type='hidden' name='cantidad' value='1'>
              </form>
                <?php } }
                
                 else{ 

                 if (isset($_SESSION['user']) && $_SESSION['user']=='admin') {?>
                  
                  <div class="alert alert-warning col-md-7 col-sm-8" role="alert" style="margin-top:20px;">
                  <span class="fa fa-exclamation-sign">
                  </span><strong> Atención!</strong> No dispones de articulos en stock.
                </div>
                
                <?php } else{?>

                  <div class="alert alert-info col-md-7 col-sm-10" role="alert" style="margin-top:20px;">
                  <span class="fa fa-exclamation-sign">
                  </span><strong> Disculpe!</strong> Por el momento, no disponemos de stock.
                </div>

                <?php }  } }

            elseif(isset($_GET['proveedor'])) {
            
            $arts=$link->query("SELECT * FROM articulos where idproveedor_a='$_GET[proveedor]'");

              while ($art_pro=$arts->fetch_array(MYSQLI_ASSOC)) {  ?> 

                  <div class="col-md-3 col-sm-3 cajitas">

                    <!--imagen -->
                    <img class="profile-user-img" src="<?php echo $art_pro['imagen'];?>">

                    <!--nombre de producto-->
                    <div class="cajita-text"><?php echo $art_pro['nombre_art'];?></div>

                    <!--Descripcion -->
                    <div class="cajita-descripcion"><?php echo $art_pro['descripcion'];?></div>

                    <div class="cajita-footer">
                      <!--Precio -->
                      <span class="label bg-green"> 
                        <?php echo "<span class='fa fa-usd'></span>".number_format($art_pro['precio_art']);?>
                      </span>
                    </div>
                   </div>
                <?php } }

            else{
             $articles=$link->query("SELECT * FROM articulos");
        
              if(mysqli_num_rows($articles) > 0){

              $articulos=$link->query("SELECT * FROM articulos");

             while ($reg=$articulos->fetch_array(MYSQLI_ASSOC)) {  ?> 

              <form action='index.php?id=sales/cart.php&articulo=<?php echo $reg["idarticulo"]; ?>' method='POST'>

                  <div class="col-md-3 col-sm-3 cajitas">

                    <!--imagen -->
                    <img class="profile-user-img" src="<?php echo $reg['imagen'];?>">

                    <!--nombre de producto-->
                    <div class="cajita-text"><?php echo $reg['nombre_art'];?></div>

                    <!--Descripcion -->
                    <div class="cajita-descripcion"><?php echo $reg['descripcion'];?></div>

                    <div class="cajita-footer">
                      <?php if (isset($_SESSION['user']) && $_SESSION['user']!='admin') {?>

                      <!--Agregar al carrito -->
                      <button class="btn btn-primary" style="padding: 1px 5px 0px 5px; margin-right: 15px;" type="submit" title='Agregar al carrito' name='add_to_cart'> 
                        <span class='fa fa-shopping-cart'></span>
                      </button> <?php } ?>

                      <!--Precio -->
                      <span class="label bg-green"> 
                        <?php echo "<span class='fa fa-usd'></span>".number_format($reg['precio_art']);?>
                      </span>
                    </div>
                   </div>
                          
                  <input type='hidden' name='nombre' value='<?php echo $reg["nombre_art"]; ?>'>
                  <input type='hidden' name='descripcion' value='<?php echo $reg["descripcion"];?>'>
                  <input type='hidden' name='precio' value='<?php echo $reg["precio_art"];?>'>
                  <input type='hidden' name='cantidad' value='1'>
              </form>
                <?php } }
                
                 else{ 

                 if (isset($_SESSION['user']) && $_SESSION['user']=='admin') {?>
                  
                  <div class="alert alert-warning col-md-7 col-sm-8" role="alert" style="margin-top:20px;">
                  <span class="fa fa-exclamation-sign">
                  </span><strong> Atención!</strong> No dispones de articulos en stock.
                </div>
                
                <?php } else{?>

                  <div class="alert alert-info col-md-7 col-sm-10" role="alert" style="margin-top:20px;">
                  <span class="fa fa-exclamation-sign">
                  </span><strong> Disculpe!</strong> Por el momento, no disponemos de stock.
                </div>

                <?php }  } }?>


                </div>
              </div>
            </div>               
  </section>
</div>