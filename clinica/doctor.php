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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO doctores (nombre, especialidad) VALUES (%s, %s)",
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['especialidad'], "text"));

  mysql_select_db($database_uno, $uno);
  $Result1 = mysql_query($insertSQL, $uno) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO doctores (nombre, especialidad, usuario, contraseña) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['especialidad'], "text"),
                       GetSQLValueString($_POST['usuario'], "text"),
                       GetSQLValueString($_POST['contrasea'], "text"));

  mysql_select_db($database_uno, $uno);
  $Result1 = mysql_query($insertSQL, $uno) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO doctores (nombre, especialidad, usuario, contraseña) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['especialidad'], "text"),
                       GetSQLValueString($_POST['usuario'], "text"),
                       GetSQLValueString($_POST['contrasea'], "text"));

  mysql_select_db($database_uno, $uno);
  $Result1 = mysql_query($insertSQL, $uno) or die(mysql_error());

  $insertGoTo = "REGISTRODOCTOR.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO doctores (id_doctor, nombre, especialidad, usuario, contraseña) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_doctor'], "int"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['especialidad'], "text"),
                       GetSQLValueString($_POST['usuario'], "text"),
                       GetSQLValueString($_POST['contrasea'], "text"));

  mysql_select_db($database_uno, $uno);
  $Result1 = mysql_query($insertSQL, $uno) or die(mysql_error());
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
body {
	background-color: #0099CC;
}
-->
</style></head>

<body>
<p>&nbsp;</p>
<p align="center">CLINICA LA ESPERANZA </p>
<p align="center">&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="POST" name="form" >
<table width="268" border="1" align="center">
  <tr>
    <td width="76"><div align="center"><a href="logindoctor.php">INICIAR SESION</a><a href="paginainicio.php"></a></div></td>
    <td width="76"><div align="center"><a href="index.php">ATRAS</a></div></td>
  </tr>
</table>
<p align="center">
  <label></label>
</p>
</form>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Id_doctor:</td>
      <td><input type="text" name="id_doctor" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nombre:</td>
      <td><input type="text" name="nombre" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Especialidad:</td>
      <td><input type="text" name="especialidad" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Usuario:</td>
      <td><input type="text" name="usuario" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Contraseña:</td>
      <td><input type="password" name="contrasea" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="REGISTRARSE"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
