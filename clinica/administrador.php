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

if (isset($_POST['admin'])) {
  $loginUsername=$_POST['admin'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "paginainicio.php";
  $MM_redirectLoginFailed = "administrador.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_uno, $uno);
  
  $LoginRS__query=sprintf("SELECT usuario, `contraseña` FROM login WHERE usuario=%s AND `contraseña`=%s",
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
body {
	background-color: #0099CC;
	background-image: url();
}
.Estilo9 {font-size: 90px}
.Estilo10 {
	font-size: 18px;
	color: #333333;
}
-->
</style>
</head>

<body>
<table width="837" height="258" border="1" align="center">
  <tr>
    <th width="830" scope="row"><span class="Estilo9">Clinica La Esperaza </span></th>
  </tr>
</table>
<p>&nbsp;</p>
<form id="form2" name="form2" method="POST" action="<?php echo $loginFormAction; ?>">
  <label>
  <table width="200" border="1">
    <tr>
      <td height="23"><a href="index.php" class="Estilo10">PAGINA PRINCIPAL</a> </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <div align="center"><br />
      <table width="281" border="1" align="center">
        <tr>
          <td width="82"><strong>Usuario:</strong></td>
          <td width="226"><div align="center">
              <input name="admin" type="text" id="admin" size="30" />
          </div></td>
        </tr>
        <tr>
          <td><strong>Contrase&ntilde;a:</strong></td>
          <td><input name="password" type="password" id="password" size="30" /></td>
        </tr>
      </table>
    <br />
      <input type="submit" name="Submit" value="Ingresar" />
  </div>
  </label>
</form>
<p align="center">&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center">&nbsp;</p>
</body>
</html>
