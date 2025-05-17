<?php
function post_project(string $name, string $description, string $status): bool|string{
    $postData = [
        'name' => $name,
        'description' => $description,
        'status' => $status,
    ];

    $json = json_encode($postData);

    $crl = curl_init("http://app:5000/Project/create");


    curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($crl, CURLOPT_POST, true);

    curl_setopt($crl, CURLOPT_POSTFIELDS, $json);

    curl_setopt($crl, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Context-Length: '. strlen($json)] );


    $resultado = curl_exec($crl);

    if(curl_error($crl)){
        curl_close($crl);
        return curl_error($crl);
    } else{
        curl_close($crl);
        return $resultado;
    }
}