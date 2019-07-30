<?php
 include('includes/conexion.php');
session_start();
if(isset($_REQUEST['e']) && !empty($_REQUEST['e'])){
	$e=$_REQUEST['e'];
	$p=MD5($_REQUEST['p']);
	$siesta=mysql_num_rows(mysql_query("SELECT * FROM usuario WHERE usu_user='".$e."' AND usu_pass='".$p."' "));
	if($siesta==1){
header("Location: inicio.php");
}else{
		echo '<script language="javascript">alert("usuario o contraseña incorrectos");</script>';
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PROTEO</title>
	<link rel="stylesheet"  href="css/style.css">
	<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
        <meta name="description" content="Elastislide - A Responsive Image Carousel" />
        <meta name="keywords" content="carousel, jquery, responsive, fluid, elastic, resize, thumbnail, slider" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
		<link rel="stylesheet" type="text/css" href="css/custom.css" />
		<script src="js/modernizr.custom.17475.js"></script>
</head>
<?php //include('includes/head.php'); ?>
<body >
<article>
<IMG src="imagen/proteo.jpg" align="Left"></IMG>
<body oncontextmenu="return false">
<div class="main">
				<header class="clearfix">	
					<h1>PROTEINAS,ENERGÈTICOS Y OLEOS,S.A DE C.V <span>Area de Producciòn</span></h1>
				</header>
<nav>
<center>
<fieldset>
<form class="Log" action="index.php" method="post" >
	<dd><h1>Iniciar sesion</h1>
	<label for="e">Usuario</label><br>
	<input type="text" name="e" placeholder="Introduzca usuario" required autofocus><br>
	<label for="p">Password</label><br>
	<input type="password" name="p" placeholder="Introduce Password" required><br><br>
	<input class="button" type="submit"  value="Iniciar">	</dd>
	<br><br>No tienes cuenta, <a class="button" href="Registrarse.php">Registrarse</a>
</fieldset>
</form></center>
</body>
</html>