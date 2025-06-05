<?php

include __DIR__ . "/../project/get_all_project.php";

function transform_getAll(){
    $projects_brute = getAll();
    if(is_array($projects_brute) && count($projects_brute) > 0){
        $projects_forming = [[]];
        $count = 0;
        foreach($projects_brute as $projet){
            $date = "Date: ". substr($projet["created_at"], 0, 10);
            $hour = "Time: ". substr( $projet["created_at"], 11, 8). " - ";

            $projects_forming[$count]['id'] = $projet["id"];
            $projects_forming[$count]['Id'] = "Id: ".$projet["id"]. "<br>";
            $projects_forming[$count]['Name'] = "Name: ".$projet["name"]. "<br>";
            $projects_forming[$count]['Description'] = "Description: ".$projet["description"]. "<br>";
            $projects_forming[$count]['Status'] = "Status: ".$projet["status"]. "<br>";
            $projects_forming[$count]['Created_at'] = "Created_at: " . $hour . $date ."<br> <br>";
            $count++;
        }
        return $projects_forming;
    }else{
        return false;
    };
}