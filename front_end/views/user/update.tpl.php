<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2> <br>

    <?php if(!empty($result_error2)) : ?>
    <p style="color: red"> <?= $result_error2?> </p>
    <?php endif; ?>

    <?php if(!empty($result_ok2)) : ?>
    <p style="color: green"> <?= $result_ok2?> </p>
    <?php endif; ?>

    <form method="post">
        <label>User</label> <br>
        <input type="text" name="search_user" placeholder="User" required> <br> <br>

        <label>New User</label> <br>
        <input type="text" name="new_user" placeholder="New_User"> <br> <br>

        <label>New Password</label> <br>
        <input type="password" name="new_password" placeholder="New_Password"> <br><br>

        <button type="submit" name="update">Update</button> <br> <br>
    </form>
    
    <form method="post">
        <button type="submit" name="back">Back</button>
    </form>
</body>
</html>