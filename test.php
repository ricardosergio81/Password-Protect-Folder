<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = "username";
$password = "password";
$url = "http://localhost/htpassword/protected_folder/test1.jpeg";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);

$info = curl_getinfo($ch);
curl_close($ch);

if ($info['http_code'] == 200) {
    header('Content-Type: image/jpeg');
}

echo $output;
