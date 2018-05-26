<?php

//http://alarma.ibernat.com/editar_alarma.php?id=6

include("connect.php");
$id = $_GET['id'];





$qProfile = "SELECT * FROM alarmes WHERE id='$id'  ";
$rsProfile = mysql_query($qProfile);
$row = mysql_fetch_array($rsProfile);
extract($row);



//dia en que sonarà l'alarma
$data = stripslashes($data);

//per separar la data amb any mes dia
if ($data != "0000-00-00") 
{
$data = explode('-', $data);
$any = $data[0];
$mes = $data[1];
$dia  = $data[2];
}
else
{
$any = null;
$mes = null;
$dia  = null;
}

//Hora en que sonarà l'alarma
$hora_minut = stripslashes($hora);
$hora_minut = explode(':', $hora_minut);
$hora = $hora_minut[0];
$minut = $hora_minut[1];
$segon  = $hora_minut[2];


//els dies de la setmana que ha de sonar
$dilluns = stripslashes($dl);
$dimarts = stripslashes($dm);
$dimecres = stripslashes($dc);
$dijous = stripslashes($dj);
$divendres = stripslashes($dv);
$dissabte = stripslashes($ds);
$diumenge = stripslashes($dg);

//les habitaions que ha d'actuar
$dormitori = stripslashes($dormitori);
$escriptori = stripslashes($escriptori);
$menjador = stripslashes($menjador);

//si l'alarma està activa o no
$actiu = stripslashes($actiu);

//Pujar(1)  baixar(0) persiana
$accio = stripslashes($accio);

//temps de l'accio
$temps = stripslashes($temps);




mysql_close();
?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Persianes</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="calendar.js"></script>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Persianes</a></h1>
		<form id="form_1162246" class="appnitro"  method="post" action="actualitzar_alarma_mysql.php">
					<div class="form_description">
			<h2>Persianes</h2>
			<p></p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Data </label>
		<span>
			<input id="element_1_1" name="dia" class="element text" size="2" maxlength="2" value="<?php echo $dia ?>" type="text"> /
			<label for="element_1_1">DD</label>
		</span>
		<span>
			<input id="element_1_2" name="mes" class="element text" size="2" maxlength="2" value="<?php echo $mes ?>" type="text"> /
			<label for="element_1_2">MM</label>
		</span>
		<span>
	 		<input id="element_1_3" name="any" class="element text" size="4" maxlength="4" value="<?php echo $any ?>" type="text">
			<label for="element_1_3">YYYY</label>
		</span>
	
		<span id="calendar_1">
			<img id="cal_img_1" class="datepicker" src="calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_1_3",
			baseField    : "element_1",
			displayArea  : "calendar_1",
			button		 : "cal_img_1",
			ifFormat	 : "%B %e, %Y",
            firstDay     : 1,
			onSelect	 : selectEuropeDate
			});
		</script>
		 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Hora </label>
		<div>
		<select class="element select small" id="element_3" name="hora"> 
<option value="<?php echo $hora ?>" selected="selected"><?php echo $hora ?></option>
<option value="0" >0</option>
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>
<option value="5" >5</option>
<option value="6" >6</option>
<option value="7" >7</option>
<option value="8" >8</option>
<option value="9" >9</option>
<option value="10" >10</option>
<option value="11" >11</option>
<option value="12" >12</option>
<option value="13" >13</option>
<option value="14" >14</option>
<option value="15" >15</option>
<option value="16" >16</option>
<option value="17" >17</option>
<option value="18" >18</option>
<option value="19" >19</option>
<option value="20" >20</option>
<option value="21" >21</option>
<option value="22" >22</option>
<option value="23" >23</option>

		</select>
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Minuts </label>
		<div>
		<select class="element select small" id="element_2" name="minut"> 
<option value="<?php echo $minut ?>" selected="selected"><?php echo $minut ?></option>
<option value="0" >0</option>
<option value="5" >5</option>
<option value="10" >10</option>
<option value="15" >15</option>
<option value="20" >20</option>
<option value="25" >25</option>
<option value="30" >30</option>
<option value="35" >35</option>
<option value="40" >40</option>
<option value="45" >45</option>
<option value="50" >50</option>
<option value="55" >55</option>

		</select>
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Recurrent </label>
		<span>
<input id="element_5_1" name="dilluns" class="element checkbox" type="checkbox" value="1" <?php if ($dilluns == 1) echo "checked=\"checked\""  ?> />
<label class="choice" for="element_5_1">Dilluns</label>
<input id="element_5_2" name="dimarts" class="element checkbox" type="checkbox" value="1" <?php if ($dimarts == 1) echo "checked=\"checked\""   ?>/>
<label class="choice" for="element_5_2">Dimarts</label>
<input id="element_5_3" name="dimecres" class="element checkbox" type="checkbox" value="1" <?php if ($dimecres == 1) echo "checked=\"checked\""   ?>/>
<label class="choice" for="element_5_3">Dimecres</label>
<input id="element_5_4" name="dijous" class="element checkbox" type="checkbox" value="1" <?php if ($dijous == 1) echo "checked=\"checked\""   ?>/>
<label class="choice" for="element_5_4">Dijous</label>
<input id="element_5_5" name="divendres" class="element checkbox" type="checkbox" value="1" <?php if ($divendres == 1) echo "checked=\"checked\""   ?>/>
<label class="choice" for="element_5_5">Divendres</label>
<input id="element_5_6" name="dissabte" class="element checkbox" type="checkbox" value="1" <?php if ($dissabte == 1) echo "checked=\"checked\""  ?>/>
<label class="choice" for="element_5_6">Dissabte</label>
<input id="element_5_7" name="diumenge" class="element checkbox" type="checkbox" value="1" <?php if ($diumenge == 1) echo "checked=\"checked\""   ?>/>
<label class="choice" for="element_5_7">Diumenge</label>

            
            

            
		</span> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Zona </label>
		<span>
<input id="element_6_1" name="dormitori" class="element checkbox" type="checkbox" value="1" <?php if ($dormitori == 1) echo "checked=\"checked\""  ?>/>
<label class="choice" for="element_6_1">Dormitori</label>
<input id="element_6_2" name="escriptori" class="element checkbox" type="checkbox" value="1" <?php if ($escriptori == 1) echo "checked=\"checked\""   ?>/>
<label class="choice" for="element_6_2">Escriptori</label>
<input id="element_6_3" name="menjador" class="element checkbox" type="checkbox" value="1" <?php if ($menjador == 1) echo "checked=\"checked\""   ?>/>
<label class="choice" for="element_6_3">Menjador</label>

		</span> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Acció </label>
		<span>
			<input id="element_7_1" name="accio" class="element checkbox" type="checkbox" value="1" <?php if ($accio == 1) echo "checked=\"checked\""  ?>/>
<label class="choice" for="element_7_1">Pujar</label>

		</span> 
				</li>		<li >  
			<span>
			 <input id="temps" type="range" name="temps" min="0" max="25" value="<?php echo $temps ?>" orient="vertical" style="width: 100px; height: 150px;-webkit-appearance: slider-vertical; writing-mode: bt-lr;">
		</span> 
		</li>		<li id="li_8" >
		<label class="description" for="element_8">Estat </label>
		<span>
			<input id="element_8_1" name="estat" class="element checkbox" type="checkbox" value="1" <?php if ($actiu == 1) echo "checked=\"checked\""   ?>/>
<label class="choice" for="element_8_1">Activat</label>

		</span> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="1162246" />
			    <input type="hidden" name="id" value="<?php echo $id ?>">
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Editar Alarma" />
		</li>
			</ul>
		</form>	
		<div id="footer">
			persianes
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>