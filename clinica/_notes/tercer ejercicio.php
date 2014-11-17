<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
date_default_timezone_set('america/bogota');
echo date ("G:i:s a"), "<br>";
$hora = date("G");
if ($hora>=6&& $hora < 12)
{
echo 'hola, bueos dias';
}
else
{
if ($hora>12&& $hora<18)
{
echo 'hola, buenas tardes';
}

else
{
if ($hora >18)
{
echo ('hola, buenas noches');
}
}
}

?>
</body>
</html>
