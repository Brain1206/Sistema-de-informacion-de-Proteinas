<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte_Produccion.xls");


		$conexion=mysql_connect("localhost","root","");
		mysql_select_db("produccion");		


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Proteinas Energeticos Y Oleos S.A DE C.V</title>
</head>
<body>
<IMG src="imagen/word.png" align="Left">
    <font size="3" color="azul" face="Elephant"><STRONG><CENTER>Proteinas Energeticos Y Oleos S.A DE C.V</CENTER></STRONG></font>
   <br>
   <br>
<table width="45%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="6" bgcolor="skyblue"><CENTER><strong>Reporte Del Area Produccion</strong></CENTER></td>
  </tr>
  <tr bgcolor="gray">
     <td><strong>Fecha</strong></td>
    <td><strong>Lote</strong></td>
    <td><strong>Presentacion</strong></td>
    <td><strong>Toneladas</strong></td>
    <td><strong>Tipo</strong></td>
    <td><strong>Turno</strong></td>
  </tr>
  
<?PHP
		

$sql=mysql_query("select fecha,lote,presentacion,toneladas,tipo,turno from produccion");
while($res=mysql_fetch_array($sql)){		

	$fecha=$res["fecha"];
  $lote=$res["lote"];
	$presentacion=$res["presentacion"];
	$toneladas=$res["toneladas"];
	$tipo=$res["tipo"];
  $turno=$res["turno"];
					

?>  
 <tr>
  <td><?php echo $fecha; ?></td>
	<td><?php echo $lote; ?></td>
	<td><?php echo $presentacion;?></td>
	<td><?php echo $toneladas; ?></td>
	<td><?php echo $tipo; ?></td>    
  <td><?php echo $turno; ?></td>                  
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>