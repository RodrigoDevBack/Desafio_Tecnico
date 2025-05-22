<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'] ?? '';
    $password = $_POST['password'] ?? '';

    $response = loginUser( $user, $password );
    
    if($response) {;
        $_SESSION['logon'] = true;
        header('Location: /front_end/home.php');
        exit;
    } else{
        $error = "Invalid user or password...";
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

    <?php if(!empty($error)) : ?>
        <p style="color: red"> <?= $error?> </p>
    <?php endif; ?>

    <form method="post">
        <label>User</label><br>
        <input type="text" name="user" placeholder="User" required> <br><br>
        
        <label>Password</label><br>
        <input type="password" name="password" placeholder="Password" required> <br><br>

        <button type="submit">Acess</button> <br> <br>

    </form>
        <p> <a href="/front_end/login/registration.php">Create/Update User</a></p>
</body>
</html>