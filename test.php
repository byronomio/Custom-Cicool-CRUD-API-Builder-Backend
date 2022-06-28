<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://productmanagement.byronsdesigns.co.za/api/dawnwing_sites/detail?id=5',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_POSTFIELDS => array('field' => 'phpcode','start' => '0','limit' => '1'),
  CURLOPT_HTTPHEADER => array(
    'X-Api-Key: 531DBCBF062810F1EA11FC5F355DDB8E'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$data = $response;
$character = json_decode($data);
$code = $character->data->dawnwing_sites->phpcode;
echo $code;