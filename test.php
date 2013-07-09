<?php

$url = "https://accounts.google.com/ServiceLoginAuth" ;
$data="Email=test@gmail.com&Passwd=blah";

urlencode($data);

//start doing curl stuff

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_COOKIEJAR, '/home/mryan/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, '/home/mryan/cookie.txt');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POST, 2);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);


//actually do the cURL
$output = curl_exec($ch);

curl_close($ch);

echo $output;

?>

