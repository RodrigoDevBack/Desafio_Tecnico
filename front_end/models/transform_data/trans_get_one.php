<?php

include __DIR__ . "/../project/get_one_project.php";

function transform_getOne($dict){
    $project_brute = $dict;
    $project = [];
    $date = "Date: ". substr($project_brute["created_at"], 0, 10);
    $hour = "Time: ". substr( $project_brute["created_at"], 11, 8). " - ";
    $project['Id'] = "Id: ".$project_brute["id"]. "<br>";
    $project['Name'] = "Name: ".$project_brute["name"]. "<br>";
    $project['Description'] = "Description: ".$project_brute["description"]. "<br>";
    $project['Status'] = "Status: ".$project_brute["status"]. "<br>";
    $project['Created_at'] = "Created_at: " . $hour . $date ."<br> <br>";
    return $project;
}