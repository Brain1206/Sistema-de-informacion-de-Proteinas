<?php
include('includes/conexion.php');
session_start();

$borrartabla="TRUNCATE TABLE produccion";
mysql_query($borrartabla);


if (isset($borrartabla)) {
 	header("location:inicio.php");
 } 



?>