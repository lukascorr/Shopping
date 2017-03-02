<?php //Si esta logeado y es el administrador hacer..
   if (isset($_SESSION['id']) && $_SESSION['id']=='38808595') { 
  ?>
   
<div class="content-wrapper">
     
  <section class="content">
        
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><a href="index.php?id=purchases/registers.php"><span class="glyphicon glyphicon-check"></span></a> Compras realizadas</h3>
            <div class="box-tools pull-right box-title">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
              
          <div class="box-body ">             
            <div class="row">
              <div class="col-md-12 col-xs-12">

                <div class='registros'>
                  <div class="pull-right">
                    <label>Buscar:</label>
                    <select onchange="location = this.value"> 
                    <option></option>
                    <?php
                  $fecha=$link->query("SELECT fecha FROM compras");
                  $fe=$fecha->fetch_array(MYSQLI_ASSOC);
                  $date = new DateTime($fe['fecha']);
                  $fechita='';
                  $total=0;

                     while($fe){

                    if ($fechita!=$fe['fecha'] ) {?>
                      <option value="index.php?id=purchases/registers.php&fecha=<?php echo $fe['fecha'];?>">
                      <?php echo $date->format('d-m-Y');?>
                      </option>  
                      <?php } 
                      $fechita=$fe['fecha'];
                      $fe=$fecha->fetch_array(MYSQLI_ASSOC);
                      }?>              
                    </select>
                  </div><br>

                <?php 

                  if (isset($_GET['fecha'])){ 

                  $fecha1=$link->query("SELECT fecha FROM compras where fecha='$_GET[fecha]'");
                  $fe1=$fecha1->fetch_array(MYSQLI_ASSOC);

                  $date = new DateTime($fe1['fecha']);?>
                  
                  <strong>Fecha: </strong>
                    <?php echo $date->format('d-m-Y');?>
                  
                    <table class='table table-bordered rwd_auto' style="width: 99%">
                    <thead>
                      <tr><th>Producto</th><th>Cantidad</th><th>Precio</th><th class="descarto3">Proveedor</th><th>Total</th></tr>
                    </thead>
                    <tbody>
                    <?   $registros=$link->query("SELECT * FROM compras INNER JOIN deposito ON compras.codigo_c = deposito.codigo_p INNER JOIN proveedores ON deposito.idproveedor_dep = proveedores.idproveedor where fecha='$_GET[fecha]'");

                    while($reg=$registros->fetch_array(MYSQLI_ASSOC)){
                      echo "<tr><td>".$reg['producto']."</td>
                      <td>".$reg['cantidad_c']."</td>".
                      "<td>".'$'.$reg['precio']."</td>".
                      "<td class='descarto3'>".$reg['nombre']."</td>"
                      ."<td>$".$reg['total']."</td></tr>";
                      $total=$total+$reg['total'];} ?>
                      <tr style="background-color: #ECF0F5; font-weight: bolder;">
                      <td>Total</td><td></td><td></td><td class='descarto3'></td>
                      <td><?php echo '$'.$total; ?></td></tr>
                    </tbody>
                    </table>

                    <?php      } 
                  else{
        
                  $registros=$link->query("SELECT * FROM compras INNER JOIN deposito ON compras.codigo_c = deposito.codigo_p INNER JOIN proveedores ON deposito.idproveedor_dep = proveedores.idproveedor");
                  $reg=$registros->fetch_array(MYSQLI_ASSOC);
                  $fechita='';
                  
                   while($reg){ 
                    if ($fechita!=$reg['fecha'] ) {
                    $date = new DateTime($reg['fecha']);?>

                    </table>
                  
                  <strong>Fecha: </strong>
                    <?php echo $date->format('d-m-Y');?>
                  
                    <table class='table table-bordered rwd_auto' style="width: 99%">
                    <thead>
                      <tr><th>Producto</th><th>Cantidad</th><th>Precio</th><th class="descarto3">Proveedor</th><th>Total</th></tr><?php } ?>
                    </thead>
                    <tbody>

                      <tr><td><?php echo $reg['producto']."</td>
                      <td>".$reg['cantidad_c']."</td>".
                      "<td>".'$'.$reg['precio']."</td>".
                      "<td class='descarto3'>".$reg['nombre']."</td>"
                      ."<td>$".$reg['total']."</td></tr>"; 
                      $total=$total+$reg['total']; 
                     
                      $fechita=$reg['fecha'];
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
    </div>
  </section>
</div>

<!-- Si no esta logeado NO MOSTRAR! -->
<?php } else { echo '<meta http-equiv="refresh" content="0; url=./">'; } ?>