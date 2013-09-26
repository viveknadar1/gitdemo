#!/bin/sh
##(zbarcam --raw --prescale=320x240 /dev/video0;date) | tee -a test.txt

	
	echo "Please Close the Camera window after scanning"
	name=$(zbarcam --raw --prescale=320x240 /dev/video1)
	#name="vivek"
	enterDate=$(date +%F) 
	enterTime=$(date +%T)
	#echo "Welcome to Aakash Lab\n$name1 $enterDate"
	echo "\n"
	echo "            Welcome to Aakash Lab"
	echo "\n"
	echo "$name" logged at "$enterTime" on "$enterDate"
	echo "_________________________________________"
		
	#printf "%s %s\n" "$name" "$entered" > output.txt
    	printf "%s %s %s\n" "$name","$enterDate","$enterTime" > timings.csv
        #php = checkAndInsert.php
	download=$(php checkAndInsert.php)
		
