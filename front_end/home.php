<?php
session_start();


include "Requests/get_php.php";
include "Requests/post_php.php";

$allProject = '';

if (!isset($_SESSION['logado'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    if (isset($_POST['Register'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        post_project($name, $description, $status);

    } else if(isset($_POST['Ver_tudo'])){
        $allProject = getAll();

    } else if(isset($_POST['get_one'])){
        $get = $_POST['id'];
        $_SESSION['ID'] = $get;
        header('Location: editProject.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
</head>
<body>
    <h2>Veja todos os projetos: </h2> <br>

    <h3><?php echo $allProject; ?></h3> <br> <br>

    <form method="post">
        <button type="submit" name="Ver_tudo">Atualizar</button>
    </form> <br> <br>


    <h2>Editar um projeto</h2>

    <form method="post">
        <h3>Project ID</h3> <br>
        <input type="number" name= 'id' placeholder="ID_Project"> <br>
        <button type="submit" name="get_one">Editar</button> <br>
    </form> <br> <br>

    <h2>Create Project</h2> <br>

    <form method="post">

        <label>Project_name</label><br>
        <input type="text" name="name" placeholder="Name" required> <br><br>

        <label>Project_description</label><br>
        <input type="text" name="description" placeholder="Description" required><br><br>

        <label>Project_status</label><br>
        <input type="text" name="status" placeholder="Status" required><br><br>

        <button type="reset">Limpar</button>
        <button type="submit" name="Register">Register</button> <br> <br>
    </form>

    <p><a href="logout.php">Sair</a></p>
</body>
</html>