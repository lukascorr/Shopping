<?php //Si esta logeado y es el administrador hacer..
   if (isset($_SESSION['user']) && $_SESSION['user']=='admin') { 

?>
   
<div class="content-wrapper">
     
  <section class="content">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Depósito 
              
              <?php //Numero contador de articulos                
                $count=$link->query("SELECT COUNT(*) AS xarticles FROM deposito WHERE cantidad>=1");

                $row=$count->fetch_array(MYSQLI_ASSOC);              

                if ( $row['xarticles'] >=1){
                echo '<small class="label pull-right bg-green">'.$row['xarticles'].'</small>';}
              ?>

            </h3>

            <div class="box-tools pull-right box-title">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>          
            </div>
          </div>
          

          <div class="box-body ">             

                <?php if (isset($_GET['successful'])) {

                echo '<div class="alert alert-info" style="width:70%; padding-top: 0px; padding-bottom: 0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><h5>
                <i class="fa fa-check-circle"></i>
                  El artículo se agregó al stock.</h5>
               </div>';
              }  

              $articles=$link->query("SELECT * FROM deposito where cantidad>=1");

              $depositolleno=$articles->fetch_array(MYSQLI_ASSOC);

              if($depositolleno==true){

              $deposito=$link->query("SELECT * FROM deposito INNER JOIN proveedores ON deposito.idproveedor_dep = proveedores.idproveedor WHERE deposito.cantidad>=1");?>

                <table class='table table-hover rwd_auto'>
                  <thead>
                    <tr><th>Producto</th><th class="descarto3">Descripcion</th><th>Cantidad</th><th>Precio</th><th class="descarto3">Proveedor</th><th>Acciones</th></tr>
                  </thead>
                  <tbody>
                  
                    <?php while (($write=$deposito->fetch_array(MYSQLI_ASSOC)))
                          {

                        echo "<tr>"."<td>".$write['producto']."</td>"."<td class='descarto3'>".$write['descripcion']."</td>"."<td>".$write['cantidad']."</td>".

                          "<td>"?><?php echo '$'.$write['precio'];?>
                          <td class='descarto3'><?php echo $write['nombre'];?>

                          <td><a href='index.php?id=warehouse/articles/new.php&codigo=<? echo $write['codigo_p'];?>' title='Agregar al stock'><button class='btn btn-success' type='button'>
                          <i class='fa fa-check'></i></button></a>

                          </td></tr>
                         <?php }?>

                  </tbody>
                </table>

                <?php } else{ ?>

                <div class="alert bg-light-blue-gradient col-md-6 col-sm-7" role="alert" style="margin-top:20px;">
                  <i class="fa fa-exclamation-sign">
                  </i><strong> El depósito se encuentra vacío.</strong>  
                </div>
                <?php } ?>

              </div>
            </div>               
  </section>
</div>

<!-- Si no esta logeado NO MOSTRAR! -->
<?php } else { echo '<meta http-equiv="refresh" content="0; url=./">'; } ?>