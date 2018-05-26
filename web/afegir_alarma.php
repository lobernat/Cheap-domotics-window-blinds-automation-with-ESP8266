<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Persianes</title>
<script type="text/javascript" src="calendar.js"></script>
    <link rel="stylesheet" type="text/css" href="view.css" media="all">

    <!-- http://www.flaticon.com/free-icon/down-arrow_24567-->
<script src="jquery.min.js"></script>
<script src="jquery-ui.min.js"></script>

		<link rel='stylesheet' type='text/css' href='toggle.button.css'/>
		<script src="toggle.button.js"></script>
</head>
<body  >
	
	<div >
	
		
		<form id="form_1162246" class="appnitro"  method="post" action="afegir_alarma_mysql.php">
					
			<ul >
			
					<li >
		<span>
			<input id="element_1_1" name="dia" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_1_1">DD</label>
		</span>
		<span>
			<input id="element_1_2" name="mes" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_1_2">MM</label>
		</span>
		<span>
	 		<input id="element_1_3" name="any" class="element text" size="4" maxlength="4" value="" type="text">
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
<option value="0" selected="selected">0</option>
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
		</li>		<li  >
		<label class="description" for="element_2">Minuts </label>
		<div>
		<select class="element select small" id="element_2" name="minut"> 
<option value="00" selected="selected">0</option>
<option value="05" >5</option>
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
		</li>		<li>
		<span>
            

            
<input id="dl" name="dilluns" type="checkbox" value="1" />
<input id="dm" name="dimarts" type="checkbox" value="1" />
<input id="dc" name="dimecres"   type="checkbox" value="1" />
<input id="dj" name="dijous"   type="checkbox" value="1" />
<input id="dv" name="divendres"   type="checkbox" value="1" />
<input id="ds" name="dissabte"   type="checkbox" value="1" />
<input id="dg" name="diumenge"   type="checkbox" value="1" />

		</span> 
		</li>		<li>
		<span>
<input id="dormitori" name="dormitori"   type="checkbox" value="1" checked="checked"/>
<input id="escriptori" name="escriptori"   type="checkbox" value="1" checked="checked"/>
<input id="menjador" name="menjador"   type="checkbox" value="1" checked="checked"/>

		</span> 
		</li>		<li >
		<span>
			<input id="accio" name="accio"   type="checkbox" value="1" checked="checked"/>
		</span> 
		</li>		<li >
			<span>
			 <input id="temps" type="range" name="temps" min="0" max="25" value="25" orient="vertical" style="width: 100px; height: 150px;-webkit-appearance: slider-vertical; writing-mode: bt-lr;">
		</span> 
		</li>		<li >
		<span>
			<input id="activat" name="estat"   type="checkbox" value="1" checked="checked"/>

		</span> 
		</li>
			
					<li>
			    <input type="hidden" name="form_id" value="1162246" />
			    
				<input id="saveForm"  type="submit" name="submit" value="Guardar Alarma" />
		</li>
			</ul>
		</form>	

	</div>
	</body>
    
    		<script>
			$("#dl").toggleButton({text : "Dl"});
			$("#dm").toggleButton({text : "Dm"});
			$("#dc").toggleButton({text : "Dc"});
			$("#dj").toggleButton({text : "Dj"});
			$("#dv").toggleButton({text : "Dv"});
			$("#ds").toggleButton({text : "Ds"});
			$("#dg").toggleButton({text : "Dj"});
			
			$("#dormitori").toggleButton({text : "Dormitori"});
			$("#escriptori").toggleButton({text : "Escriptori"});
			$("#menjador").toggleButton({text : "Menjador"});
			
			$("#activat").toggleButton({text : "Actiu"});
			
			
			$("#accio").toggleButton({
			text : "Accio",
			toggleOnColor : "orange",
			toggleOffColor : "white",
			onImg: "upload-symbol.png",
			offImg: "download-symbol.png",   
			});
		</script>
    
</html>
