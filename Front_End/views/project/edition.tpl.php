<!DOCTYPE html>
<html lang="pt_br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project_Edition</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <br>
        <h1 class="container text-center">Project Edition</h1> <br> <br>

        <h2>Project</h2> <br>

        <div class="card p-4 shadow h-100">
            <p><?php echo $project['Id']; ?></p>
            <p><?php echo $project['Name']; ?></p>
            <p><?php echo $project['Description']; ?></p>
            <p><?php echo $project['Status']; ?></p>
            <p><?php echo $project['Created_at']; ?></p>
        </div> <br> <br>

        <h2>Rewrite Project</h2> <br>

        <form method="post">
            <div class="mb-3">
                <label class="form-label">Project_name</label><br>
                <input type="text" class="form-control" name="name" placeholder="Project Name">
            </div> <br><br>

            <div class="mb-3">
                <label class="form-label">Project_description</label><br>
                <textarea type="text" class="form-control" name="description" placeholder="Description"></textarea>
            </div> <br><br>

            <div class="mb-3">
                <label class="form-label">Project_status</label><br>
                <select name="status" class="form-select" id="status">
                    <option value="">--</option>
                    <option value="Iniciado">Iniciado</option>
                    <option value="pausado">Pausado</option>
                    <option value="Finalizado">Finalizado</option>
                </select>
            </div> <br> <br>

            <button type="submit" class="btn btn-success" name="Rewrite">Rewrite</button>
            <button type="reset" class="btn btn-danger">Limpar</button>
            <button type="submit" class="btn btn-danger" name="delete">Delete Project</button>
        </form> <br> <br>

        <form method="post">
            <button type="submit" class="btn btn-secondary" name="back">Back</button>
        </form> <br> <br>

        <form method="post">
            <button type="submit" class="btn btn-danger" name="exit">Exit</button>
        </form> <br> <br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>