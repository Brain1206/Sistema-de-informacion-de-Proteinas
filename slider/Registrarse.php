<?php
include('includes/conexion.php');
session_start();
if(isset($_REQUEST['usu_user']) && !empty($_REQUEST['usu_user'])){
	$usu=$_REQUEST['usu_user'];
	$p=md5($_REQUEST['usu_pass']);
	$checar="SELECT * FROM usuario WHERE usu_user='".$usu."'";
	$c=mysql_query($checar);
	$numfilas=mysql_num_rows($c);
	if($numfilas==1){
	}else{
		$mifoto=$usu.$p;
		$sql="INSERT INTO usuario VALUES('".$usu."','".$p."')";
		mysql_query($sql);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PROTEO</title>
	<link rel="stylesheet"  href="css/log.css">
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
<body oncontextmenu="return false"> 
<IMG src="imagen/proteo.jpg" align="Left"></IMG>
<article>
<div class="main">
				<header class="clearfix">	
					<h1>PROTEINAS,ENERGÈTICOS Y OLEOS,S.A DE C.V <span>Area de Producciòn</span></h1>
				</header>
<section class="reg">
<article><center>
     <fieldset>
	<form class="contacto" action="Registrarse.php" method="POST" enctype="multipart/form-data" >
		<h1>Registro</h1>
		<label for="usu_user">Usuario</label><br>
		<input type="text" name="usu_user" placeholder="Introduzca usuario" required autofocus><br>
		<label for="usu_pass">Password</label><br>
		<input type="password" name="usu_pass" placeholder="Introduce password" required><br>
		<br><br><input class="button" type="submit" value="Registrar">	
		<br><br><a class="button" href="index.php">Iniciar </a>
		</fieldset>
	</form>	</center>
	</article>
</section> 
</body>
</html>