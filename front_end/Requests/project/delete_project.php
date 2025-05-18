<?php
function delete(int $Id): bool|string{
    $url="http://app:5000/Project/delete";

    $data = [
        'id' => $Id,
    ];

    $json = json_encode($data);

    $crl = curl_init();

    curl_setopt($crl, CURLOPT_URL, $url);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($crl, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($crl, CURLOPT_POSTFIELDS, $json);
    curl_setopt($crl, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Context-length'. strlen($json)]);

    $response = curl_exec($crl);

    if(curl_error($crl)){
        curl_close($crl);
        return curl_error($crl);
    } else{
        curl_close($crl);
        return $response;
    }
}