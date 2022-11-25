///////////////Created by Gledis Qose//////////////////


#include <WiFi.h>
//#include "DHT.h"
//#define DHTPIN 22
//#define DHTTYPE DHT11
//DHT dht(DHTPIN, DHTTYPE);

const char* ssid     = "iot_tiburi";
const char* password = "iot_tiburi";
const char* host = "files.000webhost.com";


void setup()
{
  
    Serial.begin(115200);
    //Serial.println("DHT11 Output!");
    //dht.begin();

    // We start by connecting to a WiFi network

    Serial.println();
    Serial.println();
    Serial.print("Connecting to ");
    Serial.println(ssid);

    WiFi.begin(ssid, password);

    while (WiFi.status() != WL_CONNECTED) {
        delay(500);
        Serial.print(".");
    }

    Serial.println("");
    Serial.println("WiFi connected");
    Serial.println("IP address: ");
    Serial.println(WiFi.localIP());
}



void loop()
{
  
int temperature = 1250;
   
    Serial.print(temperature);
    Serial.println(" *C");
    delay(3000);
   
    Serial.print("connecting to ");
    Serial.println(host);

    // Use WiFiClient class to create TCP connections
    WiFiClient client;
    const int httpPort = 21;
    if (!client.connect(host, httpPort)) {
        Serial.println("connection failed");
        return;
    }

 


    // This will send the request to the server
 client.print(String("GET https://modernistic-discrep.000webhostapp.com/") + ("&temperature=") + temperature + " HTTP/1.1\r\n" + "Host: " + host + "\r\n" + "Connection: close\r\n\r\n");
    unsigned long timeout = millis();
    while (client.available() == 0) {
        if (millis() - timeout > 1000) {
            Serial.println(">>> Client Timeout !");
            client.stop();
            return;
        }
    }

    // Read all the lines of the reply from server and print them to Serial
    while(client.available()) {
        String line = client.readStringUntil('\r');
        Serial.print(line);
        
    }

    Serial.println();
    Serial.println("closing connection");
}
