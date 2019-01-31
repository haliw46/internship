<?php
$host = 'localhost';
$user = 'root';
$password = '12345678';
$database = 'internship';

mysql_connect($host, $user, $password);
mysql_select_db($database);
mysql_query("SET NAMES UTF8");