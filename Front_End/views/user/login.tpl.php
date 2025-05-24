<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        <button type="submit" name="acess">Acess</button> <br> <br>

    </form> <br>
    
    <form method="post">
        <button type="submit" name="update">Esqueceu a senha?</button> <br> <br>
    </form>

    <form method="post">
        <button type="submit" name="register">Register now</button>
    </form>
</body>
</html>