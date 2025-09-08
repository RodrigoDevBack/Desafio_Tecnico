<?php
function createProjectImage(string $name, string $description, string $status, $file_path){
    $url = "http://app:5000/Project/create-plus-image";
    #$url = "http://127.0.0.1:5000/Project/create-plus-image";
    
    $data = [
        'name' => $name,
        'description' => $description,
        'status' => $status,
        'file' => $file_path,
    ];


    $cURL = curl_init($url);


    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($cURL, CURLOPT_POST, true);

    curl_setopt($cURL, CURLOPT_POSTFIELDS, $data);

    curl_setopt($cURL, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer '. $_SESSION['Hash']
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