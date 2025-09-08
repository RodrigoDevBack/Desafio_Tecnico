<?php
function updateProject(int $id, $name = null, $description = null, $status = null)
{
    $url = "http://app:5000/Project/update";
    #$url = "http://127.0.0.1:5000/Project/update";

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
        'Content-length'. strlen($json),
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