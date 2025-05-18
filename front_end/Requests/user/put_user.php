<?php
function updateUser($user, $new_name = null,  $password = null) {
    $url = "http://app:5000/user/update";

    $data = ["user" => ["search_user" => $user,]];
    $update = [];

    if ( !is_null($new_name)) {
        $update['name_user'] = $new_name;
    }

    if ( !is_null($password)) {
        $update['user_hash_password'] = $password;
    }

    if (!empty($update)){
        $data['update'] = $update;
    }

    $json = json_encode($data);

    $cURL = curl_init($url);

    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($cURL, CURLOPT_CUSTOMREQUEST, 'PUT');

    curl_setopt($cURL, CURLOPT_POSTFIELDS, $json);

    curl_setopt($cURL, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Content-Length: '. strlen($json)] );

    $response = curl_exec($cURL);

    $response = json_decode($response, true);

    if ($response !== null && $response['Fail'] !== null) {
        curl_close($cURL);

        return false;
    } else {
        curl_close($cURL);
        
        return true;
    }
}