

<?php


//http://alarma.ibernat.com/editar_alarma.php?id=6
//<a href="editar_alarma.php?id=6" >Editar</a>
//http://alarma.ibernat.com/editar_alarma.php?id=6
//http://alarma.ibernat.com/desactivar_alarma_mysql.php?id=14&estat=1
   
    
// llegir ip casa
$ipCasa = gethostbyname('pis.flnet.org');
    
//ip client
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$user_ip = getUserIP();

 
//if ($user_ip == $ipCasa) {
if ($user_ip == $user_ip) {

include("html_index.php");    
    
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
$hora = mysql_result($result,$i,"hora");
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
$icona_data = '';
    

//botons per editar borar deactivar 
$botons = "<a href=\"editar_alarma.php?id=".$id."\" >Editar</a> <a href=\"eliminar_alarma_mysql.php?id=".$id."\" >Borrar</a>  <a href=\"desactivar_alarma_mysql.php?id=".$id."&estat=0\" >Desactivar</a><br>";
    
//mostrar els dies que esta actiu
if ($dl == "1" ||$dm == "1" ||$dc == "1" ||$dj == "1" ||$dv == "1" ||$ds == "1" ||$dg == "1" ) 
{
    
    $data = "";
    if ($dl == 1){ $data .= '<img src="imatges/dl.png"  width="42" height="42"> '; } else {$data .= '<img src="imatges/dl_gr.png"  width="42" height="42"> ';}
    if ($dm == 1){ $data .= '<img src="imatges/dm.png"  width="42" height="42"> '; } else {$data .= '<img src="imatges/dm_gr.png"  width="42" height="42"> ';}
    if ($dc == 1){ $data .= '<img src="imatges/dc.png"  width="42" height="42"> '; } else {$data .= '<img src="imatges/dc_gr.png"  width="42" height="42"> ';}
    if ($dj == 1){ $data .= '<img src="imatges/dj.png"  width="42" height="42"> '; } else {$data .= '<img src="imatges/dj_gr.png"  width="42" height="42"> ';}
    if ($dv == 1){ $data .= '<img src="imatges/dv.png"  width="42" height="42"> '; } else {$data .= '<img src="imatges/dv_gr.png"  width="42" height="42"> ';}
    if ($ds == 1){ $data .= '<img src="imatges/ds.png"  width="42" height="42"> '; } else {$data .= '<img src="imatges/ds_gr.png"  width="42" height="42"> ';}
    if ($dg == 1){ $data .= '<img src="imatges/dg.png"  width="42" height="42"> '; } else {$data .= '<img src="imatges/dg_gr.png"  width="42" height="42"> ';}
}
else
{
    if ($data == "0000-00-00") { $data = '<img src="imatges/calendari.png" alt="Tots els dies" width="42" height="42">';} else { $icona_data = '<img src="imatges/un_dia.png"  width="42" height="42"> ';}
}
 
    
//zones afectades
$zones = " ";
    if ($dormitori == 1){   $zones .= '<img src="imatges/dormitori.png"  width="42" height="42">'; } else { $zones .= '<img src="imatges/dormitori_gr.png"  width="42" height="42">'; }
    if ($escriptori == 1){   $zones .= '<img src="imatges/escriptori.png"  width="42" height="42">'; } else { $zones .= '<img src="imatges/escriptori_gr.png"  width="42" height="42">'; }
    if ($menjador == 1){   $zones .= '<img src="imatges/menjador.png"  width="42" height="42">'; } else { $zones .= '<img src="imatges/menjador_gr.png"  width="42" height="42">'; }


    
//Accio pujar o baixar finestra
$pujarbaixar = " ";
    if ($accio == 1) {  $pujarbaixar .= '<img src="imatges/pujar.png"  width="42" height="42">'; } else { $pujarbaixar .= '<img src="imatges/baixar.png"  width="42" height="42">'; }


//mostra alarmes actives    
if ($actiu == 1 )
{
    //borrar els segons del timestamp
    $icona_hora = '<img src="imatges/hora.png"  width="42" height="42">';
    $hora = date('H:i', strtotime($hora));

    //http://alarma.ibernat.com/desactivar_alarma_mysql.php?id=42&estat=0
 echo " <label> <input type=\"radio\" name=\"id\" value=\"".$id."\"><span>".$icona_hora.$hora."h ".$icona_data.$data. " " .$zones.  " ".$pujarbaixar." ".$temps. "s </span></label><br>";
  
}
else
{
        //borrar els segons del timestamp
    $icona_hora = '<img src="imatges/hora.png"  width="42" height="42">';
    $hora = date('H:i', strtotime($hora));
    $desactivades .= "<font color = gray> <label> <input type=\"radio\" name=\"id\" value=\"".$id."\"><span>".$icona_hora.$hora."h ".$icona_data.$data. " " .$zones.  " ".$pujarbaixar." ".$temps. "s </span></label><br>";
}

++$i; } } else { echo "Cap alarma programada"; }
        
///////////////////////////////////////////////////////
 //alarmes desactivades       
echo "<hr>";
 echo $desactivades;

}
else
{
    echo $user_ip;
}//final if user ip
    ?>
         

</form> 
        
        </body></html>