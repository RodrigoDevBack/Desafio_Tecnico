<?php
session_start();

$allProject = '';

if (!isset($_SESSION['logon'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    if (isset($_POST['Register'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $status = $_POST['status'];

        createProject($name, $description, $status);

    } else if(isset($_POST['get_one'])){
        $get = $_POST['id'];
        $_SESSION['ID'] = $get;
        $response = getOne($get);
        if(!$response['Fail']){
            $_SESSION['one_project'] = getOne($get)['Result'];
            header('Location: edit_project.php');
            exit;
        } else {
            $error = "Projeto não encontrado";
        }
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
    <h2>Veja os projetos: </h2> <br>

    <h3><?php if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Ver_tudo'])){transform_getAll();}?></h3> <br> <br>

    <form method="post">
        <button type="submit" name="Ver_tudo">Mostrar\Atualizar</button>
    </form> <br> <br>


    <h2>Editar um projeto</h2>

    <?php if (!empty($error)) : ?>
        <p style="color: red"><?=$error?></p>
    <?php endif;?>

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
        <label>Iniciado</label> <br>
        <input type="radio" name="status" value="Iniciado" required> <br>
        <label>Pausado</label> <br>
        <input type="radio" name="status" value="Pausado" required><br>
        <label>Finalizado</label> <br>
        <input type="radio" name="status" value="Finalizado" required> <br> <br>

        <button type="reset">Limpar</button>
        <button type="submit" name="Register">Register</button> <br> <br>
    </form>

    <p><a href="login/logout.php">Sair</a></p>
</body>
</html>