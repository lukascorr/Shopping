<?php
include ('../static/db/conection.php');

	//Opcion nuevo articulo
	if($_POST['newarticle']=='true'){

	$nombre=ucwords($_POST['nombre']);
	$descripcion=ucwords($_POST['descripcion']);
	$codigo=ucwords($_POST['codigo']);
	
	$target_path = "articles/img/";
	$target_path = $target_path . basename( $_FILES['imagen']['name']);
	if(move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path)) { echo "El archivo ". basename( $_FILES['imagen']['name']). " ha sido subido";}

	$sql3=$link->query("SELECT * FROM articulos where codigo='$codigo'");
	$sql4=$sql3->fetch_array(MYSQLI_ASSOC);

//Si es el mismo articulo actualizar el stock, nuevo precio...
	if ($codigo==$sql4['codigo'] and $_POST['categoria']==$sql4['idcategoria_a']){

	$sql5=$link->query("UPDATE articulos set stock=stock+'$_POST[cantidad]',precio_art='$_POST[precio]',imagen='warehouse/$target_path',condicion=1 where codigo='$codigo'");

	} 
	
//Si se agrega un nuevo articulo hacer..
	else{
	$sql1=$link->query("INSERT INTO articulos (codigo,nombre_art,descripcion,stock,precio_art,imagen,idcategoria_a,idproveedor_a,condicion) VALUES ('$codigo','$nombre','$descripcion','$_POST[cantidad]','$_POST[precio]','warehouse/$target_path','$_POST[categoria]','$_POST[proveedor]',1)")or die(mysqli_error($link)); }

	$sql2=$link->query("UPDATE deposito set cantidad=cantidad-$_POST[cantidad] where producto='$_POST[nombre]'")or die(mysqli_error($link));

header('location: ../index.php?id=purchases/deposit.php&successful');
}
//-------------------------------------------------------------------
	
	//Opcion nueva categoria
	if($_POST['newcategory']=='true'){

	$target_path = "categories/img/";
	$target_path = $target_path . basename( $_FILES['imagen']['name']);
	if(move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path)) { echo "El archivo ". basename( $_FILES['imagen']['name']). " ha sido subido";}

	$nombre=ucwords($_POST['nombre']);
	$descripcion=ucwords($_POST['descripcion']);

	$sql=$link->query("INSERT INTO categorias (tipo,descripcion_cat,imagen,condicion) VALUES ('$nombre','$descripcion','warehouse/$target_path',1)")or die (mysqli_error($link));

	header('location: ../index.php?id=warehouse/categories/list.php');
	}
//-------------------------------------------------------------------
	
mysqli_close($link);
?>
