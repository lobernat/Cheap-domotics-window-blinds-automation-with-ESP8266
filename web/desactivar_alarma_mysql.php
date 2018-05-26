<?php
include("connect.php");



//id alarma
$id = $_GET['id'];


$qProfile = "SELECT * FROM alarmes WHERE id='$id'  ";
$rsProfile = mysql_query($qProfile);
$row = mysql_fetch_array($rsProfile);
extract($row);

//Passar variable actiu
$estat = stripslashes($actiu);

echo $estat."De la base de dades";
//modificar valor actiu
if ($estat == "1") $actiu = "0";
if ($estat == "0") $actiu = "1";
//$actiu = 0;
echo $actiu ;

//comrpobar que nomes entra 1 o 0
if ($actiu == "1" || $actiu == "0")
{
$update = "UPDATE alarmes SET actiu = '$actiu' WHERE id='$id' ";
$rsUpdate = mysql_query($update);
if ($rsUpdate)
{
echo "Actualitzat correctament.";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0;URL=index.php\"> ";
} mysql_close();
}


//http://alarma.ibernat.com/desactivar_alarma_mysql.php?id=14&estat=1


?>