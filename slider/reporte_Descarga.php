<?php

		require_once("dompdf/dompdf_config.inc.php");
		mysql_connect("localhost","root","");
		mysql_select_db("produccion");


$codigoHTML='

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Proteinas Energeticos Y Oleos S.A de C.V</title>
</head>
<body>
<IMG src="imagen/proteo.jpg" align="Left"></IMG>
    <font size=tamaño:10 color="azul" face="algerian"><STRONG><CENTER>Proteinas Energeticos Y Oleos S.A DE C.V</CENTER></STRONG></font>
   <br>
   <br>
<table width="80%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" bgcolor="skyblue"><CENTER><strong>REPORTE DE AREA DE DESCARGA</strong></CENTER></td>
  </tr>
  <tr bgcolor="gray">
    <td><strong>Materia</strong></td>
    <td><strong>Toneladas</strong></td>
  </tr>';


$sql=mysql_query("select materia,toneladas from descarga");
while($res=mysql_fetch_array($sql)){
$codigoHTML.='	
	<tr>
		<td>'.$res['materia'].'</td>
		<td>'.$res['toneladas'].'</td>							
	</tr>';
	
}
$codigoHTML.='
</table>
</body>
</html>';

$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_Descarga.pdf");

?>