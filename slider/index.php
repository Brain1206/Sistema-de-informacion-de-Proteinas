<?php
 include('includes/conexion.php');
session_start();
if(isset($_REQUEST['e']) && !empty($_REQUEST['e'])){
	$e=$_REQUEST['e'];
	$p=MD5($_REQUEST['p']);
	$siesta=mysql_num_rows(mysql_query("SELECT * FROM usuario WHERE usu_user='".$e."' AND usu_pass='".$p."' "));
	if($siesta==1){
	$_SESSION["autenticado"] = "SI";
    $_SESSION['user']=$e;
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
<body oncontextmenu="return false">
<script> alert("Bienvenidos"); </script>';
<article>
<IMG src="imagen/proteo.jpg" align="Left"></IMG>
</article>
<div class="main">
				<header class="clearfix">	
					<h1>PROTEINAS, ENERGÈTICOS Y OLEOS, S.A DE C.V <span>Area de Producciòn</span></h1>
					<nav class="codrops-demos">
						<a href="login.php">Login</a
						<a class="current-demo" href="index4.html">Galeria</a>
					</nav>
				</header>

				<div class="gallery">
					<!-- Elastislide Carousel -->
					<ul id="carousel" class="elastislide-list">
						<li data-preview="images/large/2.jpg"><a href="#"><img src="images/small/2.jpg" alt="image05" /></a></li>
						<li data-preview="images/large/1.jpg"><a href="#"><img src="images/small/1.jpg" alt="image06" /></a></li>
						<li data-preview="images/large/5.jpg"><a href="#"><img src="images/small/5.jpg" alt="image07" /></a></li>
						<li data-preview="images/large/6.jpg"><a href="#"><img src="images/small/6.jpg" alt="image12" /></a></li>
						<li data-preview="images/large/7.jpg"><a href="#"><img src="images/small/7.jpg" alt="image13" /></a></li>
					</ul>
					<!-- End Elastislide Carousel -->

					<div class="image-preview">
						<img id="preview" src="images/large/6.jpg" />
					</div>
				</div>

				<p><strong>Encargado del Area de Producciòn Por el Ing. Juan Francisco Urrutia</strong></p>
				<p class="info"><strong>Imagen:</strong> Planta de Produccion de Proteinas,Energèticos Y Oleos S.A DE C.V</p>

			</div>
		</div>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquerypp.custom.js"></script>
		<script type="text/javascript" src="js/jquery.elastislide.js"></script>
		<script type="text/javascript">
			
			// example how to integrate with a previewer

			var current = 0,
				$preview = $( '#preview' ),
				$carouselEl = $( '#carousel' ),
				$carouselItems = $carouselEl.children(),
				carousel = $carouselEl.elastislide( {
					current : current,
					minItems : 4,
					onClick : function( el, pos, evt ) {

						changeImage( el, pos );
						evt.preventDefault();

					},
					onReady : function() {

						changeImage( $carouselItems.eq( current ), current );
						
					}
				} );

			function changeImage( el, pos ) {

				$preview.attr( 'src', el.data( 'preview' ) );
				$carouselItems.removeClass( 'current-img' );
				el.addClass( 'current-img' );
				carousel.setCurrent( pos );

			}

</script>
</nav>
</body>
</html>