<?php  
function getOne(int $id): mixed{

    $postData = ['id' => $id];
    
    $json = json_encode($postData);

    //Inicializar
    $cURL = curl_init("http://app:5000/Project/getone");

    //Habilita Recuperar dados
    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($cURL, CURLOPT_POST, true);

    curl_setopt($cURL, CURLOPT_POSTFIELDS, $json);

    curl_setopt($cURL, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Context-Length: '. strlen($json)]);

    //Initialize
    $response = curl_exec($cURL);

    if(curl_error($cURL)){
        curl_close($cURL);
        $response = curl_error($cURL);
        return $response;
    } else{
        curl_close($cURL);
        return $response;
    }
}