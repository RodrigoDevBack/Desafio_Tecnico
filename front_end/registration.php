<?php

include "Requests/user/post_user.php";
include "Requests/user/put_user.php";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['Cadastrar'])){
        $usuario = $_POST['usuario'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $response = registerUser( $usuario, $senha );

        if($response) {
            $result = 'Cadastro concluído...';
            #header('Location: /front_end/login.php');
            #exit;
        } else{
            $erro = "Usuário já existe...";
        }
    
    } else if (isset($_POST['Update'])){
        $usuario_search = $_POST['usuario_search'];
        $usuario_novo = $_POST['usuario_novo'] ?? null;
        $senha_ = $_POST['senha_nova'] ?? null;

        $response = updateUser( $usuario_search, $usuario_novo, $senha_);
        print_r($response);
        if($response) {
            $resulta = "Atualização bem sucessida...";
            #header('Location: /front_end/login.php');
            #exit;
        } else{
            $err = "Usuário inválido.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register User</h2>

    <?php if(!empty($erro)) : ?>
    <p style="color: red"> <?= $erro?> </p>
    <?php endif; ?>

    <?php if(!empty($result)) : ?>
    <p style="color: green"> <?= $result?> </p>
    <?php endif; ?>

    <form method="post">
        <label>Usuario</label>
        <input type="text" name="usuario" placeholder="Usuario" required>
        <label>Senha</label>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit" name="Cadastrar">Cadastrar</button>
    </form>

    <h2>Update User</h2>

    <?php if(!empty($err)) : ?>
    <p style="color: red"> <?= $err?> </p>
    <?php endif; ?>

    <?php if(!empty($resulta)) : ?>
    <p style="color: green"> <?= $resulta?> </p>
    <?php endif; ?>

    <form method="post">
        <label>Usuario</label>
        <input type="text" name="usuario_search" placeholder="Usuario" required>
        <label>Novo Usuario</label>
        <input type="text" name="usuario_novo" placeholder="Usuario Novo">
        <label>Nova Senha</label>
        <input type="password" name="senha_nova" placeholder="Senha Nova">
        <button type="submit" name="Update">Update</button>
    </form>

    <p> <a href="login.php">Back</a></p>
</body>
</html>