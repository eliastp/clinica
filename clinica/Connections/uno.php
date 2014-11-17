<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_uno = "localhost";
$database_uno = "mysql";
$username_uno = "root";
$password_uno = "";
$uno = mysql_pconnect($hostname_uno, $username_uno, $password_uno) or trigger_error(mysql_error(),E_USER_ERROR); 
?>