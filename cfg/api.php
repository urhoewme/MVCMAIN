<?php

$token = $_ENV['TOKEN'];

$headers = [
    'Accept:application/json',
    'Content-Type:application/json',
    "Authorization: Bearer $token",
];

$curl_handle = curl_init();

curl_setopt_array($curl_handle, [
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_RETURNTRANSFER => true,
]);

return $curl_handle;