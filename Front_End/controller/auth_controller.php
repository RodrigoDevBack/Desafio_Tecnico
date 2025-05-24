<?php

include __DIR__ . "/../models/user/login_user.php";

include __DIR__ . "/../models/user/register_user.php";

include __DIR__ . "/../models/user/update_user.php";

class userController{
    public function login(){
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acess'])) {
            $user = $_POST['user'] ?? '';
            $password = $_POST['password'] ?? '';

            $response = loginUser( $user, $password );

            if($response) {;
                $_SESSION['logon'] = true;
                header('Location: /../project/home.tpl.php');
                exit;
            } else{
                $error = "Invalid user or password...";
            }
        } else if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])){
            header("Location: /user/update.tpl.php");
            exit();

        } else if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register"])){
            header("Location: /user/register.tpl.php");
            exit();

        }

        include __DIR__ . "/../views/user/login.tpl.php";
    }

    public function register(){
        session_start();

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])){
            $user = $_POST['user'] ?? '';
            $password = $_POST['password'] ?? '';

            $response = registerUser( $user, $password );

            if($response) {
                $result_ok1 = 'Completed Register...';
            } else{
                $result_error1 = "User already exists...";
            }

        } else if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["back"])){
            header("Location: /user/login.tpl.php");
            exit();
            
        }

        include __DIR__ . "/../views/user/register.tpl.php";
    }

    public function update(){
        session_start();

        if (isset($_POST['update'])){
            $search_user = $_POST['search_user'];
            $new_user = $_POST['new_user'] ?? '';
            $password = $_POST['new_password'] ?? '';

            $response = updateUser( $search_user, $new_user, $password);
        
            if($response) {
                $result_ok2 = "Update Successful...";
            } else{
                $result_error2 = "Invalid User.";
            }
        } else if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["back"])){
            header("Location: /user/login.tpl.php");
            exit();
            
        }

        include __DIR__ . "/../views/user/update.tpl.php";
    }

    public function logout(){
        session_destroy();
        header('Location: /user/login.tpl.php');
        exit;
    }
}