<?php
function updateUser($user, $new_name = null,  $password = null) {
    $url = "http://app:5000/user/update";

    $data = [
        'user' => [
        'search_user' => $user
        ],
        'update' => [
            'name_user' => $new_name,
            'user_hash_password' => $password,
        ]
    ];

    $json = json_encode($data);

    $cURL = curl_init($url);

    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($cURL, CURLOPT_CUSTOMREQUEST, 'PUT');

    curl_setopt($cURL, CURLOPT_POSTFIELDS, $json);

    curl_setopt($cURL, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json', 
        'Content-Length: '. strlen($json)] 
    );

    $response = curl_exec($cURL);
    
    $response = json_decode($response, true);
    
    if (!$response['Fail']) {
        curl_close($cURL);

        return true;
    } else {
        curl_close($cURL);
        
        return false;
    }
}