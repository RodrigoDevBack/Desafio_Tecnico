<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['register'])){
        $user = $_POST['user'] ?? '';
        $password = $_POST['password'] ?? '';

        $response = registerUser( $user, $password );

        if($response) {
            $result_ok1 = 'Completed Register...';
        } else{
            $result_error1 = "User already exists...";
        }
    
    } else if (isset($_POST['update'])){
        $search_user = $_POST['search_user'];
        $new_user = $_POST['new_user'] ?? '';
        $password = $_POST['new_password'] ?? '';

        $response = updateUser( $search_user, $new_user, $password);
        
        if($response) {
            $result_ok2 = "Update Successful...";
        } else{
            $result_error2 = "Invalid User.";
        }
    }
}
?>

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

    <p> <a href="login.php">Back</a></p>
</body>
</html>