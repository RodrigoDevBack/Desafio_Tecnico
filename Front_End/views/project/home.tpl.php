<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <br>
        <h2 class="container text-center">Show Projects</h2> <br>

        <div <?php if(isset($hide) && $hide) echo 'hidden'; ?> class="container mt-4">
            <div class="row g-4">
                <?php if (isset($projects)) foreach ($projects as $project) : ?>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card p-4 shadow h-100">
                            <p><?php echo $project['Id']; ?></p>
                            <p><?php echo $project['Name']; ?></p>
                            <p><?php echo $project['Description']; ?></p>
                            <p><?php echo $project['Status']; ?></p>
                            <p><?php echo $project['Created_at']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <br>

        <form method="post">
            <button type="submit" class="btn btn-primary" name="show_all">Show\Update</button>
        </form> <br>

        <form method="post">
            <button type="submit" class="btn btn-secondary" name="hide">Hide</button>
        </form> <br> <br>

        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <div style="width: 400px;">
            <h2>Update a project</h2>
            <form method="post">
                <label class="form-label">Project ID</label> <br>
                <input type="number" class="form-control" name='id' placeholder="ID_Project" required> <br>
                <button type="submit" class="btn btn-primary" name="get_one">Edit</button> <br>
            </form> <br> <br>
        </div>

        <div style="width: 400px;">
            <h2>Create Project</h2> <br>
            <form method="post">

                <label class="form-label">Project_name</label><br>
                <input type="text" class="form-control" name="name" placeholder="Name" required> <br>

                <label class="form-label">Project_description</label><br>
                <textarea class="form-control" name="description" placeholder="Description" rows="3" required> </textarea><br>

                <label class="form-label">Project_status</label><br>

                <select name="status" class="form-select" aria-label="Default select example" id="status" required>
                    <option value="Iniciado">Iniciado</option>
                    <option value="pausado">Pausado</option>
                    <option value="Finalizado">Finalizado</option>
                </select> <br> <br>

                <button type="reset" class="btn btn-danger">Limpar</button>
                <button type="submit" class="btn btn-success" name="Register">Register</button> <br> <br>
            </form>
        </div>

        <form method="post">
            <button type="submit" class="btn btn-danger" name="exit">Exit</button> <br>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>