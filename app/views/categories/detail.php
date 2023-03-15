<html>
    <head>    
		<title>Arteria</title>
		<meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= constant('URL') ?>public/css/style.css">
    </head>
    <body class="bg-dark bg-gradient">
        <?php
            include 'src/views/navBar.php';
        ?>
        <form action="<?= constant('URL') ?>categories/editCategory" class="" method="POST">
            <table class="table table-dark table-striped table-hover d-flex justify-content-center border-secondary rounded ">
                <tr>
                <th colspan="2">Categoria</th></tr>
                <tr>
                    <td>id</td>
                    <td><input class="form-control ms-2" type="number" name="txtcod" value="<?= $this->category->cod ; ?>" disabled></td>
                </tr>
                <tr>
                    <td>categoria</td>
                    <td><input class="form-control ms-2" type="text" name="txttipo_pro" value="<?= $this->category->tipo_pro ; ?>" required></td>
                </tr>
                <tr>
                    <td>caracteristicas</td>
                    <td><input class="form-control ms-2" type="text" name="txtcarac" value="<?= $this->category->carac ; ?>" required></td>
                </tr>
                <tr> 	
                    <td colspan="2">
                        <a href="<?= constant('URL') ?>categories" class="btn btn-danger" type="button">Cancelar</a>
                        <input class="btn btn-success" type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm ('¿Deseas registraresta categoria?');">
                    </td>
                </tr>
                
            </table>
        </form>
        <script src="<?= constant('URL') ?>public/js/main.js"></script>
        <div class="caja_popup bg-body-secondary border border-4 border-primary-subtle rounded position-absolute top-50 start-50 translate-middle" style="width:35%; height:35%;" id="formregistrar">
            
        </div>
    </body>
</html>

