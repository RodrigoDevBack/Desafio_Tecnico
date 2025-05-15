<?php
function put_project(int $id, string $name, string $description, string $status): bool|string {
$url = "http://app:5000/Project/put";

$data = [
    'Id' => [
        'id' => $id
    ],
    'edit' => [
        'name' => $name,
        'description' => $description,
        'status' => $status,
        ]
];

$json = json_encode($data);

$crl = curl_init($url);

curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($crl, CURLOPT_CUSTOMREQUEST, "PUT");
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