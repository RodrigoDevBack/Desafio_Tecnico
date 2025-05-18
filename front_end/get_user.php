<?php

function getUsers(){

    $url = "http://app:5000/User/Users";

    $cURL = curl_init($url);

    curl_setopt($cURL, CURLOPT_HTTPGET, true);

    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec( $cURL );

    if ( curl_error( $cURL ) ){
        $response = curl_error( $cURL );
        curl_close( $cURL );
        return $response;
    } else{
        curl_close( $cURL );
        return $response;
    }
}

