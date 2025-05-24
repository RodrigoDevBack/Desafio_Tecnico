<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
</head>
<body>
    <h2>Register User</h2> <br>

    <?php if(!empty($result_error1)) : ?>
    <p style="color: red"> <?= $result_error1?> </p>
    <?php endif; ?>

    <?php if(!empty($result_ok1)) : ?>
    <p style="color: green"> <?= $result_ok1?> </p>
    <?php endif; ?>

    <form method="post">
        <label>User</label> <br>
        <input type="text" name="user" placeholder="User" required> <br> <br>
        
        <label>Password</label> <br>
        <input type="password" name="password" placeholder="Password" required> <br> <br>

        <button type="submit" name="register">Register</button> <br> <br>
    </form>

    <form method="post">
        <button type="submit" name="back">Back</button>
    </form>
</body>
</html>