<?php


function transform_getAll(){
    $projetos = getAll();
    if(is_array($projetos)){
        foreach($projetos as $projet){
            $date = "Date: ". substr($projet["created_at"], 0, 10);
            $hour = "Time: ". substr( $projet["created_at"], 11, 8). " - ";
            echo"Id: ".$projet["id"]. "<br>";
            echo"Name: ".$projet["name"]. "<br>";
            echo"Description: ".$projet["description"]. "<br>";
            echo"Status: ".$projet["status"]. "<br>";
            echo"Created_at: " . $hour . $date ."<br> <br>";
        }
    }else{
        echo"Don't exists projects";
    };
}