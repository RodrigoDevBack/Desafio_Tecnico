<?php  
function getAll(): mixed{

    //Inicializar
    $cURL = curl_init("http://app:5000/Project/getall");

    //Habilita Recuperar dados
    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($cURL, CURLOPT_HTTPGET, true);

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