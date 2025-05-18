<?php
function put_project(int $id, $name = null, $description = null, $status = null): bool|string {
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

if ($data['update_project']['name'] == null) {
    unset($data['update_project']['name']);
} 
if($data['update_project']['description'] == null) {
    unset($data['update_project']['description']);
} 
if ($data['update_project']['status'] === null) {
    unset($data['update_project']['status']);
}

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