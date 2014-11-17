
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
body {
	background-color: #CCC;
}
body,td,th {
	color: #666666;
}
</style>
</head>

<body>
<h1 align="center">FORMULARIO DE REGISTRO</h1>
<form id="form1" name="form1" method="GET" action="usuarios.php">

        <div align="center">
          <table width="1042" border="1">
            <tr>
              <th scope="col">DATOS DEL PACIENTE </th>
       
      </tr>
            <tr>
              <th scope="row"><div align="center">
                <table width="285" border="1">
              <tr>
                <td width="107">CEDULA USUARIO</td>
                <td width="162"><input  name="id_usuario" /></td>
              </tr>
              <tr>
                <td>NOMBRE</td>
                <td><input type="text" name="nombre" /></td>
              </tr>
              <tr>
                <td>EDAD</td>
                <td><input name="edad" /></td>
              </tr>
              <tr>
                <td>PESO</td>
                <td><input name="peso" /></td>
              </tr>
              <tr>
                <td>SEXO</td>
                <td><input type="text" name="sexo" /></td>
              </tr>
                          </table>
						  <p align="center">
    <input type="submit" name="insertar" value="INSERTAR">
  </p>
						  </form>

  <?php
if (isset($_GET['insertar']))
{
include 'Proyecto.php';
$conexion=conectar();

$id_usuario=$_GET['id_usuario'];
$nombre=$_GET['nombre'];
$edad=$_GET['edad'];
$peso=$_GET['peso'];
$sexo=$_GET['sexo'];

$sql="insert into usuarios(id_usuario, nombre, edad, peso, sexo) values (".$id_usuario.",'".$nombre."','".$edad."','".$peso."','".$sexo."')";
echo $sql;
mysql_query($sql, $conexion);
mysql_close($conexion);
}
?>
</body>
</html>
