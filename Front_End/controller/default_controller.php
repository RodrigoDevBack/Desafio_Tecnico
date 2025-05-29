<?php

class Default_controller {
    public function default(){
        session_start();

        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['start'])){
            (new userController()) -> logout();
        }

        include __DIR__ . "/../views/default.tpl.php";
    }
}