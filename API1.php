<?php

header('Content-Type: application/json');

$apikey ='c626fc09ea9b4e71ad94c5622c5f6733';

$url = 'https://ipgeolocation.abstractapi.com/v1/?api_key='.$apikey;
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
$json = json_decode($result, true);
curl_close($curl);


echo json_encode($json);

?>
