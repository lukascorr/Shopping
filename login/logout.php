<?php
session_start();
 
include '../static/db/conection.php';

	$sql =$link->query("UPDATE usuarios SET estado='Inactivo' where dni=$_SESSION[id]");

mysqli_close($link);

	unset ($SESSION['id']);
	session_destroy();


header('Location: ../');
	 
?>
