/*
 *  This sketch trys to Connect to the best AP based on a given list
 *
 */


#include <SPI.h>
#include <WiFi.h>
#include <WiFiMulti.h>
#include <Ethernet.h>
#include <MySQL_Connection.h>
#include <MySQL_Cursor.h>

const char* host = "modernistic-discrep.000webhostapp.com";
//#include <WiFiNINA.h>


const int ledPin =  2;
byte mac_addr[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };

// DECLARAÇÃO DE VARIÁVEIS PARA MySQL
IPAddress server_addr(85, 10, 205, 173);  // IP of the MySQL *server* here
char user[] = "iot_tiburi";              // MySQL user login username
char password[] = "iot_tiburi";          // MySQL user login password

char INSERT_SQL[] = "INSERT INTO bcitest.Noteiro (DEVICE_ID, CASH) VALUES ('%d', '%d')";
char query[128];

//WiFiClient client;
EthernetClient client;
MySQL_Connection conn((Client *)&client);


WiFiMulti wifiMulti;

void setup(){
    Serial.begin(115200);
    delay(10);
    while (!Serial) {
     // ESPERA O SERIAL ESTAR PRONTO
    }
  
    pinMode(ledPin, OUTPUT);

    wifiMulti.addAP("Fabio Oi Fibra", "10010110");
    // wifiMulti.addAP("ssid_from_AP_2", "your_password_for_AP_2");
    //wifiMulti.addAP("ssid_from_AP_3", "your_password_for_AP_3");

    Serial.println("Connecting Wifi...");

    if(wifiMulti.run() == WL_CONNECTED) {
        Serial.println("");
        Serial.println("WiFi connected");
        Serial.println("IP address: ");
    }  
  }
   
void loop(){

float temperature = 9;

  //if(isnan(temperature) || isnan(humidity)){
  //  Serial.println("Failed to read DHT11");
  //}else{
    Serial.print("Temperature: ");
    Serial.print(temperature);
    Serial.println(" *C");
    delay(3000);
  //}
   
    Serial.print("connecting to ");
    Serial.println(host);

    // Use WiFiClient class to create TCP connections
    WiFiClient client;
    const int httpPort = 80;

   if (!client.connect(host, httpPort)) {
   Serial.println("connection failed");
   return;
   }


// This will send the request to the server
 client.print(String("GET /index.php?temperature=") + 
                          ("&temperature") + temperature +
                           " HTTP/1.1\r\n" +
                 "Host: " + host + "\r\n" +
                 "Connection: close\r\n\r\n");
    unsigned long timeout = millis();
    while (client.available() == 0) {
        if (millis() - timeout > 1000) {
            Serial.println(">>> Client Timeout !");
            client.stop();
            return;
        
        }
    
    // Read all the lines of the reply from server and print them to Serial
    while(client.available()) {
        String line = client.readStringUntil('\r');
        Serial.print(line);
        
    }

    Serial.println();
    Serial.println("closing connection");
    }
}

