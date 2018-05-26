<?php


include("connect.php");
$id = 1;





$qProfile = "SELECT * FROM sol WHERE id='$id'  ";
$rsProfile = mysql_query($qProfile);
$row = mysql_fetch_array($rsProfile);
extract($row);


//variables control posta sol
$offset_sortida = stripslashes($offset_sortida);
$offset_posta = stripslashes($offset_posta);
$activar_sortida = stripslashes($activar_sortida);
$activar_posta = stripslashes($activar_posta);

mysql_close();




echo "<hr><h1><a>Solar</a></h1>";


//Calcular posta de sol a Sabadell 41.544014, 2.111865

//Estiu
//SUNFUNCS_RET_STRING, 41.551, 2.115, 90, 2);

//Hivern
//SUNFUNCS_RET_STRING, 41.551, 2.115, 90, 1);


$hora_actual = date('H:i');
//$hora_actual = date('18:37');
echo "Ara son: ".$hora_actual;

$hora_sortida_sol = date_sunrise(time(), SUNFUNCS_RET_STRING, 41.551, 2.115, 90, 2);
echo '<br> Sortida de sol: ' .$hora_sortida_sol;

$hora_sortida_sol = strtotime($hora_sortida_sol);

$offset_sortida_ = $offset_sortida." minutes";
$hora_sortida_sol_offset = date("H:i", strtotime($offset_sortida_, $hora_sortida_sol));
echo '<br> amb offset: ' .$hora_sortida_sol_offset;




$hora_posta_sol = date_sunset(time(), SUNFUNCS_RET_STRING, 41.551, 2.115, 90, 2);
echo '<br> Posta de sol: ' .$hora_posta_sol;
$hora_posta_sol = strtotime($hora_posta_sol);

$offset_posta_ = $offset_posta." minutes";
$hora_posta_sol_offset = date("H:i", strtotime($offset_posta_, $hora_posta_sol));
echo '<br> amb offset: ' .$hora_posta_sol_offset;



if ($hora_actual == $hora_sortida_sol_offset && $activar_sortida == 1) {
    $URL_disparar = "http://192.168.1.5/pis/?codi=101125";
    $enviarDades = file_get_contents($URL_disparar);
    echo "<br>url a disparar ".$URL_disparar; 
} 

if ($hora_actual == $hora_posta_sol_offset && $activar_posta == 1) {
    $URL_disparar = "http://192.168.1.5/pis/?codi=101025";
    $enviarDades = file_get_contents($URL_disparar);
    echo "<br>url a disparar ".$URL_disparar; 
} 
    




?>











<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Control Crepuscular</title>
</head>
<body>
    		<style>
		.button_verd    { background-color: #4CAF50; border: none; color: white; padding: 25px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 40px; border-radius: 8px;}
        .button_blau    { background-color: #0099ff; border: none; color: white; padding: 25px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 40px; border-radius: 8px;}
        .button_vermell { background-color: #C70039; border: none; color: white; padding: 25px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 40px; border-radius: 8px;}
		.button_taronja { background-color: #FF5733; border: none; color: white; padding: 25px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 40px; border-radius: 8px;}
		.button_gris    { background-color: #555555; border: none; color: white; padding: 25px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 40px; border-radius: 8px;}
		.checkboxes label {  display: block;  float: left;  padding-right: 100px; font-size: 2em;  white-space: nowrap;}
		.checkboxes input {  vertical-align: middle; width: 85px; height: 85px;  }
		.checkboxes label span { font-size: 2em; vertical-align: middle;}
		</style>

		
		<form  method="post" action="sol_mysql.php">
					<div class="form_description">
			<p></p>

                        
            <input id="sortida" name="offset_sortida" class="element text" size="3" maxlength="3" value="<?php echo $offset_sortida ?>" type="text"> 
			<label for="sortida">Ofset Sortida</label>
                        
             <input id="activar_sortida" name="activar_sortida" class="element checkbox" type="checkbox" value="1" <?php if ($activar_sortida == 1) echo "checked=\"checked\""  ?>/>
            <label  for="activar_sortida">Activar sortida</label>
<br>
            <input id="posta" name="offset_posta" class="element text" size="3" maxlength="3" value="<?php echo $offset_posta ?>" type="text"> 
			<label for="posta">Ofset Posta</label>
           
            <input id="activar_posta" name="activar_posta" class="element checkbox" type="checkbox" value="1" <?php if ($activar_posta == 1) echo "checked=\"checked\""   ?>/>
            <label for="activar_posta">Activar Posta</label>                        
                        
       <br>  <p>   
			    <input type="hidden" name="id" value="<?php echo $id ?>">
				<input id="saveForm" class="button_verd" type="submit" name="submit" value="Editar" />
                <button class="button_taronja" type="submit"  formaction="/pis">Tornar</button>

	</body>
</html>