# Simple demo of the TSL2591 sensor.  Will print the detected light value
# every second.
import time

import board
import busio
import requests

##################################################
#              USER SENSOR CONFIG                #
#   No more user interaction beyond this line    #
#                                                #
##################################################

#API_KEY given when registered
user_api_key = 'd34db33f11111'
#SENSOR_ID given when sensor created on Dashboard
user_sensor_id = '666'
#IoT-Broker URL
user_url = 'http://localhost'

##################################################
#                                                #
#   No more user interaction beyond this line    #
#                                                #
##################################################

write_url = user_url + 'php/write.php'

import adafruit_tsl2591

# Initialize the I2C bus.
i2c = busio.I2C(board.SCL, board.SDA)

# Initialize the sensor.
sensor = adafruit_tsl2591.TSL2591(i2c)

# Read the total lux, IR, and visible light levels and print it every second.
while True:
    # Read and calculate the light level in lux.
    lux = sensor.lux
    print("Total light: {0}lux".format(lux))
    # You can also read the raw infrared and visible light levels.
    # These are unsigned, the higher the number the more light of that type.
    # There are no units like lux.
    # Infrared levels range from 0-65535 (16-bit)
    infrared = sensor.infrared
    print("Infrared light: {0}".format(infrared))
    # Visible-only levels range from 0-2147483647 (32-bit)
    visible = sensor.visible
    print("Visible light: {0}".format(visible))
    # Full spectrum (visible + IR) also range from 0-2147483647 (32-bit)
    full_spectrum = sensor.full_spectrum
    print("Full spectrum (IR + visible) light: {0}".format(full_spectrum))
    time.sleep(1.0)                                                                                                                                                                                                                                                            
        data{
            'sensor_id' = user_sensor_id,
            'api_key' : user_api_key,
            'value': sensor.lux                                                                                                                                                                                                                                                     'sensor_id' : '',
                }

        x= requests.post(url,data)

        #print the response text (the content of the requested file):

        print(x)
