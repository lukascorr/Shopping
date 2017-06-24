<?php //Si esta logeado y es el administrador hacer..
   if (isset($_SESSION['id']) && $_SESSION['id']=='38808595') { 

    $articulos_dep=$link->query("SELECT * FROM deposito INNER JOIN proveedores ON  deposito.idproveedor_dep = proveedores.idproveedor where deposito.codigo_p='$_GET[codigo]'");

    $add=mysqli_fetch_array($articulos_dep);

    $count1=mysqli_query($link,"SELECT COUNT(*) AS xcategorias FROM categorias WHERE condicion=1");
    $row1=mysqli_fetch_array($count1);

    $count2=mysqli_query($link,"SELECT COUNT(*) AS xproveedores FROM proveedores WHERE condicion=1");
    $row2=mysqli_fetch_array($count2);
    ?>

<div class="content-wrapper">
     
  <section class="content">

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Nuevo Artículo</h3> 
             <div class="box-tools pull-right box-title">
          <form  action="warehouse/altas.php" method="POST" enctype="multipart/form-data">

          <?php if (($row1['xcategorias'] and $row2['xproveedores'])>=1){?><!-- Si existen proveedores se podra comprar-->

              <button type="submit" name='newarticle' value="true" class="btn-success btn" style='margin-top:-8px; padding: 3px 10px;'>Agregar</button>
          <?php } ?>
          
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
              </div>
            <div class="box-body">

              <?php if ($row1['xcategorias']>=1){
                if ($row2['xproveedores']>=1){?>

              <div class="col-md-6 col-sm-6">

                <div class="form-group">
                  <label>Producto </label><i class="post"> (¿Qué producto es?)</i>

                  <input type="text" class="form-control" style="width: 80%;" name="nombre" value='<?php echo $add['producto'];?>'> 
                </div>
        

                <div class="form-group">
                  <strong>Precio</strong>
                  <div class="input-group col-md-7 col-sm-8 col-xs-8">
                    <div class="input-group-addon">
                      <i class="fa fa-usd"></i>
                    </div>
                    <input type="number" class="form-control" name="precio" required autocomplete="off" min='<?php echo $add['precio'];?>' value='<?php echo $add['precio'];?>'>
                    <div class="input-group-addon">.00</div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Categoria</label><i class="post"> (Selecciona una categoria)</i>

                  <select style="width: 80%;" name="categoria">

                    <?php 

                    $categoria=$link->query("SELECT * FROM categorias");

                    while ($reg=$categoria->fetch_array(MYSQLI_ASSOC)) { ?>
                    
                      <option value="<?php echo $reg['idcategoria'];?>"><?php echo $reg['tipo'];?>
                      </option>
                  
                    <?php } ?>

                  </select>
                </div>

                <div class="form-group">
                  <label>Codigo</label><i class="post"> (Ingresa un codigo de producto)</i>
                  <input type="text" class="form-control" name="codigo" placeholder="Ingrese un codigo de producto" autocomplete="off" required style="width: 80%;">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Imagen</label>
                  <input type="file" id="exampleInputFile" name="imagen" required>
                  <p class="help-block">Ingresa una imagen del producto.</p>
                </div>

              </div> 

                <div class="form-group col-sm-6 col-md-6">
                  <label>Descripcion</label><i class="post"> (Marca,detalles,etc.)</i>
                  <input type="text" class="form-control" name="descripcion" value="<?php echo $add['descripcion'];?>">
                </div>


                <div class="form-group col-sm-6 col-md-4">
                  <label>Cantidad</label><i class="post"> (¿Cuántos productos?)</i>
                  <input type="number" class="form-control" name="cantidad" min=1 max="<?php echo $add['cantidad'];?>" style="width: 70%;" value='1'>
                </div>

                <div class="col-md-6 col-sm-6 form-group">
                  <label>Proveedor</label><i class="post"> (Proveedor del producto)</i>

                  <select style="width: 80%;" name="proveedor">
                    <option value="<?php echo $add['idproveedor_dep'];?>"><?php echo $add['nombre'];?>
                    </option>
                  </select> 
                </div>
              <?php } } else { 

                if($row1['xcategorias']==0){?>

                <div class="alert alert-warning" role="alert" style="margin-top:20px;">
                  <i class="fa fa-exclamation-sign">
                  </i><strong> Atención!</strong> 
                  Aun no dispones de una categoria. <a href='index.php?id=warehouse/categories/new.php' class="alert-link">Ingresa una nueva categoria.
                </div>


                <?php  }//Si no existen proveedores mostrar
                elseif($row2['xproveedores']==0){?>

                <div class="alert alert-warning" role="alert" style="margin-top:20px;">
                  <i class="fa fa-exclamation-sign">
                  </i><strong> Atención!</strong> 
                  Aun no dispones de un proveedor. <a href='index.php?id=admin/provides/newprovide.php' class="alert-link">Ingresa un nuevo proveedor.
                </div>

                <?php   } } ?>

              </div>
            </form>
  		    </div>
  </section>
</div>

<!-- Si no esta logeado NO MOSTRAR! -->
<?php } else { echo '<meta http-equiv="refresh" content="0; url=./">'; } ?>