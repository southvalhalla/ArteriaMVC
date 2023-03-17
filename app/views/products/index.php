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
        <table class="table table-dark table-striped table-hover justify-content-center border-secondary rounded mx-auto" style="width:75%;">
            
            <!-- <div id="barrabuscar" class="ms-2 form-group">
                <form method="POST">
                    <input type="text" name="txtbuscar" id="cajabuscar" placeholder="Ingresar nombre de producto" class="form form-control w-25"><input type="submit" value="Buscar" class="btn btn-success mt-2" name="btnbuscar">
                </form>
            </div> -->
            <thead>
                <tr><th colspan="8" class="text-center"><h1>LISTA DE PRODUCTOS</h1><th><a class="btn btn-primary mt-2" onclick="abrirform()">Agregar</a></th></tr>
                <tr>
                    <th>ID</th>
                    <th>Codigo</th>
                    <th>Nombre producto</th>
                    <th>Marca</th>
                    <th>Categoria</th>
                    <th>Descripcion</th>
                    <th>imagenes</th>
                    <th>precio</th>
                    <th>Accion</th>
                    
                </tr>     
            </thead>   
            <tbody id="tbody-products">
                <?php
                    include_once 'app/class/product.php';
                    foreach($this->products as $product):
                ?>
                <tr id="row-<?= $product['id'] ?>">
                    <th><?= $product['id'] ?></th>
                    <th><?= $product['cod'] ?></th>
                    <th><?= $product['name'] ?></th>
                    <th><?= $product['trademark'] ?></th>
                    <th><?= $product['category'] ?></th>
                    <th><?= $product['description'] ?></th>
                    <th><?= $product['images'] ?></th>
                    <th><?= $product['price'] ?></th>
                    <td style='width:26%'>
                        <a class='btn btn-success' href="<?= constant('URL').'products/showProduct/' . $product['id']; ?>">Modificar</a> | <a class='bDelete btn btn-danger' data-id="<?= $product['id']; ?>">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>                
        </table>
        <div class="caja_popup bg-body-secondary border border-4 border-primary-subtle rounded position-absolute top-50 start-50 translate-middle w-50 h-75" id="formregistrar">
            <form action="<?= constant('URL').'products/addProduct/' ?>" class="contenedor_popup" method="POST">
                <table>
                    <tr><th colspan="2">Nuevo Producto</th></tr>
                    <tr>
                        <td>Producto</td>
                        <td><input class="form-control" type="text" name="name" required></td>
                    </tr>
                    <tr>
                        <td>Marca</td>
                        <td><input class="form-control" type="text" name="trademark" required></td>
                    </tr>
                    <tr>
                        <td>Categoria</td>
                        <td>
                            <select class="form-select" name="category" required>
                                <option value="" disabled selected>--SELECCIONE UNA CATEGORIA--</option>
                                <?php
                                    include_once 'app/class/category.php';
                                    foreach($this->categories as $category):
                                ?>

                                <option value="<?= $category['category'] ?>">ID: <?= $category['id']?> | <?= $category['category'] ?></option>

                                <?php endforeach; ?>
                            </select>   
                        </td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td><textarea class="form-control"name="description" required></textarea></td>
                    </tr>
                    <tr>
                        <td>Imagenes</td>
                        <td><input class="form-control form-control-sm" type="file" name="images"></td>
                    </tr>
                    <tr>
                        <td>Precio</td>
                        <td><input class="form-control" type="number" name="price" required></td>
                    </tr>                
                    <tr> 	
                        <td colspan="2">
                            <a href=""><button  class="btn btn-danger" type="button" onclick="cancelarform()">Cancelar</button></a>
                            <input class="btn btn-success" type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm ('¿Deseas registrar a este producto?');">
                        </td>
                    </tr>
                </table>
            </form>
            <script src="<?= constant('URL') ?>public/js/main.js"></script>
            <script src="<?= constant('URL') ?>public/js/products.js"></script>
        </div>
    </body>
</html>

