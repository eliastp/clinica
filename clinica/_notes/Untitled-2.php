<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<form id="form1" name="form1" method="GET" action="Untitled-2.php">

        <th scope="col"><div align="center">DATOS DEL DOCTOR </div></th>
     
        <td><div align="center">
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
          <div align="center"></div>
          <div align="center"></div>
          <div align="center"></div>
          <div align="center"></div>
        <div align="center"></div></td>
      </tr>
                  </table>
          <table width="200" border="1">
            <tr>
              <th scope="col">OTROS DATOS </th>
        <th scope="col">OBSERVACIONES</th>
        <th scope="col">DATOS PLANTA </th>
      </tr>
            <tr>
              <th scope="row"><table width="285" border="1">
            <tr>
              <td width="107">ID CITA</td>
              <td width="162"><input  name="id_cita" /></td>
            </tr>
            <tr>
              <td>FECHA INGRESO</td>
              <td><input type="text" name="fechaingreso" /></td>
            </tr>
            <tr>
              <td>ANTECEDENTES</td>
              <td><input name="antecedentes"></td>
            </tr>
            <tr>
              <td>ANALISIS</td>
              <td><input name="analisis"></td>
            </tr>
          </table></th>
        <td><table width="286" border="1">
            <tr>
              <td width="106">SINTOMA</td>
              <td width="164"><input type="text" name="sintoma"></td>
            </tr>
            <tr>
              <td>TRATAMIENTO</td>
              <td><input type="text" name="tratamiento"></td>
            </tr>
          </table></td>
        <td><table width="286" border="1">
            <tr>
              <td width="106">CODIGO UNIDAD</td>
              <td width="164"><input type="text" name="id_cita2"></td>
            </tr>
            <tr>
              <td>NOMBRE DE  UNIDAD</td>
              <td><input type="text" name="nombreunidad"></td>
            </tr>
            <tr>
              <td>PLANTA</td>
              <td><input type="text" name="planta"/></td>
            </tr>
          </table></td>
      </tr>
                  </table>
        </div>
  <p align="center">
    <input type="submit" name="insertar" value="INSERTAR">
  </p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
</form>
<div align="center">
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
</div>
</body>
</html>

