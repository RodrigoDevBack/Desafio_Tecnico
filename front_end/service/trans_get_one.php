<?php
include "Requests/project/get_one_project.php";

function transform_getOne(int $id ){
    $project = json_decode(getOne($id), true);
    $date = "Date: ". substr($project["created_at"], 0, 10);
    $hour = "Time: ". substr( $project["created_at"], 11, 8). " - ";
    echo"Id: ".$project["id"]. "<br>";
    echo"Name: ".$project["name"]. "<br>";
    echo"Description: ".$project["description"]. "<br>";
    echo"Status: ".$project["status"]. "<br>";
    echo"" . $hour . $date ."<br> <br>";
}