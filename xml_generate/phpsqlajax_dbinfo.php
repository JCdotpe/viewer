<?php

$servidor = "192.168.194.167";
$usuario = "jsancheza";
$password = "123456";
$bd = "CIE2013"; 

$bdconexion = mssql_connect($servidor, $usuario, $password) or die("Error:" . mssql_get_last_message());
mssql_select_db($bd, $bdconexion) or die("Error ". mssql_get_last_message());
// mssql_query ("SET NAMES 'utf8'");

// $bdconexion_PDO = new PDO("mysql:host=$servidor;dbname=$bd", $usuario, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


?>