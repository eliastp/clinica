<?php 
function Conectarse() 
{ 
   if (!($link=mysql_connect("localhost","root"))) 
   { 
      echo "Error conectando a la base de datos."; 
      exit(); 
   } 
   if (!mysql_select_db("clinica",$link)) 
   { 
      echo "Error seleccionando la base de datos."; 
      exit(); 
   } 
   return $link; 
} 
?>


<html> 
<head>  
</head> 
<body> 
<H1>CONSULTA</H1> 
<?php 
   include("Proyecto.php"); 
   $link=Conectarse(); 
   $result=mysql_query("select * from usuarios",$link); 
?> 
   <TABLE BORDER=1 CELLSPACING=1 CELLPADDING=1> 
      <TR><TD>&nbsp;id</TD><TD>&nbsp;identificacion&nbsp;</TD><TD>&nbsp;nombres&nbsp;</TD><TD>&nbsp;edad&nbsp;</TD><TD>&nbsp; sintoma&nbsp;</TD><TD>&nbsp;tratamiento&nbsp;</TD><TD>&nbsp;fecha de ingreso&nbsp;</TD></TR> 
<?php       

   while($row = mysql_fetch_array($result)) { 
      printf("<tr><td>&nbsp;%s</td><td>&nbsp;%s</td><td>&nbsp;%s</td><td>&nbsp;%s</td><td>&nbsp;%s&nbsp;</td><td>&nbsp;%s&nbsp;</td><td>&nbsp;%s&nbsp;</td>o</tr>", $row["id_usuario"],$row["identificacion"],$row["nombre"],$row["edad"],$row["sintoma"],$row["tratamiento"],$row["fechaingreso"]); 
   } 
   mysql_free_result($result); 
   mysql_close($link); 
?> 
</table> 
</body> 
</html> 
