
-- Definicio sortides reles
-- Dormitori GPIO5(1), GPIO4(2)
-- escriptori GPIO16(0), GPIO14(5)
-- Menjador  GPIO12(6), GPIO13(7)
-- Activadors GPIO2(4)

-- Definicio de Pins
Dormitori_Enable = 1
Dormitori_Accio = 2
Escriptori_Enable = 0
Escriptori_Accio = 5
Menjador_Enable = 6
Menjador_Accio = 7
Activador = 4


--Inicialitzar sortides
gpio.mode(Dormitori_Enable, gpio.OUTPUT)
gpio.write(Dormitori_Enable, gpio.HIGH);

gpio.mode(Dormitori_Accio, gpio.OUTPUT)
gpio.write(Dormitori_Accio, gpio.HIGH);

gpio.mode(Escriptori_Enable, gpio.OUTPUT)
gpio.write(Escriptori_Enable, gpio.HIGH);

gpio.mode(Escriptori_Accio, gpio.OUTPUT)
gpio.write(Escriptori_Accio, gpio.HIGH);

gpio.mode(Menjador_Enable, gpio.OUTPUT)
gpio.write(Menjador_Enable, gpio.HIGH);

gpio.mode(Menjador_Accio, gpio.OUTPUT)
gpio.write(Menjador_Accio, gpio.HIGH);

gpio.mode(Activador, gpio.OUTPUT)
gpio.write(Activador, gpio.HIGH);



--parmetreURL = "111100";
--print ("Parametre URL:",parmetreURL)




-- funcio que separa els parametres en variables
function ParsejarParametres(parametres)
    d = string.sub(parametres, 1, 1)
    e = string.sub(parametres, 2, 2)
    m = string.sub(parametres, 3, 3)
    a = string.sub(parametres, 4, 4)
    t = string.sub(parametres, 5, 6)
    
	if t == "00" then
       t_segons = 1
    else
	    if a == "1" then
			pujar (d,e,m)
			print ("Pujar")
		end
		if a == "0" then
			baixar (d,e,m)
			print ("Baixar")
		end
       t_segons = t * 1000
    end
	
    tmr.alarm(0, t_segons, tmr.ALARM_SINGLE, function() TotStop() end)
  
    return d, e, m, a, t_segons
end


-- Full Stop
function TotStop()
    gpio.write(Dormitori_Enable, gpio.HIGH);
    gpio.write(Dormitori_Accio, gpio.HIGH);
    gpio.write(Escriptori_Enable, gpio.HIGH);
    gpio.write(Escriptori_Accio, gpio.HIGH);
    gpio.write(Menjador_Enable, gpio.HIGH);
    gpio.write(Menjador_Accio, gpio.HIGH);
    gpio.write(Activador, gpio.HIGH);
    print ("Tot STOP")
    
end




function pujar (d,e,m)

    if d == "0" and e == "0" and m == "0" then 
        TotStop()
    end
    if d == "1" then
        gpio.write(Activador, gpio.LOW);
        gpio.write(Dormitori_Enable, gpio.LOW);
        gpio.write(Dormitori_Accio, gpio.HIGH);
        print ("Dormitori_Up ")
    end
    if e == "1" then
        gpio.write(Activador, gpio.LOW);
        gpio.write(Escriptori_Enable, gpio.LOW);
        gpio.write(Escriptori_Accio, gpio.HIGH);
        print ("Escriptori_Up ")
    end        
    if m == "1" then
        gpio.write(Activador, gpio.LOW);
        gpio.write(Menjador_Enable, gpio.LOW);
        gpio.write(Menjador_Accio, gpio.HIGH);
        print ("Menjador_Up ")
    end
end



function baixar (d,e,m)
    if d == "0" and e == "0" and m == "0" then 
        TotStop()
    end
    if d == "1" then
        gpio.write(Activador, gpio.LOW);
        gpio.write(Dormitori_Enable, gpio.LOW);
        gpio.write(Dormitori_Accio, gpio.LOW);
        print ("Dormitori_Dw ")
    end
    if e == "1" then
        gpio.write(Activador, gpio.LOW);
        gpio.write(Escriptori_Enable, gpio.LOW);
        gpio.write(Escriptori_Accio, gpio.LOW);
        print ("Escriptori_Dw ")
    end        
    if m == "1" then
        gpio.write(Activador, gpio.LOW);
        gpio.write(Menjador_Enable, gpio.LOW);
        gpio.write(Menjador_Accio, gpio.LOW);
        print ("Menjador_Dw ")
    end
end




--comprobar si hi ha connexió a la xarxa cada 30 minuts 1800000 ms. 5minuts=300000
tmr.alarm(3, 1800000, 1, function() 
if wifi.sta.status()== 5 then 
	print("Tot OK")
else 
	print("No hi ha IP reiniciar")
	node.restart()
end 
end)


--Cridar funcio parsejar
--dor,esc,men,accio,temps = ParsejarParametres(parmetreURL)




----------------
-- servidor Web --
----------------
print("Iniciant servidor web...")
-- Create a server object with 30 second timeout
srv = net.createServer(net.TCP, 30)
srv:listen(80, function(conn)

  conn:on("receive", function(sck, request)






        local _, _, method, path, vars = string.find(request, "([A-Z]+) (.+)?(.+) HTTP");
        if(method == nil)then
            _, _, method, path = string.find(request, "([A-Z]+) (.+) HTTP");
        end
        local _GET = {}
        if (vars ~= nil)then
            for k, v in string.gmatch(vars, "(%w+)=(%w+)&*") do
                _GET[k] = v
            end
        end
		
		
--New NodeMCU 1.5.4+ firmware fails on older NodeMCU v.9.x multiple send commands, so needed to do a new method to send.
    local response = {}

                
		response[#response + 1] = 'HTTP/1.1 200 OK\r\nContent-type: text/html\r\n'
        response[#response + 1] = 'Connection: close\r\n\r\n'
        response[#response + 1] = '<html>\n'
		response[#response + 1] = '<center>\n'
		response[#response + 1] = '<head><meta content="text/html; charset=utf-8">\n'
		response[#response + 1] = '<title>Control de Persianes</title></head>\n'				
        response[#response + 1] = '<link rel="shortcut icon" href="http://alarma.ibernat.com/favicon.ico" type="image/x-icon">\n'
        response[#response + 1] = '<link rel="icon" href="http://alarma.ibernat.com/favicon.ico" type="image/x-icon"> \n'                       
		response[#response + 1] = '<style>\n'
		response[#response + 1] = '.button_verd    { background-color: #4CAF50; border: none; color: white; padding: 25px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 60px; border-radius: 8px;}\n'
        response[#response + 1] = '.button_vermell { background-color: #C70039; border: none; color: white; padding: 25px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 60px; border-radius: 8px;}\n'
		response[#response + 1] = '.button_taronja { background-color: #FF5733; border: none; color: white; padding: 25px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 60px; border-radius: 8px;}\n'
		response[#response + 1] = '.button_gris    { background-color: #555555; border: none; color: white; padding: 25px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 60px; border-radius: 8px;}\n'
		response[#response + 1] = '.checkboxes label {  display: block;  float: left;  padding-right: 100px; font-size: 2em;  white-space: nowrap;}\n'
		response[#response + 1] = '.checkboxes input {  vertical-align: middle; width: 85px; height: 85px;  }\n'
		response[#response + 1] = '.checkboxes label span { font-size: 2em; vertical-align: middle;}\n'
		response[#response + 1] = '</style>\n'
		
				

		response[#response + 1] = '<body>\n'
		--   response[#response + 1] = '<h1> Persianes</h1>\n'
		response[#response + 1] = '<h1><p><a href=\"?codi=101125\"><button  class=\"button_verd\">Pujar Tot</button></a>&nbsp;<a href=\"?codi=101025\"><button  class=\"button_vermell\">Baixar Tot</button></a></h1>'

		response[#response + 1] = '<form action=\"/\" method=\"GET\">\n'
		response[#response + 1] = '<br><p><input id=\"temps\" type=\"range\" name=\"temps\" min=\"0\" max=\"25\" value=\"25\" orient=\"vertical\" style=\"width: 60%; height: 350px;-webkit-appearance: slider-vertical; writing-mode: bt-lr;\"><br>\n'


		
		response[#response + 1] = '<br><p><br><p>  <div class="checkboxes">\n'
		response[#response + 1] = '<input type=\"checkbox\" name=\"dormitori\" value=\"1\"> <span>Dormitori</span>\n'
		response[#response + 1] = '<input type=\"checkbox\" name=\"escriptori\" value=\"1\"><span>Escriptori</span>   \n'
		response[#response + 1] = '<input type=\"checkbox\" name=\"menjador\" value=\"1\"> <span>Menjador</span> \n'
		response[#response + 1] = '</div>\n'
		
		
		response[#response + 1] = '<br><p> <div class="checkboxes">\n'
		response[#response + 1] = '<input type=\"radio\" name=\"accio\" value=\"1\" checked><span>Pujar</span>\n'
		response[#response + 1] = '<input type=\"radio\" name=\"accio\" value=\"0\"><span>Baixar</span>\n'
		response[#response + 1] = '</div>\n'
		
		response[#response + 1] = '<br><p><input class=\"button_verd\" type=\"submit\" value=\"Executar\"/>  \n'
		response[#response + 1] = '</form> \n'
        --response[#response + 1] = '<hr><a href=\"http://alarma.ibernat.com\"><button  class=\"button_taronja\">Programador</button></a>'
		--response[#response + 1] = '<iframe src="http://192.168.10.5/pis" width=100% height=100% frameborder="0"></iframe>'
        response[#response + 1] = '</center></body></html>\n'
		
		
		
		
		local _on,_off = "",""
		-- capturar peticio GET
		if(_GET.codi ~= nil )then 
			ParsejarParametres(_GET.codi) 
			print ("Parametre GET rebut: ",_GET.codi)
		end
		
		-- Caputrar formulari GET
		-- amb el if comprovar si s'ha enviar des de formulari, la variable temps sempre senvia
		if(_GET.temps ~= nil )then
			if(_GET.temps == "0" )then temps = "00" else temps = _GET.temps  end
			if(_GET.dormitori ~= nil )then dormitori = "1" else dormitori = "0" end
			if(_GET.escriptori ~= nil )then escriptori = "1" else escriptori = "0" end
			if(_GET.menjador ~= nil )then menjador = "1" else menjador = "0" end
			
			ParametresFormulari = dormitori .. escriptori .. menjador .. _GET.accio .. temps
			print ("Parametres formulari: ", ParametresFormulari)
			ParsejarParametres(ParametresFormulari)
		end
		
		
		
		
	-- sends and removes the first element from the 'response' table
    local function send(sk)
      if #response > 0
        then sk:send(table.remove(response, 1))
      else
        sk:close()
        response = nil
      end
    end

    -- triggers the send() function again once the first chunk of data was sent
    sck:on("sent", send)

    send(sck)
        collectgarbage();
    end)
end)
