<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container text-center">
        <div class="d-flex justify-content-center align-items-center min-vh-100 py-4">
            <div class="card p-4 shadow" style="width: 300px;">
                <h2>Register User</h2> <br>

                <?php if (!empty($result_error1)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $result_error1 ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($result_ok1)) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= $result_ok1 ?>
                    </div>
                <?php endif; ?>

                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">User</label>
                        <input type="text" class="form-control" name="user" placeholder="User" required>
                    </div>

                    <div class="mb-3">
                        <label class="mb-3">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>

                    <button type="submit" class="btn btn-primary" name="register">Register</button> <br> <br>
                </form>

                <form method="post">
                    <button type="submit" class="btn btn-secondary" name="back">Back</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>