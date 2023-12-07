<?php

include 'inc_header.php';

//Get list of all local IP address complete with their MAC address
$temp=explode("\n",`arp -an`);
foreach($temp as $t){
	$maclist[]=explode(' ',$t);
}
$i=0;
foreach($maclist as $t){
	$maclist[$i][1]=str_replace(array('(',')'),'',$maclist[$i][1]);
	$maclist[$i][3]=str_replace(':','',$maclist[$i][3]);
	$i++;
}

//Get list of all Wiz devices available to us
$temp=`echo '{"method":"getPilot","params":{}}' | socat - UDP-DATAGRAM:255.255.255.255:38899,broadcast`;
$temp=explode('{"method":"getPilot","env":"pro","result":{',$temp);
foreach($temp as $t){
	$t=str_replace(array('}','"'),'',$t);
	$stack=explode(',',$t);
	foreach($stack as $s_row){
		$stack_temp[]=explode(':',$s_row);
	}
	$wizlist[]=$stack_temp;
}
echo '<pre>';
print_r($maclist);
print_r($wizlist);
echo '</pre>';

//Check database for new devices; Record capabilities and current status

//Update any IP addresses

//Display list of devices and specify which ones are new

?>
