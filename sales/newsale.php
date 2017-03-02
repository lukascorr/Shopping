<?php if (isset($_SESSION['id'])) {
setlocale (LC_TIME, "es_ES.UTF-8");
$date=strftime('%Y/%m/%d');?>

<div class="content-wrapper">
     
  <section class="content">
        
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Nueva Venta</h3>

            <div class="box-tools pull-right box-title">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>       
            </div>
          </div>
              
          <div class="box-body">
            <div class="row">
	           	<div class="col-md-12">

            <?php 
            $info=$link->query("SELECT * FROM articulos where stock<=5"); 

            while ($cant=$info->fetch_array(MYSQLI_ASSOC)) {

                $noti=$link->query("INSERT INTO notifications (nombre,fecha,mensaje,tipo,condicion) VALUES ('Sistema','$date','Sr. Administrador: se le comunica que el producto ".$cant['nombre_art']." ".$cant['descripcion']." se encuentra en estado de reposicion, con ".$cant['stock']." cantidades.','Reposición',1)");

            } 

              $articles=$link->query("SELECT * FROM articulos where condicion=1");

               if(mysqli_num_rows($articles) > 0)
  {

              $articulos=$link->query("SELECT * FROM articulos INNER JOIN categorias ON articulos.idcategoria_a=categorias.idcategoria WHERE articulos.condicion=1");?>

                <table class='table table-bordered table-striped'>
                    <thead>
                      <tr><th>Artículo</th><th class='descarto3'>Descripcion</th><th class='descarto3'>Categoria</th><th>Precio</th><th class='descarto3'>Stock</th><th>Cantidad</th><th>Acciones</th></tr>
                    </thead>
                    <tbody>
                    <?php
                     while ($write=$articulos->fetch_array(MYSQLI_ASSOC))
                          { ?>
                      <form action='index.php?id=sales/cart.php&articulo=<?php echo $write["idarticulo"]; ?>' method='POST'>

                      <?php echo "<tr><td>".$write['nombre_art']."</td>
                <td class='descarto3'>".$write['descripcion']."</td>
                        <td class='descarto3'>".$write['tipo']."</td>
                        <td>$".$write['precio_art']."</td>
                        <td class='descarto3'>".$write['stock']?></td>
                        <td style='width:17%;'><input type='number' class='form-control' name='cantidad' id='cantidad' autocomplete='off' min='0' max="<?php echo $write['stock'];?>"></td>

                          <td style='width:5%;'><button class='btn btn-success pull-right' type='submit' title='Agregar al carrito' name='add_to_cart'><span class='glyphicon glyphicon-shopping-cart'></span></button></td></tr>

                          <input type='hidden' name='nombre' value='<?php echo $write["nombre_art"]; ?>'>
                          <input type='hidden' name='descripcion' value='<?php echo $write["descripcion"];?>'>
                          <input type='hidden' name='precio' value='<?php echo $write["precio_art"];?>'>
                           </form>
                          <?php } ?>

                    </tbody>
                  </table>
               
                  <?php } else{ ?>

                 <div class="alert alert-info col-md-7 col-sm-10" role="alert" style="margin-top:20px;">
                  <span class="glyphicon glyphicon-exclamation-sign">
                  </span><strong> Disculpe!</strong> Por el momento, no disponemos de stock.
                </div>
                <?php } ?>            
 
              </div>
            </div>               
  		    </div>
       	</div>
      </div>
    </div>
  </section>
</div>
<?php } else{ echo '<meta http-equiv="refresh" content="0; url=./">'; } ?>
