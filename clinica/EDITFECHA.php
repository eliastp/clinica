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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE usuarios SET Doctor=%s, Unidad=%s WHERE id=%s",
                       GetSQLValueString($_POST['DOCTOR'], "text"),
                       GetSQLValueString($_POST['UNIDAD'], "text"),
                       GetSQLValueString($_POST['MODIFICAR'], "int"));

  mysql_select_db($database_uno, $uno);
  $Result1 = mysql_query($updateSQL, $uno) or die(mysql_error());

  $updateGoTo = "CONSULTACITAS.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['A'])) {
  $colname_Recordset1 = $_GET['A'];
}
mysql_select_db($database_uno, $uno);
$query_Recordset1 = sprintf("SELECT * FROM usuarios WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $uno) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>

<body>
<div align="center">
  <table width="958" height="230" border="1" align="center">
    <tr>
      <th width="948" scope="row"><span class="Estilo4 Estilo1 Estilo1">Clinica La Esperanza </span>        <div align="center"></div></th>
    </tr>
</table>
  
 
  <p align="center">MODIFICAR FECHAS </p>

<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <div align="center">
    <table width="200" border="1">
      <tr>
        <td><span id="sprytextfield1">
          <label for="ID2">ID USUARIO</label>
          <input name="ID" type="text" id="ID2" value="<?php echo $row_Recordset1['id']; ?>" />
        <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
      </tr>
      <tr>
        <td><span id="sprytextfield2">
          <label for="NOMBREU">NOMBRE USUARIO</label>
          <input name="NOMBREU" type="text" id="NOMBREU" value="<?php echo $row_Recordset1['Nombres']; ?>" />
        <span class="textfieldRequiredMsg"></span></span></td>
      </tr>
      <tr>
        <td><span id="sprytextfield3">
          <label for="DOCTOR">DOCTOR</label>
          <input name="DOCTOR" type="text" id="DOCTOR" value="<?php echo $row_Recordset1['Doctor']; ?>" />
        <span class="textfieldRequiredMsg"></span></span></td>
      </tr>
      <tr>
        <td><span id="sprytextfield4">
          <label for="UNIDAD">UNIDAD</label>
          <input name="UNIDAD" type="text" id="UNIDAD" value="<?php echo $row_Recordset1['Unidad']; ?>" />
        <span class="textfieldRequiredMsg"></span></span></td>
      </tr>
      <tr>
        <td><span id="sprytextfield5">
          <label for="FECHCITA">FECHA DE LA CITA</label>
          <input name="FECHCITA" type="text" id="FECHCITA" value="<?php echo $row_Recordset1['Fecha_consulta']; ?>" />
        <span class="textfieldRequiredMsg"></span></span></td>
      </tr>
    </table>
    <p>
      <input name="MODIFICAR" type="hidden" id="MODIFICAR" value="<?php echo $row_Recordset1['id']; ?>" />
    </p>
    <p>
      <input type="submit" name="button" id="button" value="MODIFICAR" />
    </p>
    <p><br />
    </p>
    <p>&nbsp;</p>
  </div>
  <div align="center"></div>
  <input type="hidden" name="MM_update" value="form1" />
</form>
<p align="center">&nbsp;</p>
  <p>&nbsp;</p>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["blur"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {validateOn:["blur"]});
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
