<?php
session_start();

include "Requests/user/login_user.php";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $response = loginUser( $usuario, $senha );

    $response = json_decode($response, true);
    
    if(isset($response) && $response['Login'] == "True") {;
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = $usuario;
        header('Location: /front_end/home.php');
        exit;
    } else{
        $erro = "Usuário ou senha inválidos.";
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php if(!empty($erro)) : ?>
        <p style="color: red"> <?= $erro?> </p>
    <?php endif; ?>

    <form method="post">
        <label>Usuário</label><br>
        <input type="text" name="usuario" placeholder="Usuário" required> <br><br>
        <label>Senha</label><br>
        <input type="password" name="senha" placeholder="Senha" required> <br><br>
        <button type="submit">Entrar</button>
    </form>
        <p> <a href="/front_end/registration.php">Create/Update User</a></p>
</body>
</html>
