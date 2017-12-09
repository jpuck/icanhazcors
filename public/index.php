<?php

header('Access-Control-Allow-Origin: *');

$url = ltrim($_SERVER['REQUEST_URI'], '/');

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);

curl_close($ch);
