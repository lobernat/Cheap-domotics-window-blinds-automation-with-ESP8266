<?php
include("connect.php");



//id alarma
$id = $_POST['id'];

//dia en que sonarà l'alarma
$any = $_POST['any'];
$mes = $_POST['mes'];
$dia = $_POST['dia'];
$data = null;
if ($dia != null) $data = $any."-".$mes."-".$dia;
if ($dia != "00") $data = $any."-".$mes."-".$dia;

//Hora en que sonarà l'alarma
$hora = $_POST['hora'];
$minut = $_POST['minut'];
$hora_minut = $hora.":".$minut.":00";

//els dies de la setmana que ha de sonar
$dilluns = $_POST['dilluns'];
$dimarts = $_POST['dimarts'];
$dimecres = $_POST['dimecres'];
$dijous = $_POST['dijous'];
$divendres = $_POST['divendres'];
$dissabte = $_POST['dissabte'];
$diumenge = $_POST['diumenge'];

//les habitaions que ha d'actuar
$dormitori = $_POST['dormitori'];
$escriptori = $_POST['escriptori'];
$menjador = $_POST['menjador'];

//si l'alarma està activa o no
$actiu = $_POST['estat'];

//Pujar(1)  baixar(0) persiana
$accio = $_POST['accio'];

//temps de l'accio
$temps = $_POST['temps'];

//Si sha marcat algun dia la data es posa a 0000-00-00
if ($dilluns == "1" || $dimarts == "1" || $dimecres == "1" || $dijous == "1" || $divendres == "1" || $dissabte == "1" || $diumenge == "1" ) $data = null;



$update = "UPDATE alarmes SET id = '$id', actiu = '$actiu', disparat = '0', data = '$data', hora = '$hora_minut', dl = '$dilluns', dm = '$dimarts', dc = '$dimecres', dj = '$dijous', dv = '$divendres', ds = '$dissabte', dg = '$diumenge', accio = '$accio', temps = '$temps', escriptori = '$escriptori', menjador = '$menjador', dormitori = '$dormitori' WHERE id='$id' ";
$rsUpdate = mysql_query($update);
if ($rsUpdate)
{
echo "Actualitzat correctament.";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0;URL=index.php\"> ";
} mysql_close();

?>