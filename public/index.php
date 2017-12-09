<?php

$url = ltrim($_SERVER['REQUEST_URI'], '/');

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);

$response = curl_exec($ch);

$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$headers = substr($response, 0, $header_size);
$body = substr($response, $header_size);

curl_close($ch);

foreach (explode("\r\n", $headers) as $header) {
    header($header);
}

header('Access-Control-Allow-Origin: *');

echo $body;
