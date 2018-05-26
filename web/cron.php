<?php

/*
//Calcular posta de sol a Sabadell 41.544014, 2.111865
$hora_posta_sol = date_sunset(time(), SUNFUNCS_RET_STRING, 41.5, 2.11, 90, 2);
echo ' Posta de sol: ' .$hora_posta_sol;
$hora_actual = date('H:i');
//$hora_actual = date('19:19');
echo "<br>Ara son: ".$hora_actual;
if ($hora_actual == $hora_posta_sol) {
    echo "<br>Tancar finestres";
 }
else {
    echo "<br>No fer res";
}

//api per pluja
http://api.openweathermap.org/data/2.5/weather?q=sabadell&APPID=08ed0d94cc25afd335fff14fef7c69e1

*/
?>






<?php

echo "Hora Actual ".date('H:i:s');

//http://alarma.ibernat.com/editar_alarma.php?id=6
//<a href="editar_alarma.php?id=6" >Editar</a>
//http://alarma.ibernat.com/editar_alarma.php?id=6
//http://alarma.ibernat.com/desactivar_alarma_mysql.php?id=14&estat=1
        
include("connect.php");
$query="SELECT * FROM alarmes ORDER BY data ";
$result=mysql_query($query);
$num = mysql_num_rows ($result);
mysql_close();






//alarmes actives


if ($num > 0 ) {
$i=0;
$index=1;
$total=0;
while ($i < $num) {
$id = mysql_result($result,$i,"id");
$actiu = mysql_result($result,$i,"actiu");
$data = mysql_result($result,$i,"data");
if ($data != "0000-00-00") $data = date("Y-m-d", strtotime($data));
$hora = mysql_result($result,$i,"hora");
//per borrar els segons
$hora = date("H:i", strtotime($hora));    
$dl = mysql_result($result,$i,"dl");
$dm = mysql_result($result,$i,"dm");
$dc = mysql_result($result,$i,"dc");
$dj = mysql_result($result,$i,"dj");
$dv = mysql_result($result,$i,"dv");
$ds = mysql_result($result,$i,"ds");
$dg = mysql_result($result,$i,"dg");
$accio = mysql_result($result,$i,"accio");
$temps = mysql_result($result,$i,"temps");
$dormitori = mysql_result($result,$i,"dormitori");
$escriptori = mysql_result($result,$i,"escriptori");
$menjador = mysql_result($result,$i,"menjador");
$hora_actual = date('H:i'); 
//retornar dia de la setmana amb numero dilluns 1 diumenge 7
$Diasetmana = date('N', strtotime($data));
$DiaSetmanaAvui = date("N");
$diesactius = array($dl, $dm, $dc, $dj, $dv, $ds, $dg);
    
//print_r($diesactius);
//echo "<br>".$diesactius[0]."<br><p>";

    
//echo "<br>".date('N', strtotime('2016-10-08'));  
//echo "<br>Dia de la setmana avui -> ".$Diasetmana." --> ".$data;
 
//zones afectades
$zones = null;
    if ($escriptori == 1) $zones .= 'e';
    if ($menjador == 1) $zones .= 'm';
    if ($dormitori == 1) $zones .= 'd'; 

//Ajuntar variables en una per a enviar el parametre sencer
$parametre = $dormitori.$escriptori.$menjador.$accio.$temps;
    
//Alarmes actives 
if ($hora == $hora_actual && $actiu == 1 && $zones != null  ){

        if ($data != "0000-00-00" && date("Y-m-d") == $data){
        Desactivar_Alarma();
        Disparar_Alarma();
        echo "<br>Alarma disparada per data i hora<br>";
        } 
       elseif (Dies_Actius($DiaSetmanaAvui) == 1)
        {
            Disparar_Alarma();
            echo "<br>Alarma disparada per recurrent dia setmana";
        }
        elseif (algundiaactiu() == 0)
        {
            Disparar_Alarma();
            echo "<br>Alarma disparada per recurrent hora diàri";
        }
  
  
    }

//strtotime($str)
++$i; } } else { echo "No hi ha dades a mostrar"; }


//Funcio desactivar
function Desactivar_Alarma(){
    global $id;
    $URL_editar= "http://192.168.1.5/desactivar_alarma_mysql.php?id=".$id."&estat=0";
    $enviarDades = file_get_contents($URL_editar);
    echo "<br>alarma desactivada funcio id".$id;
}


//disparar alarma
function Disparar_Alarma(){
    global $id, $parametre ;
	
   // $URL_disparar = "http://pis.flnet.org/index.php?zones=".$zones."/";
    $URL_disparar = "http://192.168.1.2/?codi=".$parametre;
	
    $enviarDades = file_get_contents($URL_disparar);
    echo "<br>url a disparar ".$URL_disparar;
    
  /*  
    	// The message
	$message = "Alarma ID:". $id ." Parametre URL:".$parametre;
	// In case any of our lines are larger than 70 characters, we should use wordwrap()
	$message = wordwrap($message, 70, "\r\n");
	// Send
	mail('esp8266@ibernat.com', 'Alarma persianes', $message);
  */  
    
}


//funcio comprobar dies alarma activat
function Dies_Actius($dia_actiu){
    echo "<br>Dia actiu ". $dia_actiu;
    global $dl, $dm, $dc, $dj, $dv, $ds, $dg;
    $diesactius = array(0, $dl, $dm, $dc, $dj, $dv, $ds, $dg);
    echo "<br>Funcio Dies_actius retorn ".$diesactius[$dia_actiu];
    return $diesactius[$dia_actiu];
 }   

//funcio comprobar si hi ha algun dels dies marcats
function algundiaactiu(){
    global $dl, $dm, $dc, $dj, $dv, $ds, $dg;
    $diesactius = array($dl, $dm, $dc, $dj, $dv, $ds, $dg);
    echo "<br>Suma valors array".array_sum($diesactius);
    return array_sum($diesactius);
 }   

include 'sol.php';

?>  
