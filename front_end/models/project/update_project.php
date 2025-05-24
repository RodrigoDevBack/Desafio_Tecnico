<?php
function updateProject(int $id, $name = null, $description = null, $status = null){
    $url = "http://app:5000/Project/update";

    $data = [
        'Id' => [
            'id' => $id
        ],
        'update_project' => [
            'name' => $name,
            'description' => $description,
            'status' => $status,
            ]
    ];

    $json = json_encode($data);

    $cURL = curl_init($url);

    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($cURL, CURLOPT_CUSTOMREQUEST, "PUT");

    curl_setopt($cURL, CURLOPT_POSTFIELDS, $json);

    curl_setopt($cURL, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json', 
        'Content-length'. strlen($json)
        ]
    );

    $response = curl_exec($cURL);

    $response = json_decode($response, true);

    if(!$response['Fail']){
        curl_close($cURL);

        return $response['Result'];
    } else{
        curl_close($cURL);

        return false;
    }
}