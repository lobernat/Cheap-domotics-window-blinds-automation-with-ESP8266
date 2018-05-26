<?php
include("connect.php");



//id alarma
$id = 1;


$offset_sortida = $_POST['offset_sortida'];
$offset_posta = $_POST['offset_posta'];
$activar_sortida = $_POST['activar_sortida'];
$activar_posta = $_POST['activar_posta'];



$update = "UPDATE sol SET id = '$id', offset_sortida = '$offset_sortida', offset_posta = '$offset_posta', activar_sortida = '$activar_sortida', activar_posta = '$activar_posta' WHERE id='$id' ";
$rsUpdate = mysql_query($update);
if ($rsUpdate)
{
echo "Actualitzat correctament.";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1;URL=sol.php\"> ";
} mysql_close();

?>