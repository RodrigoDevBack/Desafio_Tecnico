<?php
function getAll()
{
    $url = "http://app:5000/Project/getall";

    $cURL = curl_init($url);

    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($cURL, CURLOPT_HTTPGET, true);

    curl_setopt(
        $cURL,
        CURLOPT_HTTPHEADER,
        [
            'Authorization: Bearer ' . $_SESSION['Hash']
        ]
    );

    $response = curl_exec($cURL);

    $response = json_decode($response, true);

    switch (curl_errno($cURL)) {
        case 0:
            curl_close($cURL);
            return $response;
        default:
            curl_close($cURL);
            return false;
    }
}
