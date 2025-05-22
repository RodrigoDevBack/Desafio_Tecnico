<?php
session_start();

if (!isset($_SESSION['logon'])) {
    header('Location: login.php');
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
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';
        $status = $_POST['status'] ?? '';

        updateProject($id, $name,  $description,  $status);
    }
}

?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project_Edition</title>
</head>
<body>

    <h2><?php transform_getOne(getOne($_SESSION['ID'])['Result'])?></h2>

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
    <p><a href="login/logout.php">Sair</a></p>
</body>
</html>