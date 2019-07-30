<?php

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Envasado.doc");


    $conexion=mysql_connect("localhost","root","");
    mysql_select_db("produccion",$conexion);   


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Proteinas Energeticos Y Oleos S.A de C.V</title>
</head>
<body>
<IMG src="proteo.jpg" align="Left"></IMG>
    <font size:5 color="azul" face="arial"><STRONG><CENTER>Proteinas Energeticos Y Oleos S.A DE C.V</CENTER></STRONG></font>
   <br>
   <br>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="5" bgcolor="skyblue"><CENTER><strong>REPORTE DE AREA DE PRODUCCION</strong></CENTER></td>
  </tr>
  <tr bgcolor="gray">
   <td><strong>Fecha</strong></td>
    <td><strong>Lote</strong></td>
    <td><strong>Alimento</strong></td>
    <td><strong>Toneladas</strong></td>
      <td><strong>Tipo</strong></td>
  </tr>';

  <?PHP
    
$sql=mysql_query("select fecha,lote,Alimento,toneladas,tipo from envasado");
while($res=mysql_fetch_array($sql)){    

  $fecha=$res["fecha"];
  $lote=$res["lote"];
  $Alimento=$res["Alimento"];
  $toneladas=$res["toneladas"]; 
   $tipo=$res["tipo"];      

?>  
 <tr>
  <td><?php echo $fecha; ?></td>
  <td><?php echo $lote; ?></td>
  <td><?php echo $Alimento; ?></td>
  <td><?php echo $toneladas; ?></td>
  <td><?php echo $tipo; ?></td>                     
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>