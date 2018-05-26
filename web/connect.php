<?php
/// For the following details,
/// please contact your server vendor

$hostname='localhost'; //// specify host, i.e. 'localhost'
$user='DATABASEUSER'; //// specify username
$pass='password'; //// specify password
$dbase='DATABASENAME'; //// specify database name
$connection = mysql_connect("$hostname" , "$user" , "$pass") 
or die ("Can't connect to MySQL");
$db = mysql_select_db($dbase , $connection) or die ("Can't select database.");
?>