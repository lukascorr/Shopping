<?php //Si esta logeado y es el administrador hacer..
   if (isset($_SESSION['user']) && $_SESSION['user']=='admin') { ?>
   
<div class="content-wrapper">
     
  <section class="content">
        
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Proveedores 
              
              <?php //Numero contador de proveedores
                $count=$link->query("SELECT COUNT(*) AS xproveedores FROM proveedores WHERE condicion=1");
                $row=mysqli_fetch_array($count);
                
                if ( $row['xproveedores'] >=1){
                echo '<small class="label pull-right bg-green">'.$row['xproveedores'].'</small>';}
              ?>

            </h3>

            <div class="box-tools pull-right box-title">
              <a href="index.php?id=admin/provides/newprovide.php">
                <button class="btn btn-default"> <span class="fa fa-calendar"></span><btn class='descarto3'>  Nuevo Proveedor</btn></button>
              </a>
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
            </div>
          </div>
              
          <div class="box-body ">             
            <div class="row">
              <div class="col-md-12 col-xs-12">

              <?php if (isset($_GET['deleted'])) {?>

              <div class="alert bg-red-gradient" style="width:80%; padding-top: 0px; padding-bottom: 0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><h5>
                <span class="fa fa-ok"></span>
                  El proveedor se eliminó con éxito.</h5>
              </div>
                
                <?php }     
                elseif(isset($_GET['successful'])){

                echo '<div class="alert bg-green-gradient" style="width:70%; padding-top: 0px; padding-bottom: 0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><h5>
                <span class="fa fa-ok"></span>
                  El proveedor se agregó con éxito.</h5>
               </div>';   }



                 $provides=$link->query("SELECT * FROM proveedores where condicion=1");

                   $hayprovide=mysqli_fetch_array($provides);
        

                    if($hayprovide!=''){?>

                <table class='table table-hover rwd_auto'>
                    <thead>
                      <tr><th>Codigo</th><th>Nombre</th><th class='descarto3'>Email</th><th class="descarto1">Teléfono</th><th class='descarto3'>Dirección</th><th>Acciones</th></tr>
                    </thead>
                    <tbody>
                  
                      <?php $proveedores=$link->query("SELECT * FROM proveedores WHERE condicion=1");

                      while ($write=mysqli_fetch_array($proveedores))

                      { ?>  

                      <tr><td><?php echo $write['codigo']?></td>
                      <td><?php echo $write['nombre']?></td>

                      <!--Mailto enviar mail a proveedor -->
                      <td class='descarto3'><a title="Escribir email" href="mailto:<?php echo $write['email'];?>"> <?php echo $write['email']?></a></td>

                      <td class='descarto1'><?php echo $write['telefono']?></td>
                      <td class='descarto3'><?php echo $write['direccion']?></td>

                      <!--Boton eliminar proveedor -->
                      <td><a href='admin/deletes.php?deleteprovide=true&idproveedor=<?php echo $write['idproveedor']?>'>
                      <button class='btn bg-red-gradient' type='button'>
                      <span class='fa fa-trash'></span>
                      </button></a>

                      <a href='index.php?id=admin/provides/modification.php&idproveedor=<?php echo $write['idproveedor']?>'><button class='btn bg-light-blue-gradient' type='button'><span class='fa fa-edit'></span></button></a></td></tr>
                        
                      <?php } } else{ ?>

                      <div class="alert bg-orange-gradient col-md-6 col-sm-6" role="alert" style="margin-top:20px;">
                      <span class="fa fa-exclamation-sign">
                      </span><strong> Atención!</strong> 
                      No dispones de ningún proveedor.
                      </div>
                    <?php } ?>

                    </tbody>
                </table>
              </div>
            </div>               
  		    </div>
       	</div>
      </div>
    </div>
  </section>
</div>

<!-- Si no esta logeado NO MOSTRAR! -->
<?php } else { echo '<meta http-equiv="refresh" content="0; url=./">'; } ?>