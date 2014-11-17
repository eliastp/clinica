<?php


function Conectar (){
$conexion = mysql_connect ("localhost","root") or die ("conexion no establecida");
mysql_select_db ("clinica",$conexion) or die ("No se puede seleccionar la base de datos");
return $conexion;

}

?>
