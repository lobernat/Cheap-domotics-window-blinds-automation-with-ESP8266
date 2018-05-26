<?php 
/// In order to use this script freely
/// you must leave the following copyright
/// information in this file:
/// Copyright 2006 www.turningturnip.co.uk
/// All rights reserved.

include("connect.php");

$id = $_GET['id'];

$delete = "DELETE FROM alarmes WHERE id='$id' ";
mysql_query($delete);
mysql_close();

echo "Borrat correctament";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0;URL=index.php\"> ";

//http://alarma.ibernat.com/eliminar_alarma_mysql.php?id=14
?>