<?php
function delete(int $Id){
    $url="http://app:5000/Project/delete";

    $data = [
        'id' => $Id,
    ];

    $json = json_encode($data);

    $cURL = curl_init($url);

    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
    
    curl_setopt($cURL, CURLOPT_CUSTOMREQUEST, "DELETE");

    curl_setopt($cURL, CURLOPT_POSTFIELDS, $json);

    curl_setopt($cURL, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json', 
        'Content-length'. strlen($json)
        ]
    );

    $response = curl_exec($cURL);

    $response = json_decode($response, true);

    if(!$response['Fail']){

        return $response['Result'];
    } else{
        curl_close($cURL);

        return false;
    }
}