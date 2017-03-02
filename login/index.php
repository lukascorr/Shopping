<?php
session_start();
  
if (isset($_SESSION['id'])) {
  
  header("Location: ../"); }

else {

//Declaracion de variable "id" para el contenido dinamico.
if (isset($_GET['id'])){
  $variable=$_GET['id'];}
  
else{ $variable="login.html";} 

$title='Bienvenido | Shopping'; ?>
 
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8" http-equiv="X-UA-Compatible" content="IE=edge">

  <title><?php echo $title;?></title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="../static/css/font-awesome.css">
  <link rel="stylesheet" href="../static/css/AdminLTE.css">
  <link rel="stylesheet" href="../static/css/skin.css">
  <link rel="shortcut icon" href="../static/img/favicon.ico">
  <link rel="stylesheet" href="../static/css/bootstrap.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

  <script src="../static/js/jQuery-2.1.4.min.js"></script>
  <script src="../static/js/bootstrap.min.js"></script>
  <script src="../static/js/app.js"></script>

</head>
<body class="hold-transition skin-blue login-page">

  <header class="main-header">

    <a href="../" class="logo">
      <span class="logo-lg"><b>Shopping</b></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
    </nav>
  </header>


  <?php  include($variable); ?>
  
</body>
</html>

<?php }  ?>