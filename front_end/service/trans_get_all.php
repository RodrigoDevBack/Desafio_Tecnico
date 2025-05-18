<?php
include "Requests/project/get_project.php";

function transform_getAll(){
    $projetos = json_decode(getAll(), true);
    if(is_array($projetos)){
        foreach($projetos as $projet){
            $date = "Date: ". substr($projet["created_at"], 0, 10);
            $hour = "Time: ". substr( $projet["created_at"], 11, 8). " - ";
            echo"Id: ".$projet["id"]. "<br>";
            echo"Name: ".$projet["name"]. "<br>";
            echo"Description: ".$projet["description"]. "<br>";
            echo"Status: ".$projet["status"]. "<br>";
            echo"" . $hour . $date ."<br> <br>";
        }
    }else{
        echo"Não tem ninguém";
    };
}