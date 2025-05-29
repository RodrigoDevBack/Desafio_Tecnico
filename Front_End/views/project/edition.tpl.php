<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project_Edition</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>
<body>

    <h3>
        <p><?php echo $project['Id']; ?></p> 
        <p><?php echo $project['Name']; ?></p> 
        <p><?php echo $project['Description']; ?></p>
        <p><?php echo $project['Status']; ?></p>
        <p><?php echo $project['Created_at']; ?></p> 
    </h3>

    <h2>Rewrite Project</h2> <br>

    <form method="post">

        <label>Project_name</label><br>
        <input type="text" name="name" > <br><br>

        <label>Project_description</label><br>
        <input type="text" name="description" ><br><br>

        <label>Project_status</label><br>
        <select name="status" class="form-select" aria-label="Default select example" id="status" required>
            <option value="Iniciado">Iniciado</option>
            <option value="pausado">Pausado</option>
            <option value="Finalizado">Finalizado</option>
        </select> <br> <br>

        <button type="reset">Limpar</button>
        <button type="submit" name="Rewrite">Rewrite</button> <br>
    </form>

    <h2>Delete Project</h2> <br>

    <form method="post">
        <button type="submit" name="delete">Delete</button> <br> <br>
    </form>
    
    <form method="post">
        <button type="submit" name="back">Back</button> <br> <br>
    </form>
    
    <form method="post">
        <button type="submit" name="exit">Exit</button> <br>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
