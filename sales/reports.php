<?php //Si esta logeado y es el administrador hacer..
   if (isset($_SESSION['id']) && $_SESSION['id']=='38808595') { 

$fechita='';
$total=0;
 ?>
   
<div class="content-wrapper">
     
  <section class="content">
        
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><a href="index.php?id=sales/reports.php"><span class="fa fa-check"></span></a> Ventas realizadas</h3>
            <div class="box-tools pull-right box-title">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
              
          <div class="box-body ">             
            <div class="row">
              <div class="col-md-12 col-xs-12">

                  <div class="pull-right">
                    <label>Buscar:</label>
                    <select onchange="location = this.value"> 
                      <option></option>
                      <?php
                 //Buscador
                      $fecha=$link->query("SELECT fecha_ven FROM ventas");
                      $fe=$fecha->fetch_array(MYSQLI_ASSOC);
                  
                      while($fe){

                       if ($fechita!=$fe['fecha_ven'] ) {?>
                        <option value="index.php?id=sales/reports.php&fecha=<?php echo $fe['fecha_ven'];?>">
                          <?php echo $fe['fecha_ven'];?>
                        </option>  
                       <?php } 
                        $fechita=$fe['fecha_ven'];
                        $fe=$fecha->fetch_array(MYSQLI_ASSOC);
                      }?>              
                    </select>
                  </div><br>
                <?php   
//----------------------------------------------------------------
                   
                    if (isset($_GET['fecha'])){ 

                  $fecha1=$link->query("SELECT * FROM ventas where fecha_ven='$_GET[fecha]'");
                  $fe1=$fecha1->fetch_array(MYSQLI_ASSOC);

                  $date = new DateTime($fe1['fecha_ven']);?>
                  
                  <strong>Fecha: </strong>
                    <?php echo $date->format('d-m-Y');?>
                  
                    <table class='table table-bordered rwd_auto' style="width: 99%">
                    <thead>
                      <tr><th>Hora</th><th>Producto</th><th>Descripción</th><th>Precio</th><th>Cantidad</th><th>Usuario</th><th>Total</th></tr>
                    </thead>
                    <tbody>
                    <?   $registros=$link->query("SELECT * FROM ventas INNER JOIN articulos ON ventas.idarticulo_ven = articulos.idarticulo INNER JOIN usuarios ON ventas.dni_v = usuarios.dni where ventas.fecha_ven='$_GET[fecha]'");

                    while($reg=$registros->fetch_array(MYSQLI_ASSOC)){
                     $date2 = new DateTime($reg['hora']);

                      echo "<tr><td>".$date2->format('H:i')."<td>".$reg['nombre_art']."</td>
                      <td>".$reg['descripcion']."</td>".
                      "<td>".'$'.$reg['cantidad']."</td>".
                      "<td>".$reg['precio']."</td>"
                      ."<td><a title='Ver usuario' href='index.php?id=user/profile.php&dni=".$reg['dni']."'>@".$reg['usuario']."</a></td>
                      <td>$".$reg['total']."</td></tr>";
                      $total=$total+$reg['total'];} ?>
                      <tr style="background-color: #ECF0F5; font-weight: bolder;">
                      <td>Total</td><td></td><td></td><td></td><td></td><td class='descarto3'></td>
                      <td><?php echo '$'.$total; ?></td></tr>
                    </tbody>
                    </table>

                    <?php      } 
      //----------------------------------------------------------
                 
                  else{
        
                  $registros=$link->query("SELECT * FROM ventas INNER JOIN articulos ON ventas.idarticulo_ven = articulos.idarticulo INNER JOIN usuarios ON ventas.dni_v = usuarios.dni");
                  $reg=$registros->fetch_array(MYSQLI_ASSOC);
                  $fechita='';

                   while($reg){ 

                    $date2 = new DateTime($reg['hora']);

                    if ($fechita!=$reg['fecha_ven'] ) {
                   $date = new DateTime($reg['fecha_ven']);
                    ?>
                    </table>

                  <strong>Fecha: </strong>
                    <?php echo $date->format('d-m-Y');?>
                  
                    <table class='table table-bordered rwd_auto' style="width: 99%">
                    <thead>
                      <tr><th>Hora</th><th>Producto</th><th>Descripción</th><th>Cantidad</th><th>Precio</th><th>Usuario</th><th>Total</th></tr><?php } ?>
                    </thead>
                    <tbody>

                      <tr><td><?php echo $date2->format('H:i')."</td>
                      <td>".$reg['nombre_art']."</td><td>".$reg['descripcion']."</td>
                      <td>".$reg['cantidad']."</td>".
                      "<td>".'$'.$reg['precio']."</td>
                      <td><a title='Ver usuario' href='index.php?id=user/profile.php&dni=".$reg['dni']."'>@".$reg['usuario']."</a></td>
                      <td>$".$reg['total']."</td></tr>"; 
                      $total=$total+$reg['total']; 
                      
                      $fechita=$reg['fecha_ven'];
                      $reg=$registros->fetch_array(MYSQLI_ASSOC);
                      } ?>
                  </table>
                  <?php } ?>
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