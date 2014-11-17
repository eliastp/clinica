<?php

  function conectar(){
	  $conexion = mysql_connect("localhost","root") or die ("Conexion no establecida");
	 mysql_select_db("clinica", $conexion) or die ("No se encontro la base de datos");
	  return $conexion;
	  
	   
	 
  }
?>