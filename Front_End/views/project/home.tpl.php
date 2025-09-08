<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <br>
        <h1 class="container text-center">Welcome <?php echo $nameUser ?>!! Your Project Management Dashboard</h1> <br>

        <h2>Show Projects</h2>
        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <?php if (isset($projects_fail)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $projects_fail?>
            </div>
        <?php endif; ?>
        
        <div <?php if (isset($hide) && $hide) echo 'hidden'; ?> class="container mt-4">
            <div class="row g-4">
                <?php if (isset($projects) && $projects) foreach ($projects as $project) : ?>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card p-4 shadow h-100">
                            <div class="card-body">
                                <figure class="figure">
                                    <img class="figure-img img-fluid rounded" src="https://api.singlotown.com.br/images_projects/<?php echo $nameUser?>/<?php echo $project['image_link']?>" alt="project_images">
                                </figure>
                                <p><?php echo $project['Id']; ?></p>
                                <p><?php echo $project['Name']; ?></p>
                                <p><?php echo $project['Description']; ?></p>
                                <p><?php echo $project['Status']; ?></p>
                                <p><?php echo $project['Created_at']; ?></p>
                            </div>
                            <div class="container text-center">
                                <div class="card-footer">
                                    <form method="post">
                                        <input hidden type="number" name='id' value="<?php echo $project["id"] ?>">
                                        <button type="submit" class="btn btn-primary" name="get_one">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <br>

        <form method="post">
            <button type="submit" class="btn btn-primary" name="show_all">Show\Update Projects</button>
        </form> <br>

        <form method="post">
            <button type="submit" class="btn btn-secondary" name="hide">Hide Projects</button>
        </form> <br> <br>


        <h2>Create Project</h2> <br>

        <?php if (!empty($result_created)) : ?>
            <div class="alert alert-success" role="alert">
                <?= $result_created ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($error_created)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error_created ?>
            </div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
            <label class="form-label">Project_image (Opcional)</label> <br> <br>
            
            <div class="card" style="width: 25%;" >
                <img  id="preview_image" alt="Preview Image">
            </div> <br>

            <div class="input-group">
                <input type="file" name="image" accept="image/*" class="form-control" id="input_image">
            </div> <br> <br>
            
            <div class="mb-3">
                <label class="form-label">Project_name</label><br>
                <input type="text" class="form-control" name="name" placeholder="Name" required> <br>
            </div>

            <div class="mb-3">
                <label class="form-label">Project_description</label><br>
                <textarea class="form-control" name="description" placeholder="Description" rows="3"
                    required></textarea><br>
            </div>

            <div class="mb-3">
                <label class="form-label">Project_status</label><br>
                <select name="status" class="form-select" aria-label="Default select example" id="status">
                    <option value="Iniciado">Iniciado</option>
                    <option value="pausado">Pausado</option>
                    <option value="Finalizado">Finalizado</option>
                </select> <br> <br>
            </div>

            <button type="reset" class="btn btn-danger">Limpar</button>
            <button type="submit" class="btn btn-success" name="Register">Register</button> <br> <br>
        </form>

        <form method="post">
            <button type="submit" class="btn btn-danger" name="exit">Exit</button> <br>
        </form>
    </div>

    <script>
        const fileInput = document.getElementById('input_image');
        const preview_image = document.getElementById('preview_image');

        fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview_image.src = e.target.result;
            preview_image.style.display = 'block';
        };
            reader.readAsDataURL(file);
        } else {
            preview_image.style.display = 'none';
        }
    });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>