import urequests
import utime
import json
from machine import Pin, PWM
from picozero import RGBLED

wlan = network.WLAN(network.STA_IF)
wlan.active(True)

ssid = "iPhone de Dimitri"
password = 'dimi1409*'
wlan.connect(ssid, password)
url = "http://172.20.10.6:8888/ProjetAxe/getOne.php"

rgb = RGBLED(red=14, green=13, blue=12)
button = Pin(14, mode=Pin.IN, pull=Pin.PULL_UP)

while not wlan.isconnected():
    print("Pas connecté au WiFi")
    utime.sleep(1)

    def set_led_color(r, g, b):
        rgb.color = (r, g, b)

    while True:
        try:
            request = urequests.get(url)
            resultat = request.json()
            print("Le type est :", resultat["tag"])

            if resultat["tag"] == "evenements":
                set_led_color(99, 144, 240)
            elif resultat["tag"] == "sport":
                set_led_color(238, 129, 48)
            elif resultat["tag"] == "film":
                set_led_color(120, 200, 80)
            elif resultat["tag"] == "culture":
                set_led_color(252, 234, 161)
            elif resultat["tag"] == "série":
                set_led_color(183, 183, 206)
            elif resultat["tag"] == "social":
                set_led_color(111, 53, 252)
            elif resultat["tag"] == "art":
                set_led_color(166, 185, 26)
            elif resultat["tag"] == "animaux":
                set_led_color(250, 87, 136)
            elif resultat["tag"] == "nature":
                set_led_color(226, 191, 101)
            elif resultat["tag"] == "france":
                set_led_color(112, 88, 68)

            request.close()
        except Exception as e:
            print(e)

import urequests
from machine import Pin

button = Pin(14, mode=Pin.IN, pull=Pin.PULL_UP)

def create_predefined_post():
    url = "http://172.20.10.6:8888/ProjetAxe/postPrefab.php"
    
    try:
        request = urequests.post(url)
        response = request.text
        print(response)
        request.close()
    except Exception as e:
        print(e)

while True:
    if button.value() == 0:
        create_predefined_post()
