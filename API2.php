<?php

header('Content-Type: application/json');

$url = 'https://api.quarantine.country/api/v1/summary/region?region=';

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
$json = json_decode($result, true);
curl_close($curl);


echo json_encode($json);

?>
