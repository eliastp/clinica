<?php require_once('Connections/uno.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO usuarios (id, Nombres, Edad, Peso, Sexo, Doctor, Unidad, Fecha_consulta) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['Nombres'], "int"),
                       GetSQLValueString($_POST['Edad'], "int"),
                       GetSQLValueString($_POST['Peso'], "int"),
                       GetSQLValueString($_POST['Sexo'], "text"),
                       GetSQLValueString($_POST['Doctor'], "text"),
                       GetSQLValueString($_POST['Unidad'], "text"),
                       GetSQLValueString($_POST['Fecha_consulta'], "date"));

  mysql_select_db($database_uno, $uno);
  $Result1 = mysql_query($insertSQL, $uno) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO usuarios (id, Nombres, Edad, Peso, Sexo, Doctor, Unidad, Fecha_consulta) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['Nombres'], "int"),
                       GetSQLValueString($_POST['Edad'], "int"),
                       GetSQLValueString($_POST['Peso'], "int"),
                       GetSQLValueString($_POST['Sexo'], "text"),
                       GetSQLValueString($_POST['Doctor'], "text"),
                       GetSQLValueString($_POST['Unidad'], "text"),
                       GetSQLValueString($_POST['Fecha_consulta'], "date"));

  mysql_select_db($database_uno, $uno);
  $Result1 = mysql_query($insertSQL, $uno) or die(mysql_error());

  $insertGoTo = "final.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_uno, $uno);
$query_Recordset1 = "SELECT * FROM doctores";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $uno) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo1 {font-size: 100px}
body {
	background-color: #0099CC;
}
-->
</style>
</head>

<body>
<div align="center">
  <table width="1023" height="230" border="1">
    <tr>
      <th scope="row"><span class="Estilo4 Estilo1">Clinica La Esperanza </span>        <div align="center"></div></th>
    </tr>
</table>
<div align="center">
  

<div align="center"></div>
<form >
<table width="221" border="0" align="center">
  <tr>
  <td width="135"><div align="center"><a href="index.php">VOLVER AL MENU</a></div></td>
  </tr>
</table>
<p>
  <label></label>
</p>
</form>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
</form>
<form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id:</td>
      <td><input type="text" name="id" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nombres:</td>
      <td><input type="text" name="Nombres" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Edad:</td>
      <td><input type="text" name="Edad" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Peso:</td>
      <td><input type="text" name="Peso" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Sexo:</td>
      <td><input type="text" name="Sexo" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Doctor:</td>
      <td><input type="text" name="Doctor" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Unidad:</td>
      <td><input type="text" name="Unidad" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fecha_consulta:</td>
      <td><input type="text" name="Fecha_consulta" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><div align="center">
        <input type="submit" value="GRABAR CITA" />
      </div></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form2" />
</form>
<p>&nbsp;</p>
<p align="center">CONSULTA DE UNIDAD Y DOCTORES</p>
<div align="center">
  <table width="396" border="1">
    <tr>
      <td width="135"><div align="center">DOCTOR</div></td>
      <td width="245"><div align="center">UNIDAD</div></td>
    </tr>
    <?php do { ?>
      <tr>
        <td><div align="center"><?php echo $row_Recordset1['nombre']; ?></div></td>
        <td><div align="center"><?php echo $row_Recordset1['especialidad']; ?></div></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</div>
<div align="center"></div>
<div align="center"></div>
<p align="center">&nbsp;</p>
<div align="center"></div>
<div align="center"></div>
<p align="center">&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
