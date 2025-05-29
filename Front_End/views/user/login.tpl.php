<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container text-center">
        <div class="d-flex justify-content-center align-items-center min-vh-100 py-4">
            <div class="card p-4 shadow" style="width: 300px;">
                <h2>Login</h2> <br>

                <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <?php endif; ?>

                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">User</label><br>
                        <input type="text" class="form-control" name="user" placeholder="User" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label><br>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>

                    <button type="submit" class="btn btn-primary" name="acess">Acess</button> <br> <br>
                </form>

                <form method="post">
                    <button type="submit" class="btn btn-secondary" name="update">Forgot your password?</button> <br> <br>
                </form>

                <form method="post">
                    <button type="submit" class="btn btn-secondary" name="register">Register now</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>