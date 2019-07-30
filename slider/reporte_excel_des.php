<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ReporteDescarga.xls");


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
<IMG src="imagen/proteo.jpg" align="Left"></IMG>
    <font size=tamaño:10 color="azul" face="Elephant"><STRONG><CENTER>Proteinas,Energèticos Y Oleos,S.A DE C.V</CENTER></STRONG></font>
   <br>
   <br>
<table width="35%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" bgcolor="skyblue"><CENTER><strong>Reporte del Area Descarga</strong></CENTER></td>
  </tr>
  <tr bgcolor="gray">
    <td><strong>Materia</strong></td>
    <td><strong>Toneladas</strong></td>
  </tr>
  
<?PHP
		

$sql=mysql_query("select materia,toneladas from descarga");
while($res=mysql_fetch_array($sql)){		

	$materia=$res["materia"];
	$toneladas=$res["toneladas"];
					

?>  
 <tr>
	<td><?php echo $materia; ?></td>
	<td><?php echo $toneladas; ?></td>                    
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>