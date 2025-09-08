<?php

include __DIR__ . "/../models/transform_data/trans_get_all.php";
include __DIR__ . "/../models/transform_data/trans_get_one.php";
include __DIR__ . "/../models/project/create_project.php";
include __DIR__ . "/../models/project/delete_project.php";
include __DIR__ . "/../models/project/update_project.php";
include __DIR__ . "/../models/project/update_project_image.php";
include __DIR__ . "/../models/project/create_project_image.php";



class projectController{
    public function home(){
        session_start();

        
        if (!isset($_SESSION['logon'])) {
            (new userController()) -> logout();
        }

        $nameUser = $_SESSION["nameUser"];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Register'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $image_file = $_FILES['image'] ?? null;

            if ($image_file['error'] === UPLOAD_ERR_OK){
                $file_image = new CURLFile($image_file['tmp_name'], $image_file['type'], $image_file['name']);
                $response = createProjectImage($name, $description, $status, $file_image);
            } else{
                $response = createProject($name, $description, $status);
            }

            if ($response) {
                $result_created = "Project successfully created";
            } else {
                $error_created = "Project not created";
            }

        } else if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['get_one'])){
            $get = (int)$_POST['id'];
            $_SESSION['ID'] = $get;
            $response = getOne($get);

            if($response){
                $_SESSION['one_project'] = getOne($get);
                header('Location: /project/edition.tpl.php');
                exit;
            } else {
                $error = "Project not found";
            }
        } else if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['show_all'])){
            $projects_verify = transform_getAll();
            if ($projects_verify){
                $projects = $projects_verify;
            } else{
                $projects_fail = "You have not created any projects";
                $project = false;
            }

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
            $image_file = $_FILES['file'] ?? '';

            if ($image_file['error'] === UPLOAD_ERR_OK){
                $file_image = new CURLFile($image_file['tmp_name'], $image_file['type'], $image_file['name']);
                updateProjectImage($id, $file_image);
            }

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

        $project = transform_getOne(getOne($_SESSION['ID']));
        
        include __DIR__ . "/../views/project/edition.tpl.php";
    }  
} 