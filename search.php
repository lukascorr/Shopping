   
<div class="content-wrapper">
     
  <section class="content">
        
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title" style="font-weight: bolder;">
          <?php 
                $count=$link->query("SELECT COUNT(*) as xresults FROM articulos where nombre_art='$_POST[results]' or descripcion='$_POST[results]'");

                $row=$count->fetch_array(MYSQLI_ASSOC);

                $xresults=$row['xresults'];
                     
                    if ($xresults==1){ echo "Se encontró '".$xresults."' resultado.";}
                    elseif ($xresults>1){ echo "Se encontraron '".$xresults."' resultados.";}
                    else { echo '<span class="fa fa-zoom-out"></span> No se encontraron resultados.';}?>

            </h3> 
          </div>        
            <div class="box-body ">             
              <div class="row">
                <div class="col-md-12 col-xs-12">
                  <div class="container-fluid">
                    <?php 

                      $search=$link->query("SELECT * FROM articulos where nombre_art='$_POST[results]' or descripcion='$_POST[results]'");
                  
              while ($reg=$search->fetch_array(MYSQLI_ASSOC)){  ?> 
              
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
                <?php } ?>
                  </div>               
                </div>
              </div>               
  		      </div>
       	</div>
      </div>
    </div>
  </section>
</div>