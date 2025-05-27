<?php

function loginUser($user, $password) {
    $url = "http://app:5000/user/login";

    $data = [
        "username" => $user,
        "password" => $password
    ];

    $cURL = curl_init($url);

    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($cURL, CURLOPT_PUT, true);

    curl_setopt($cURL, CURLOPT_POSTFIELDS, http_build_query($data));

    curl_setopt($cURL, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded' ] 
    );

    $response = curl_exec($cURL);

    $response = json_decode($response, true);

    if (!$response['access_token']) {
        curl_close($cURL);

        return false;
    } else {
        curl_close($cURL);
        //print_r($response);
        $_SESSION['Hash'] = $response['access_token'] ?? null;

        return true;
    }
}