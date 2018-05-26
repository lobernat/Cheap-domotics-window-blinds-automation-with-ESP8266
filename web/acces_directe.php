<?php

// http://alarma.ibernat.com/acces_directe.php?codi=100105

if ($_GET['codi'] != null) $parametre = $_GET['codi'];
if ($_GET['Dormitori_1_pam'] != null)$parametre = $_GET['Dormitori_1_pam'];
	
   // $URL_disparar = "http://pis.flnet.org/index.php?zones=".$zones."/";
    $URL_disparar = "http://192.168.1.2/?codi=".$parametre;
	
    $enviarDades = file_get_contents($URL_disparar);
    echo "<br>url a disparar ".$URL_disparar;
    
    echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0;URL=index.php\"> ";
    

?>

<html>
		<head><meta content="text/html; charset=utf-8">
		<title>Control de Persianes</title></head>		
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        </head>

</html>