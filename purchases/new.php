<?php //Si esta logeado y es el administrador hacer..
   if (isset($_SESSION['user']) && $_SESSION['user']=='admin') { 

 $count=mysqli_query($link,"SELECT COUNT(*) AS xproveedores FROM proveedores WHERE condicion=1");
  
 $row=mysqli_fetch_array($count);?>         

<div class="content-wrapper">
     
  <section class="content">

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Nueva Compra</h3> 
            <div class="box-tools pull-right box-title">

                <form  action="purchases/altas.php" method="POST">
                <?php if ($row['xproveedores']>=1){?>
                <button type="submit" class="bg-green-gradient btn" style='margin-top:-6px; padding: 3px 10px;'> 
                	<i class="fa fa-usd"></i>
                  <strong>Comprar</strong>
                </button><?php } ?>
                <button class="btn btn-box-tool" data-widget="collapse">
                  <i class="fa fa-minus"></i>
                </button>
                    
              </div>
          </div>
              
            <div class="box-body">


              <?php if (isset($_GET['successful'])) {?>

              <div class="alert alert-info" style="width:80%; padding-top: 0px; padding-bottom: 0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><h5>
                <i class="fa fa-ok"></i>
                  La compra se efectuó con éxito.<a href="index.php?id=purchases/deposit.php">Ver depósito</a></h5>
              </div>

              <?php  }

                  if ($row['xproveedores']>=1){?> 
       
              	<div class="form-group col-md-10 col-sm-10">
                  <label>Proveedor</label><i class="post"> (Selecciona el proveedor del producto)</i>

                  <select style="width: 60%;" name="proveedor">

                    <?php $proveedor=mysqli_query($link,"SELECT * FROM proveedores where condicion=1");

                    while ($reg=mysqli_fetch_array($proveedor)) { ?>
                    
                    <option value="<?php echo $reg['idproveedor'];?>">
                    <?php echo $reg['nombre'];?>
                    </option>
                  
                    <?php } ?>
                  </select>
                  <hr>
                </div>
                

              <div class="col-md-6 col-sm-6">

                <div class="form-group">
                  <label>Producto </label><i class="post"> (¿Qué producto es?)</i>
                  <input type="text" class="form-control" name="producto" placeholder="Ingrese nombre del producto" required style="width: 80%;" autocomplete="off">
                </div>
        
                <div class="form-group">
                  <strong>Precio</strong>
                  <div class="input-group col-md-7 col-sm-8 col-xs-8">
                    <div class="input-group-addon">
                      <i class="fa fa-usd"></i>
                    </div>
                    <input type="number" class="form-control" name="precio" required autocomplete="off" min=1>
                    <div class="input-group-addon">.00</div>
                  </div>
                </div>

              </div> 

                <div class="form-group col-sm-6 col-md-6">
                  <label>Descripcion</label><i class="post"> (Marca,detalles,etc.)</i>
                  <input type="text" class="form-control" name="descripcion" placeholder="Ingrese una descripcion del producto" required autocomplete="off" maxlength="30">
                </div>


                <div class="form-group col-sm-6 col-md-4">
                  <label>Cantidad</label><i class="post"> (¿Cuántos productos?)</i>
                  <input type="number" class="form-control" name="cantidad" min="1" style="width: 70%;" required>
                </div>

                <?php } else {?>

                <div class="alert alert-warning" role="alert" style="margin-top:20px;">
                  <i class="fa fa-exclamation-sign">
                  </i><strong> Atención!</strong> 
                  Aun no dispones de un proveedor. <a href='index.php?id=admin/provides/newprovide.php' class="alert-link">Ingresa un nuevo proveedor.
                </div>
                <?php  }?>
              </div>
            </form>
  </section>
</div>

<!-- Si no esta logeado NO MOSTRAR! -->
<?php } else { echo '<meta http-equiv="refresh" content="0; url=./">'; } ?>