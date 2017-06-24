<?php //Si esta logeado y es el administrador hacer..
   if (isset($_SESSION['id']) && $_SESSION['id']=='38808595') { ?>

<div class="content-wrapper">
     
  <section class="content">
        
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Nueva Categoria</h3> 
            <div class="box-tools pull-right box-title">
                <form  action="warehouse/altas.php" method="POST" enctype="multipart/form-data">
                <button type="submit" name='newcategory' value="true" class="bg-green-gradient btn">Agregar</button>
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
              </div>
            </div>
              
            <div class="box-body">
              <div class="col-md-6 col-sm-7 col-xs-10">
                <div class="form-group">
                  <label>Tipo </label><span class="post"> (¿Qué tipo de categoria es?)</span>
                  <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre de la categoria" required autocomplete="off" maxlength="20">
                </div>

                 <div class="form-group">
                  <label>Descripcion</label><span class="post"> (Marca,detalles,etc.)</span>
                  <input type="text" class="form-control" name="descripcion" placeholder="Ingrese una descripcion del producto" autocomplete="off" maxlength="30">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Imagen</label>
                  <input type="file" id="exampleInputFile" name="imagen" required>
                  <p class="help-block">Ingresa una imagen de la Categoria.</p>
                </div>
              
              </div> 
            </form>

  		    </div>
       	</div>
      </div>
    </div>
  </section>
</div>

<!-- Si no esta logeado NO MOSTRAR! -->
<? } else { echo '<meta http-equiv="refresh" content="0; url=./">'; } ?>