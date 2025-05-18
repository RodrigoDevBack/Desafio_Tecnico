<?php
session_start();

include "Requests/project/delete_project.php";
include "Requests/project/put_project.php";
include "service/project/trans_get_one.php";

if (!isset($_SESSION['logado'])) {
    header('Location: front_end/login.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(isset($_POST['Delete'])){
        $id = $_SESSION['ID'];
        delete($id);
        header('Location: home.php');
        exit;
    } else if(isset($_POST['Rewrite'])){
        $id = $_SESSION['ID'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $status = $_POST['status'] ?? null;
        put_project(id: $id, name: $name, description: $description, status: $status);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2><?php transform_getOne($_SESSION['ID'])?></h2>

    <h2>Rewrite Project</h2> <br>

    <form method="post">

        <label>Project_name</label><br>
        <input type="text" name="name" > <br><br>

        <label>Project_description</label><br>
        <input type="text" name="description" ><br><br>

        <label>Project_status</label><br>
        <label>Iniciado</label> <br>
        <input type="radio" name="status" value="Iniciado"> <br>
        <label>Pausado</label> <br>
        <input type="radio" name="status" value="Pausado" ><br>
        <label>Finalizado</label> <br>
        <input type="radio" name="status" value="Finalizado" > <br> <br>

        <button type="reset">Limpar</button>
        <button type="submit" name="Rewrite">Rewrite</button> <br>
    </form>

    <h2>Delete Project</h2> <br>

    <form method="post">

        <button type="submit" name="Delete">Delete</button> <br>
    </form>
    <p><a href="home.php">Voltar</a></p>
    <p><a href="logout.php">Sair</a></p>
</body>
</html>