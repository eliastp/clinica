<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>funcion</title>
</head>

<body>
<?php
$cadena= $_REQUEST['archivo'];
$a=stristr($cadena, '.');
$b=ltrim($a, '.' );
$c=strtoupper($b);
 if ($c== 'PDF') {
 echo "el archivo seleccionado es de adobe PDF";
 }
 else if ($c== 'TXT') {
  echo "el archivo seleccionado es un documento de texto";
  }
   else if ($c== 'HTM') {
  echo "el archivo seleccionado es un documento HTML";
  }
   else if ($c== 'PPT') {
  echo "el archivo seleccionado es un documento microsoft power point;";
  }
   else if ($c== 'DOC') {
  echo "el archivo seleccionado es un documento de microsoft word";
  }
   else if ($c== 'GIF') {
  echo "el archivo seleccionado es una imagen GIF";
  }
   else if ($c== 'JPG') {
  echo "el archivo seleccionado es una imagen JPG";
  }
  else { 
echo "el archivo seleccionado es ", $c;
}
?>
</body>
</html>
