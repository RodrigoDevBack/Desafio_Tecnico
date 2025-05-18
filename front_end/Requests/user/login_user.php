<?php

function loginUser($user, $password) {
    $url = "http://app:5000/user/login";

    $data = [
        "name" => $user,
        "password" => $password];

    $json = json_encode($data);

    $cURL = curl_init($url);

    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($cURL, CURLOPT_PUT, true);

    curl_setopt($cURL, CURLOPT_POSTFIELDS, $json);

    curl_setopt($cURL, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Context-Length: '. strlen($json)] );

    $response = curl_exec($cURL);

    if (curl_error($cURL)){
        curl_close($cURL);

        $response = curl_error($cURL);

        return $response;
    } else {
        curl_close($cURL);
        
        return $response;
    }
}