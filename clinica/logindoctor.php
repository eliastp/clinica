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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['textfield'])) {
  $loginUsername=$_POST['textfield'];
  $password=$_POST['textfield2'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "conecdoc.php";
  $MM_redirectLoginFailed = "logindoctor.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_uno, $uno);
  
  $LoginRS__query=sprintf("SELECT usuario, `contraseña` FROM doctores WHERE usuario=%s AND `contraseña`=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "-1")); 
   
  $LoginRS = mysql_query($LoginRS__query, $uno) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
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
  <table width="1065" height="230" border="1">
    <tr>
      <th scope="row"><span class="Estilo4 Estilo1">Clinica La Esperanza </span>        <div align="center"></div></th>
    </tr>
</table>
  <div align="center">
</div>
<div align="center"></div>
<div align="center">LOGIN DOCTOR
</div>
<form name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
  <div align="center">
    <table width="200" border="1">
      <tr>
        <td><div align="center">USUARIO</div></td>
        <td><div align="center">
          <label for="textfield3"></label>
          <input type="text" name="textfield" id="textfield3">
        </div></td>
      </tr>
      <tr>
        <td><div align="center">PASSWORD</div></td>
        <td><div align="center">
          <input type="text" name="textfield2" id="textfield">
        </div></td>
      </tr>
    </table>
    <p><img src="candado.png" width="128" height="128"></p>
    <p>
      <input type="submit" name="button" id="button" value="ENTRAR">
    </p>
  </div>
  <div align="center">
    <div align="center">
  <a href="doctor.php">ATRAS</a></div>
</form>
