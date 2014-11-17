
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
<form id="form1" name="form1" method="GET" action="doctores.php">
 <div align="center">
          <th scope="col"><div align="center">DATOS DEL DOCTOR </div></th>
     
        <td><div align="center">
          <div align="center">
            <table width="286" border="1">
              <tr>
                <td width="106">CODIGO DOCTOR</td>
                  <td width="164"><div align="center">
                    <input type="text" name="id_doctor" id="iddoctor" />
                  </div></td>
                </tr>
              <tr>
                <td>NOMBRE</td>
                  <td><input type="text" name="nombre2" id="doctor" /></td>
                </tr>
              <tr>
                <td>ESPECIALIDAD</td>
                  <td><input type="text" name="especialidad" id="especialidad" /></td>
                </tr>
              </table>
          </div>
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
