<?php
function createProject(string $name, string $description, string $status){
    $url = "http://app:5000/Project/create";
    
    $data = [
        'name' => $name,
        'description' => $description,
        'status' => $status,
    ];

    $json = json_encode($data);

    $cURL = curl_init($url);


    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($cURL, CURLOPT_POST, true);

    curl_setopt($cURL, CURLOPT_POSTFIELDS, $json);

    curl_setopt($cURL, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json', 
        'Context-Length: '. strlen($json),
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