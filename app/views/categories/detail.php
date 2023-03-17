<html>
    <head>    
		<title>Arteria</title>
		<meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= constant('URL') ?>public/css/style.css">
    </head>
    <body class="bg-dark bg-gradient">
        <?php
            include 'app/views/navBar.php';
        ?>
        <form action="<?= constant('URL') ?>categories/editCategory" class="" method="POST">
            <table class="table table-dark table-striped table-hover d-flex justify-content-center border-secondary rounded ">
                <tr>
                <th colspan="2">Categoria</th></tr>
                <tr>
                    <td>id</td>
                    <td><input class="form-control ms-2" type="text" name="" value="<?= $this->categoryView->id ; ?>" disabled></td>
                </tr>
                <tr>
                    <td>categoria</td>
                    <td><input class="form-control ms-2" type="text" name="category" value="<?= $this->categoryView->category ; ?>" required></td>
                </tr>
                <tr>
                    <td>caracteristicas</td>
                    <td><input class="form-control ms-2" type="text" name="characteristics" value="<?= $this->categoryView->characteristics ; ?>" required></td>
                </tr>
                <tr> 	
                    <td colspan="2">
                        <a href="<?= constant('URL') ?>categories" class="btn btn-danger" type="button">Cancelar</a>
                        <input class="btn btn-success" type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm ('¿Deseas registraresta categoria?');">
                    </td>
                </tr>
                
            </table>
        </form>
    </body>
</html>

