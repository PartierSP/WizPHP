<?php

include 'inc_header.php';

//Get list of all local IP address complete with their MAC address
$maclist=`arp -a`;

//Get list of all Wiz devices available to us
$wizlist=`echo '{"method":"getPilot","params":{}}' | socat - UDP-DATAGRAM:255.255.255.255:38899,broadcast`;

echo "$maclist<br>";
echo $wizlist;

//Check database for new devices; Record capabilities and current status

//Update any IP addresses

//Display list of devices and specify which ones are new

?>
