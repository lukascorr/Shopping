<?php
include '../static/db/conection.php';

	//Opcion eliminar usuario
	if($_GET['deleteuser']=='true'){
	$sql1=mysqli_query($link,"UPDATE usuarios SET condicion=0 where dni=$_GET[dni]");

	header('location: ../index.php?id=admin/users/registers.php&deleted');
	}

	//Opcion eliminar proveedor
	if($_GET['deleteprovide']=='true'){
	$sql2=mysqli_query($link,"UPDATE proveedores SET condicion=0 where idproveedor=$_GET[idproveedor]");
	header('location: ../index.php?id=admin/provides/registers.php&deleted');
	}

	//Opcion eliminar notificaciones temporales
	if($_GET['deletenotifications']=='true'){
	 $sql3=mysqli_query($link,"UPDATE notifications SET condicion=0");
	header('location: ../index.php?id=admin/notifications/now.php');
	}


mysqli_close($link);
?>