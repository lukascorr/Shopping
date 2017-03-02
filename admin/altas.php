<?php
include '../static/db/conection.php';

setlocale (LC_TIME, "es_ES.UTF-8");
$date=strftime('%Y/%m/%d');


	//Opcion nuevo usuario
	if($_GET['newuser']=='true'){

	$nombre=ucwords($_GET['nombre']);	
	$apellido=ucwords($_GET['apellido']);

	$sql=mysqli_query($link,"INSERT INTO usuarios (dni,nombre,apellido,usuario,email,password,imagen,estado,fecha,condicion) VALUES ('$_GET[dni]','$nombre','$apellido','$_GET[usuario]','$_GET[email]','$_GET[password]','static/img/default-user.png','Inactivo','$date',1)");
	header('location: ../index.php?id=admin/users/registers.php');
	}


	//Opcion nuevo proveedor
	if($_GET['newprovide']=='true'){

		$sql1=mysqli_query($link,"SELECT codigo FROM proveedores");

		$sql2=mysqli_fetch_array($sql1);

	if($_GET['codigo']==$sql2['codigo']){

		$sql3=mysqli_query($link,"UPDATE proveedores SET condicion=1");
		header('location: ../index.php?id=admin/provides/registers.php&successful');
	}

	else{

	$nombre=ucwords($_GET['nombre']);
	$direccion=ucwords($_GET['direccion']);

	$sql4=mysqli_query($link,"INSERT INTO proveedores (codigo,nombre,email,telefono,direccion,condicion) VALUES ('$_GET[codigo]','$nombre','$_GET[email]','$_GET[telefono]','$direccion',1)");

	header('location: ../index.php?id=admin/provides/registers.php&successful');
	}}

	

	//Modificacion de proveedor
	if ($_GET['updateprovide']=='true'){

	$nombre=ucwords($_GET['nombre']);

	$sql=mysqli_query($link,"UPDATE proveedores SET nombre='$nombre',email='$_GET[email]',telefono='$_GET[telefono]',direccion='$_GET[direccion]' WHERE idproveedor='$_GET[idproveedor]'");

	header('location: ../index.php?id=admin/provides/registers.php');
	}



	//Cargo notificacion
	if($_GET['notification']=='true'){

	$nombre=ucwords($_GET['nombre']);
	$apellido=ucwords($_GET['apellido']);

	$sql=mysqli_query($link,"INSERT INTO notifications (dni,nombre,apellido,usuario,email,mensaje,fecha,condicion) VALUES ('$_GET[dni]','$nombre','$apellido','$_GET[usuario]','$_GET[email]','$_GET[mensaje]','$date',1)")or die (mysqli_error($link));

	header('location: ../?message=send'); }


mysqli_close($link);
?>
