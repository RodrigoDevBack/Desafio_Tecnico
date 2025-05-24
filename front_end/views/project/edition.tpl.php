<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project_Edition</title>
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
        <label>Iniciado</label> <br>
        <input type="radio" name="status" value="Iniciado"> <br>
        <label>Pausado</label> <br>
        <input type="radio" name="status" value="Pausado" ><br>
        <label>Finalizado</label> <br>
        <input type="radio" name="status" value="Finalizado" > <br> <br>

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
    
</body>
</html>
