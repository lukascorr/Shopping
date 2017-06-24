<?php
include '../static/db/conection.php';

setlocale (LC_TIME, "es_ES.UTF-8");
$date=strftime('%Y/%m/%d');


	$producto=ucwords($_POST['producto']);
	$descripcion=ucwords($_POST['descripcion']);
	$total=($_POST['precio'])*($_POST['cantidad']);

	$sql1=$link->query("SELECT * FROM deposito");

	$sql2=$sql1->fetch_array(MYSQLI_ASSOC);

	//SI ingresa el mismo producto actualiza la cantidad
	if($producto==$sql2['producto'] and $descripcion==$sql2['descripcion']){

	$sql3=$link->query("UPDATE deposito SET 
		cantidad=cantidad+('$_POST[cantidad]'),
		precio='$_POST[precio]',
		descripcion='$_POST[descripcion]',
		idproveedor_dep='$_POST[proveedor]'")
		or die(mysqli_error($link));

	$sql4=$link->query("SELECT codigo_p FROM deposito where producto='$producto' and descripcion='$descripcion'");
	$sql5=$sql4->fetch_array(MYSQLI_ASSOC);


	$compra=$link->query("INSERT INTO compras (cantidad_c,fecha,precio_c,total,codigo_c) VALUES ('$_POST[cantidad]','$date','$_POST[precio]','$total','$sql5[codigo_p]')")or die(mysqli_error($link));

	}else{

	//Si no se ingreso el mismo producto hacer..

	$depo=$link->query("INSERT INTO deposito (producto,descripcion,cantidad,precio,idproveedor_dep) VALUES ('$producto','$descripcion','$_POST[cantidad]','$_POST[precio]','$_POST[proveedor]')")or die(mysqli_error($link));

	$sql1=$link->query("SELECT codigo_p FROM deposito where producto='$producto' and descripcion='$descripcion'");
	$sql2=$sql1->fetch_array(MYSQLI_ASSOC);

	$compra=$link->query("INSERT INTO compras (cantidad_c,fecha,precio_c,total,codigo_c) VALUES ('$_POST[cantidad]','$date','$_POST[precio]','$total','$sql2[codigo_p]')")or die(mysqli_error($link));
	}

header('location: ../index.php?id=purchases/new.php&successful');
//-----------------------------------------------------------------------
	
mysqli_close($link);
?>
