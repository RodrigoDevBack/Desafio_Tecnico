<?php

include __DIR__ . "/../models/transform_data/trans_get_all.php";
include __DIR__ . "/../models/transform_data/trans_get_one.php";
include __DIR__ . "/../models/project/create_project.php";
include __DIR__ . "/../models/project/delete_project.php";
include __DIR__ . "/../models/project/update_project.php";



class projectController{
    public function home(){
        session_start();

        if (!isset($_SESSION['logon'])) {
            (new userController()) -> logout();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Register'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $status = $_POST['status'];

            createProject($name, $description, $status);

        } else if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['get_one'])){
            $get = $_POST['id'];
            $_SESSION['ID'] = $get;
            $response = getOne($get);

            if(!$response['Fail']){
                $_SESSION['one_project'] = getOne($get)['Result'];
                header('Location: /project/edition.tpl.php');
                exit;
            } else {
                $error = "Projeto não encontrado";
            }
        } else if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['show_all'])){
            $projects = transform_getAll();

        } else if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['hide'])){
            $hide = true;

        } else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['exit'])) {
            (new userController()) -> logout();

        }

        include __DIR__ . "/../views/project/home.tpl.php";

    }

    public function edition(){
        session_start();

        if (!isset($_SESSION['logon'])) {
            (new userController()) -> logout();
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Rewrite'])){
            $id = $_SESSION['ID'];
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $status = $_POST['status'] ?? '';

            updateProject($id, $name,  $description,  $status);

        } else if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])){
            $id = $_SESSION['ID'];

            delete($id);

            header('Location: /project/home.tpl.php');
            exit;

        } else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['back'])){
            header('Location: /project/home.tpl.php');
            exit;

        } else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['exit'])) {
            (new userController()) -> logout();
            
        }

        $project = transform_getOne(getOne($_SESSION['ID'])['Result']);
        
        include __DIR__ . "/../views/project/edition.tpl.php";
    }  
} 