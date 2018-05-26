# Cheap-domotics-window-blinds-automation-with-ESP8266
Window blind automation over wifi TCP/IP

I made this project some years ago to automate my home window blinds. The idea was to use the blinds as an alarm clock and awake by the morning sun light, but the reality is I wake up because the motor noise and on winter it is still dark :(

I would like to share the code because the system works fine and is very practical. I'm amazed how reliable are the aliexpress components. This setup has been running for the last two years without issues.

***Features:***
- Manual operation
- Multiple programmable times
- Sunset/Sunrise

***Hardware***
***OrangePI***
As a LAMP server
![OrangePI](https://raw.githubusercontent.com/lobernat/Cheap-domotics-window-blinds-automation-with-ESP8266/master/screenshots/OrangePI.jpg)

Two relays for each window blind
![Relays](https://raw.githubusercontent.com/lobernat/Cheap-domotics-window-blinds-automation-with-ESP8266/master/screenshots/esp8266_relay.jpg)

***Screen Shots***

![Main screeen](https://raw.githubusercontent.com/lobernat/Cheap-domotics-window-blinds-automation-with-ESP8266/master/screenshots/main.png)

![Main screeen](https://raw.githubusercontent.com/lobernat/Cheap-domotics-window-blinds-automation-with-ESP8266/master/screenshots/scheduler.png)

![Main screeen](https://raw.githubusercontent.com/lobernat/Cheap-domotics-window-blinds-automation-with-ESP8266/master/screenshots/solar.png)


***How it works***
The idea is very simple, Web server LAMP for the scheduler and ESP8266 with NODEMCU and relays.
The ESP6266 is connected to my wifi network and has a micro http server that receives the orders by http GET
http://IPesp8266/?codi=100105
This code will only act on my bedroom blind (100) and up direction (1) during 5 seconds (05)

***Code Description***
- 1 ->Bedroom blind (1=active)
- 0 ->Desktop room blind (0=inactive)
- 0 ->Living room blind (0=inactive)
- 1 -> action:1 go up, 0 go down
- 05 -> during 5 seconds
