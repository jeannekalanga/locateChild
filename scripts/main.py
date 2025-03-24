import serial
import time

# Configurer le port série
ser = serial.Serial('COM5', 115200, timeout=1)
time.sleep(2)

print("Lecture des données GPS en temps réel !")

# Variable pour stocker les coordonnées GPS
last_latitude = None
last_longitude = None

while True:
    try:
        if ser.in_waiting > 0:  # Si des données sont disponibles
            # Essayer de lire les données et de les décoder
            try:
                gps_data = ser.readline().decode('latin-1').strip()  # Utiliser latin-1 pour éviter les erreurs
            except Exception as e:
                print(f"Erreur de décodage : {e}")
                continue  # Passer à la ligne suivante si une erreur de décodage se produit

            if gps_data.startswith('$'):  # Vérifier si c'est un message GPS valide
                print(f"Données GPS : {gps_data}")

                # Initialiser les variables de latitude et longitude
                latitude, longitude = None, None

                # Traitement des messages $GPGGA
                if gps_data.startswith('$GPGGA'):
                    parts = gps_data.split(',')
                    if len(parts) > 5:
                        latitude = parts[2] + ' ' + parts[3]  # Latitude et hémisphère
                        longitude = parts[4] + ' ' + parts[5]  # Longitude et hémisphère

                # Traitement des messages $GPRMC
                elif gps_data.startswith('$GPRMC'):
                    parts = gps_data.split(',')
                    if len(parts) > 5:
                        latitude = parts[3] + ' ' + parts[4]  # Latitude et hémisphère
                        longitude = parts[5] + ' ' + parts[6]  # Longitude et hémisphère

                # Traitement des messages $GPGLL
                elif gps_data.startswith('$GPGLL'):
                    parts = gps_data.split(',')
                    if len(parts) > 5:
                        latitude = parts[1] + ' ' + parts[2]  # Latitude et hémisphère
                        longitude = parts[3] + ' ' + parts[4]  # Longitude et hémisphère

                # Affichage des coordonnées
                if latitude and longitude:
                    print(f"Latitude : {latitude}, Longitude : {longitude}")

                    # Écrire les coordonnées dans le fichier temporaire
                    with open("scripts/gps_data_temp.txt", "w") as f:
                        f.write(f"Latitude : {latitude}, Longitude : {longitude}\n")

                    # Mettre à jour les dernières coordonnées
                    last_latitude = latitude
                    last_longitude = longitude
                else:
                    print("Coordonnées GPS non disponibles.")

        time.sleep(1)  # Attendre avant de relire le port
    except KeyboardInterrupt:
        print("\nArrêt du script.")
        break
    except Exception as e:
        print(f"Erreur : {e}")
        break
