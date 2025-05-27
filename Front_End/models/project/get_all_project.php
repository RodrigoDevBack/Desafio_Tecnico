<?php  
function getAll(){
    $url = "http://app:5000/Project/getall";

    $cURL = curl_init($url);

    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($cURL, CURLOPT_HTTPGET, true);

    curl_setopt($cURL, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer '. $_SESSION['Hash']
        ]
    );

    $response = curl_exec($cURL);

    $response = json_decode($response, true);

    if(curl_error($cURL)){
        curl_close($cURL);

        $response = curl_error($cURL);

        return $response;
    } else{
        curl_close($cURL);
        
        return $response;
    }
}