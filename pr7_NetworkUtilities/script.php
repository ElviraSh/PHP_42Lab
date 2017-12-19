<?php
//*if ($_SERVER['REQUEST_METHOD'] =='POST') {*/

include "form.html";

$ip_address = $_GET['ip_address'];
$ping = $_GET['ping'];
$tracert = $_GET['tracert'];

ini_set('max_execution_time', 900);

/*} else{*/

/*}*/
	echo ("</br>HOST: <b>".$ip_address."</b><br>");

	function ping($address){
		exec(escapeshellcmd("ping  $address"), $ping_out);

			if(preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $ping_out[1], $address)) {
			echo ("IP адрес: <b>".$address[0]."</b><br>");
			}

		return $ping_out;
	}

    if ($ping=='on') {
        $ip_ping = ping($ip_address);
        if ($ip_ping[8]!=null) {
             echo ($ip_ping[8]);
         } else{
        foreach ($ip_ping as $value) {
            echo ($value);
        }
        }
    }


    function tracert($address){
	    exec(escapeshellcmd("tracert $address"), $cmd_result);
			if(preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $cmd_result[1], $address)) {
		echo "IP address: <b>".$address[0]."</b><br>";
	    }

	    foreach ($cmd_result as $line) {
		    if(preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $line, $ip_match)) {
		yield $ip_match;
		    }
	    }
    }


    echo "<br>";
    if ($tracert=='on') {
	$ip_list = tracert($ip_address);
    foreach ($ip_list as $ip) {
    	foreach ($ip as $value) {
    		echo "$value"."\t";
    	}
    }
}
	
?>