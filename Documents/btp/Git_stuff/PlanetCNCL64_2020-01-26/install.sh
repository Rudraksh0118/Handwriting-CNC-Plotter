#!/bin/bash

FILE=51-planetcnc.rules
printf 'SUBSYSTEM=="usb", ATTR{idVendor}=="2121", MODE:="0666"\n' >>$FILE
printf 'SUBSYSTEM=="usb", ATTR{idVendor}=="10ce", MODE:="0666"\n' >>$FILE
printf 'SUBSYSTEM=="usb", ATTR{idVendor}=="2341", MODE:="0666"\n' >>$FILE
printf 'SUBSYSTEM=="usb", ATTR{idVendor}=="16c0", MODE:="0666"\n' >>$FILE
printf 'KERNEL=="hidraw*", ATTRS{busnum}=="1", ATTRS{idVendor}=="2121", MODE:="0666"\n' >>$FILE
printf 'KERNEL=="hidraw*", ATTRS{busnum}=="2", ATTRS{idVendor}=="2121", MODE:="0666"\n' >>$FILE
printf 'KERNEL=="hidraw*", ATTRS{busnum}=="3", ATTRS{idVendor}=="2121", MODE:="0666"\n' >>$FILE
printf 'KERNEL=="hidraw*", ATTRS{busnum}=="1", ATTRS{idVendor}=="10ce", MODE:="0666"\n' >>$FILE
printf 'KERNEL=="hidraw*", ATTRS{busnum}=="2", ATTRS{idVendor}=="10ce", MODE:="0666"\n' >>$FILE
printf 'KERNEL=="hidraw*", ATTRS{busnum}=="3", ATTRS{idVendor}=="10ce", MODE:="0666"\n' >>$FILE
printf 'KERNEL=="hidraw*", ATTRS{busnum}=="1", ATTRS{idVendor}=="2341", MODE:="0666"\n' >>$FILE
printf 'KERNEL=="hidraw*", ATTRS{busnum}=="2", ATTRS{idVendor}=="2341", MODE:="0666"\n' >>$FILE
printf 'KERNEL=="hidraw*", ATTRS{busnum}=="3", ATTRS{idVendor}=="2341", MODE:="0666"\n' >>$FILE
printf 'KERNEL=="hidraw*", ATTRS{busnum}=="1", ATTRS{idVendor}=="16c0", MODE:="0666"\n' >>$FILE
printf 'KERNEL=="hidraw*", ATTRS{busnum}=="2", ATTRS{idVendor}=="16c0", MODE:="0666"\n' >>$FILE
printf 'KERNEL=="hidraw*", ATTRS{busnum}=="3", ATTRS{idVendor}=="16c0", MODE:="0666"\n' >>$FILE
sudo cp $FILE /etc/udev/rules.d/
sudo chmod 644 /etc/udev/rules.d/$FILE
sudo chown root /etc/udev/rules.d/$FILE
rm $FILE

sudo udevadm control --reload-rules
sudo service udev restart
sudo udevadm trigger

FILE=PlanetCNC.desktop
printf '[Desktop Entry]\n' >>$FILE
printf 'Name=PlanetCNC\n' >>$FILE
printf 'Comment=PlanetCNC Software\n' >>$FILE
printf 'Exec=' >>$FILE
printf $PWD >>$FILE
printf '/PlanetCNCL64.exe\n' >>$FILE
printf 'Icon=' >>$FILE
printf $PWD >>$FILE
printf '/PlanetCNC_Icon.svg\n' >>$FILE
printf 'Path=' >>$FILE
printf $PWD >>$FILE
printf '\n' >>$FILE
printf 'Type=Application\n' >>$FILE
printf 'Terminal=false\n' >>$FILE
printf 'StartupNotify=true\n' >>$FILE
printf 'Categories=PlanetCNC;Engineering;Robotics;\n' >>$FILE
printf 'Keywords=CNC;\n' >>$FILE
cp $FILE ~/Desktop/
rm $FILE

chmod +x ~/Desktop/PlanetCNC.desktop

./PlanetCNCL64.exe &
