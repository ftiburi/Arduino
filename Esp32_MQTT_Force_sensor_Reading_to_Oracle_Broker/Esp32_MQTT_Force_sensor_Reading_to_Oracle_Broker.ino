
//Otimização de envio de dados 1 MQTT 3.900.475 enviados e salvos no banco.

#include <WiFi.h>
#include <PubSubClient.h>

const char* ssid     = "FABIANA  OI FIBRA 2G 5G ";
const char* password = "25091933";

const char* mqtt_server = "168.138.140.255";
const int mqtt_port = 1883;
const char* mqtt_topic = "force_data";
const char* mqtt_user = "force"; // Add your MQTT username
const char* mqtt_password = "610220";

int sensorPin = A0;
int valoratual=0;

// Pino de leitura analógica 

const int analogPin = 34;

WiFiClient espClient;

PubSubClient client(espClient);


void setup()
{
  
    Serial.begin(115200);
    Serial.println("forca");
   

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

    client.setServer(mqtt_server, mqtt_port);
     
      }
     
     void loop() {
       if (!client.connected()) {
        reconnect(); }
        
        client.loop();
       //        valoratual = analogRead(analogPin);
       // if (abs(valoratual - valoranterior) > 10) {
        //  valoranterior = valoratual;
  
        char msg[50];
        snprintf(msg, 50, "%d", valoratual);
        client.connect("ESP32Client", mqtt_user, mqtt_password);
        client.publish(mqtt_topic, msg, mqtt_user);
        delay(1);
        
        void reconnect() { 
          while (!client.connected()) {
             Serial.print("Attempting MQTT connection...");
              if (client.connect("ESP32Client", mqtt_user, mqtt_password)) {
                 Serial.println("connected");
                  }
             else {
               Serial.print("failed, rc=");
               Serial.print(client.state());
               Serial.println(" try again in 0.5 seconds");
               delay(500);
               }
          }
        }
     }
    
