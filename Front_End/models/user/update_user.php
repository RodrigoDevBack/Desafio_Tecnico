<?php
function updateUser($user, $new_name = null,  $password = null) {
    $url = "http://app:5000/user/update";
    #$url = "http://127.0.0.1:5000/user/update";

    $data = [
        'user' => [
        'search_user' => $user
        ],
        'update' => [
            'name_user' => $new_name,
            'password' => $password,
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
    
    if (curl_getinfo($cURL, CURLINFO_HTTP_CODE) != 200) {
        curl_close($cURL);  

        return false;
    } else {
        curl_close($cURL);
        
        return true;
    }
}