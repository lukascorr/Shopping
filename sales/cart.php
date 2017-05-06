<?php
if (isset($_POST["cantidad"]) and $_POST["cantidad"]>0){
if(isset($_POST["add_to_cart"])) 
  {
  if(isset($_SESSION["cart"])) 
    {
    $item_array_id = array_column($_SESSION["cart"], "item_id"); 
    
      if(!in_array($_GET["articulo"], $item_array_id)) 
        {
        $count = count($_SESSION["cart"]); 
        $item_array = array(
        'item_id' => $_GET["articulo"],
        'item_name' => $_POST["nombre"], 
        'item_price' => $_POST["precio"],
        'item_quantity' => $_POST["cantidad"],
        'item_desc'=> $_POST["descripcion"]
        );
        
        $_SESSION["cart"][$count] = $item_array; 
        }
  }
  else 
  {
    $item_array = array(
    'item_id' => $_GET["articulo"],
    'item_name' => $_POST["nombre"],
    'item_price' => $_POST["precio"],
    'item_quantity' => $_POST["cantidad"],
    'item_desc'=> $_POST["descripcion"]
    );
    $_SESSION["cart"][0] = $item_array; 
    }
  }
}
if(isset($_GET["delete"])){

    foreach($_SESSION["cart"] as $keys => $values){

      if($values["item_id"] == $_GET["articulo"]){

        unset($_SESSION["cart"][$keys]); }
    }
}
setlocale (LC_TIME, "es_ES.UTF-8");
$date=strftime('%Y/%m/%d');
$time=strftime('%H:%M:%S');

if(isset($_GET["sold"])){

    foreach($_SESSION["cart"] as $keys => $values){

      $total=$values['item_quantity'] * $values['item_price'];

      $compra=$link->query("INSERT INTO ventas (fecha_ven,hora,total,cantidad,precio,dni_v,idarticulo_ven) VALUES ('$date','$time','$total','$values[item_quantity]','$values[item_price]','$_SESSION[id]','$values[item_id]')");

        unset($_SESSION["cart"][$keys]);
    }
}
?>

<div class="content-wrapper">
     
  <section class="content">
        
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Carrito de compras</h3><span class="fa fa-shopping-cart"></span>

            <div class="box-tools pull-right box-title">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
              
          <div class="box-body">
            <div class="row">
	           	<div class="col-md-12">
                          
                
               <? if(isset($_GET["sold"])){?>

                <div class="alert bg-green-gradient" style="width:80%;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><h5>
                <span class="fa fa-ok"></span>
                  La venta se realizó con éxito. <a href="index.php?id=sales/newsale.php">Realizar nueva venta</a>
                  </h5>
               </div>

              <?php }

               elseif (!empty($_SESSION["cart"])){ ?>

                  <table class="table table-bordered rwd_auto">
              
                    <tr><th>Artículo</th><th class='descarto3'>Descripción</th><th >Precio</th><th class='descarto3'>Cantidad</th><th>Total</th><th>Acciones</th></tr>
  
                    <?php
                    if(!empty($_SESSION["cart"])) {
                      $total = 0;
                      $cont=0;
                      foreach($_SESSION["cart"] as $keys => $values)
                    {  ?>
  
                    <tr><td><?php echo $values["item_name"]; ?></td>
                    <td class='descarto3'><?php echo $values["item_desc"]; ?></td>
                    <td class='descarto3'>$ <?php echo $values["item_price"]; ?></td>
                    <td><?php echo $values["item_quantity"]; ?></td>
                    <td>$<? echo number_format($values["item_quantity"] * $values["item_price"]); ?></td>

                    <td><a href='index.php?id=sales/cart.php&delete&articulo=<?php echo $values["item_id"]; ?>' title='Eliminar'><button class='btn btn-danger' type='button'>
                    <span class='fa fa-trash'></span></button></a></td></tr>
  
                    <?php
                    $cont=$cont+1;
                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                    }  }  ?>

                    <tr style="background-color: #ECF0F5; font-weight: bolder; border:none;"><td>Total</td><td class='descarto3'></td><td class='descarto3'></td><td></td>
                    <td>$ <?php echo number_format($total); ?></td><td></td></tr>
                  </table>

                <a href="index.php?id=sales/newsale.php">
              <button class="btn btn-primary pull-left" type="  button" title="Nueva Venta"><span class="fa fa-arrow-left">
                </span></button></a>
                      
                <a href="index.php?id=sales/cart.php&sold">

                <button style='margin-left: 20px;' class="btn bg-green-gradient" type="button"><span class="fa fa-check"></span> Efectuar Venta</button></a>

                    <?php } else{?>
                    
                    <div class="alert bg-light-blue-gradient col-md-8 col-sm-8" role="alert" style="margin-top:10px;">
                    <span class="fa fa-transfer"></span> 
                    <strong> No hay compras realizadas</strong>
                    </div>
                    <? } ?>

              </div>
            </div>               
  		    </div>
       	</div>
      </div>
    </div>
  </section>
</div>

<?php $_SESSION['total']=isset($total);
      $_SESSION['contador']=isset($cont); ?>