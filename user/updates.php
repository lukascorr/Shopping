<?php 
session_start();
include '../static/db/conection.php';


	//Opcion modificacion de usuario
	if ($_POST['profile']=='true') {
	$sql =mysqli_query($link,"UPDATE usuarios SET nombre='$_POST[nombre]',apellido='$_POST[apellido]',dni='$_POST[dni]',email='$_POST[email]',localidad='$_POST[localidad]',telefono='$_POST[telefono]' WHERE usuario=$_SESSION[user]");
	}


	//Opcion modificacion de cuenta
	if($_POST['account']=='true'){
	$sql1 =mysqli_query($link,"UPDATE usuarios SET usuario='$_POST[usuario]' WHERE usuario=$_SESSION[user]");

    $clave1 = $_POST['password1'];
    $clave2 = $_POST['password2'];

    if (($clave1 == $clave2) and ($clave1 and $clave2 != '')){
	$sql2=mysqli_query($link,"UPDATE usuarios SET password='$clave1' WHERE usuario=$_SESSION[user]");
     }	}


    //Opcion de alta de imagen
     if($_POST['newimage']=='true'){

		//Subo la imagen al servidor
		$target_path = "img/";
		$target_path = $target_path . basename( $_FILES['imagen']['name']);
		if(move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path)) { echo "El archivo ". basename( $_FILES['imagen']['name']). " ha sido subido";}

		//Subo la direccion donde se encuentra la imagen a la base de datos
		$sql=mysqli_query($link,"UPDATE usuarios SET imagen= 'user/$target_path' WHERE usuario=$_SESSION[user]"); 
	}


header('location: ../index.php?id=user/profile.php');
mysqli_close($link);
?>