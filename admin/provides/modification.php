<?php //Si esta logeado y es el administrador hacer..
   if (isset($_SESSION['id']) && $_SESSION['id']=='38808595') { ?>
   
<div class="content-wrapper">
     
  <section class="content">
        
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Modificar Proveedor</h3>

            <div class="box-tools pull-right box-title">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>          
            </div>
          </div>
          
          <div class="box-body ">             
            <div class="row">
              <div class="col-md-12 col-xs-12">


              <?php $proveedores=mysqli_query($link,"SELECT * FROM proveedores where idproveedor='$_GET[idproveedor]'");?>

              <div style="overflow-x:auto;">
                <table class='table table-hover'>
                  <thead>
                    <tr><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Dirección</th><th>Acciones</th></tr>
                  </thead>
                  <tbody>
                    <form action="admin/altas.php" method="GET">
                      <?php while ($write=mysqli_fetch_array($proveedores))

                      {   

                        echo "<tr>"."<td><input type='text' class='form-control' required value='".$write['nombre']."'></td>".

                        "<td><input type='email' class='form-control' required value='".$write['email']."'></td>".

                        "<td><input type='text' class='form-control' required value='".$write['telefono']."'></td>".
                          
                        "<td><input type='text' class='form-control' required value='".$write['direccion']."'></td>"?>

                          <td>
                            <a href="registers.php">
                              <button class='btn btn-success' name='updateprovide' value='true' type='submit'>
                                <span class='glyphicon glyphicon-ok'></span>
                              </button>
                            </a>
                          </td></tr>

                         <?php }?>
                    </form>
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