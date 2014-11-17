<?php require_once('../Connections/conexion.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_conexion, $conexion);
$query_Recordset1 = "SELECT * FROM cita";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $conexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo2 {font-size: 100px}
body {
	background-color: #0099CC;
}
-->
</style>
</head>

<body>
<div align="center">
  <table width="960" height="230" border="1">
    <tr>
      <th scope="row"><span class="Estilo2">Clinica la Esperanza </span>        <div align="center"></div></th>
    </tr>
  </table>
  <form id="form2" name="form2" method="post" action="">
    <label>
      <div align="left">
        <input type="submit" name="Submit" value="Atras" />
    </div>
    </label>
  </form>
  <p>&nbsp;</p>
</div>
<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  
  <table width="627" height="63" border="1">
    <tr>
      <td width="140">idunidad</td>
      <td width="140">identificacion doctor</td>
      <td width="171">fecha de atencion</td>
      <td width="150">identificacion de paciente</td>
    </tr>
    <?php do { ?>
      <tr>
        <td>&nbsp;</td>
        <td><?php echo $row_Recordset1['iddoctor']; ?></td>
        <td><?php echo $row_Recordset1['fechaatencion']; ?></td>
        <td><?php echo $row_Recordset1['idpaciente']; ?></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
  <label></label>
</form>


</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
