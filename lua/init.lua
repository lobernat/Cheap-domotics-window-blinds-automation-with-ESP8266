--init.lua
print("Setting up WIFI...")
wifi.setmode(wifi.STATION)
--modify according your wireless router settings
wifi.sta.config("SSID","Password")
wifi.sta.connect()
tmr.alarm(0, 1000, 1, function() 
if wifi.sta.getip()== nil then 
print("IP unavaiable, Waiting...") 
else 
tmr.stop(0)
print("Config done, IP is "..wifi.sta.getip())
dofile("control.lua")
end 
end)