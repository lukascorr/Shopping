<?php
include ('../../static/db/conection.php');


	//Muestro mensaje de todas las notificaciones 
	if($_GET['notifications']=='true'){
	$sql=mysqli_query($link,"SELECT mensaje FROM notifications WHERE dni=$_GET[dni]");

	$read=mysqli_fetch_array($sql);
	echo $read['mensaje'];	}
	

mysqli_close($link);