<?php


function transform_getOne($dict){
    $project = $dict;
    $date = "Date: ". substr($project["created_at"], 0, 10);
    $hour = "Time: ". substr( $project["created_at"], 11, 8). " - ";
    echo"Id: ".$project["id"]. "<br>";
    echo"Name: ".$project["name"]. "<br>";
    echo"Description: ".$project["description"]. "<br>";
    echo"Status: ".$project["status"]. "<br>";
    echo"Created_at: " . $hour . $date ."<br> <br>";
}