<?php //Si esta logeado y es el administrador hacer..
   if (isset($_SESSION['id']) && $_SESSION['id']=='38808595') { ?>

<div class="content-wrapper">
     
  <section class="content">
        
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Nuevo Proveedor</h3> 
             <div class="box-tools pull-right box-title">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
            </div>
          </div>
              
          <div class="box-body">

	           	<div class="col-md-8 col-sm-8">

                <form  action="admin/altas.php" method="GET">

                  <div class="form-group">
                    <label>Codigo</label>
                    <input type="text" class="form-control" name="codigo" placeholder="Ingrese un codigo" autocomplete="off" required>
                  </div>

                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre" autocomplete="off" required>
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingrese email" required autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label>Telefono</label>
                    <input type="text" class="form-control" name="telefono" 
                    placeholder="Ingrese telefóno" required autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label>Direccion</label>
                    <input type="text" class="form-control" name="direccion" 
                    placeholder="Ingrese dirección" required autocomplete="off">
                  </div>

                  <button type="submit" name='newprovide' value="true" class="btn-success btn">Enviar</button>
                </form>

            </div>               
  		    </div>
       	</div>
      </div>
    </div>
  </section>
</div>

<!-- Si no esta logeado NO MOSTRAR! -->
<?php } else { echo '<meta http-equiv="refresh" content="0; url=./">'; } ?>