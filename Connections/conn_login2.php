<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn_login2 = "localhost";
$database_conn_login2 = "scuba2u";
$username_conn_login2 = "root";
$password_conn_login2 = "";
$conn_login2 = mysql_pconnect($hostname_conn_login2, $username_conn_login2, $password_conn_login2) or trigger_error(mysql_error(),E_USER_ERROR); 
?>