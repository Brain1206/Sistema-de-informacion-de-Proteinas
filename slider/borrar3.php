<?php
include('includes/conexion.php');
session_start();



$borrartabla="TRUNCATE TABLE descarga";
mysql_query($borrartabla);

if (isset($borrartabla)) {
 	header("location:descarga.php");
 } 



?>