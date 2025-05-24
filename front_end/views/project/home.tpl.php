<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
</head>
<body>
    <h2>Veja os projetos: </h2> <br>

    <h3><?php if(isset($projects)) foreach($projects as $project) : ?>
        <p><?php echo $project['Id']; ?></p> 
        <p><?php echo $project['Name']; ?></p> 
        <p><?php echo $project['Description']; ?></p>
        <p><?php echo $project['Status']; ?></p>
        <p><?php echo $project['Created_at']; ?></p>
    <?php endforeach;?> </h3>

    <form method="post">
        <button type="submit" name="Ver_tudo">Mostrar\Atualizar</button>
    </form> <br> <br>


    <h2>Editar um projeto</h2>

    <?php if (!empty($error)) : ?>
        <p style="color: red"><?=$error?></p>
    <?php endif;?>

    <form method="post">
        <label>Project ID</label> <br>
        <input type="number" name= 'id' placeholder="ID_Project" required> <br>
        <button type="submit" name="get_one">Editar</button> <br>
    </form> <br> <br>

    <h2>Create Project</h2> <br>

    <form method="post">

        <label>Project_name</label><br>
        <input type="text" name="name" placeholder="Name" required> <br><br>

        <label>Project_description</label><br>
        <input type="text" name="description" placeholder="Description" required><br><br>

        <label>Project_status</label><br>
        <label>Iniciado</label> <br>
        <input type="radio" name="status" value="Iniciado" required> <br>
        <label>Pausado</label> <br>
        <input type="radio" name="status" value="Pausado" required><br>
        <label>Finalizado</label> <br>
        <input type="radio" name="status" value="Finalizado" required> <br> <br>

        <button type="reset">Limpar</button>
        <button type="submit" name="Register">Register</button> <br> <br>
    </form>
    
    <form method="post">
        <button type="submit" name="exit">Exit</button> <br>
    </form>
</body>
</html>