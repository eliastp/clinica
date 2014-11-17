<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<form action="FORMULARIO.php" method="post" name="formulario">
ID: <input type="text" name="id" /><br />
NOMBRE:<input type="text" name="nombre" />
<input type="submit" value="enviar" name="enviar" /> 

   </form>
   
 <?php 
 if (isset($_POST['enviar']));
 {
 include 'proyecto.php';
 $conexion=conectar();
 $id=$_POST['id'];
 $nombre=$_POST['nombre'];
 $sql="insert into usuarios (id, nombre) values (".$id.",'".$nombre."')";
 mysql_query($sql,$conexion);
 mysql_close($conexion);
 
 }
 
 ?>  
</body>
</html>
