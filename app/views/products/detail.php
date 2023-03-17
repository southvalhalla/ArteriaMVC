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
        <form action="<?= constant('URL') ?>products/editProduct" class="contenedor_popup" method="POST">
            <table class="table table-dark table-striped table-hover justify-content-center border-secondary rounded w-auto">
                <tr><th colspan="2">Editar Producto</th></tr>
                <tr>
                    <td>Producto</td>
                    <td><input class="form-control" type="text" name="name" value="<?= $this->productView->name ?>" required></td>
                </tr>
                <tr>
                    <td>Marca</td>
                    <td><input class="form-control" type="text" name="trademark" value="<?= $this->productView->tradeMark ?>" required></td>
                </tr>
                <tr>
                    <td>Categoria</td>
                    <td>
                        <select class="form-select" name="category" required>
                            <option value="" disabled>--SELECCIONE UNA CATEGORIA--</option>
                            <option value="<?= $this->productView->category ?>" selected><?= $this->productView->category ?></option>
                            <?php
                                include_once 'app/class/category.php';
                                foreach($this->categories as $category):
                            ?>

                            <option value="ID: <?= $category['id']?> | <?= $category['category'] ?>">ID: <?= $category['id']?> | <?= $category['category'] ?></option>

                            <?php endforeach; ?>
                        </select>   
                    </td>
                </tr>
                <tr>
                    <td>Descripcion</td>
                    <td><textarea class="form-control"name="description" required><?= $this->productView->description ?></textarea></td>
                </tr>
                <tr>
                    <td>Imagenes</td>
                    <td><input class="form-control form-control-sm" type="file" name="images"></td>
                </tr>
                <tr>
                    <td>Precio</td>
                    <td><input class="form-control" type="number" name="price" value="<?= $this->productView->price ?>" required></td>
                </tr>                
                <tr> 	
                    <td colspan="2">
                        <button  class="btn btn-danger" type="button" onclick="cancelarform()">Cancelar</button>
                        <input class="btn btn-success" type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm ('¿Deseas registrar a este producto?');">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>

