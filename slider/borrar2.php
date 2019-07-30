<?php
include('includes/conexion.php');
session_start();

$borrartabla="TRUNCATE TABLE envasado";
mysql_query($borrartabla);

if (isset($borrartabla)) {
 	header("location:envasado.php");
 } 



?>