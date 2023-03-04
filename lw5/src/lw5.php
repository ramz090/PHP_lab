<?php

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, 'https://favqs.com/api/qotd');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$curlResult = curl_exec($curl);

curl_close($curl);
$curlResult = json_decode($curlResult);

echo $curlResult->quote->body;