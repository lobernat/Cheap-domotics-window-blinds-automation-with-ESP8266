<html>
		<head><meta content="text/html; charset=utf-8">
		<title>Control de Persianes</title></head>		
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
		<style>
        .button_rosa    { background-color: #ff0066; border: none; color: white; padding: 25px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 40px; border-radius: 8px;}
		.button_verd    { background-color: #4CAF50; border: none; color: white; padding: 25px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 40px; border-radius: 8px;}
        .button_blau    { background-color: #0099ff; border: none; color: white; padding: 25px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 40px; border-radius: 8px;}
        .button_vermell { background-color: #C70039; border: none; color: white; padding: 25px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 40px; border-radius: 8px;}
		.button_taronja { background-color: #FF5733; border: none; color: white; padding: 25px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 40px; border-radius: 8px;}
		.button_gris    { background-color: #555555; border: none; color: white; padding: 25px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 40px; border-radius: 8px;}
		.checkboxes label {  display: block;  float: left;  padding-right: 100px; font-size: 2em;  white-space: nowrap;}
		.checkboxes input {  vertical-align: middle; width: 85px; height: 85px;  }
		.checkboxes label span { font-size: 2em; vertical-align: middle;}
		</style>		
		
				

		<body>
		<form>
		
		<!-- desactivar_alarma_mysql.php?id=42&estat=0 -->
                <button class="button_rosa" type="submit"  formaction="acces_directe.php">Dormitori 1 pam</button>
                <input type="hidden" name="Dormitori_1_pam" value="100105">
                <br><br>
                <button class="button_verd" type="submit"  formaction="afegir_alarma.php">Afegir</button>
                <button class="button_blau" type="submit"  formaction="editar_alarma.php">Editar</button>
                <button class="button_vermell" type="submit"  formaction="eliminar_alarma_mysql.php">Borrar</button>
                <button class="button_taronja" type="submit" formaction="desactivar_alarma_mysql.php">Des/Activar</button>
                <button class="button_gris" type="submit"  formaction="sol.php">Sol</button>

		<br><p>
<font size="6">