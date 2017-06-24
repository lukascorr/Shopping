<?php
session_start();
 
include '../static/db/conection.php';

	$sql =$link->query("UPDATE usuarios SET estado='Inactivo' where usuario=$_SESSION[user]");

mysqli_close($link);

	unset ($SESSION['user']);
	session_destroy();


header('Location: ../');
	 
?>
