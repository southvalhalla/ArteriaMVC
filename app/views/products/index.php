<html>
    <head>    
		<title>Arteria</title>
		<meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= constant('URL') ?>public/css/style.css">
    </head>
    <body class="bg-white">
        <?php
            include 'app/views/navBar.php';
        ?>
        <div id="barrabuscar" class="mx-auto my-3">
            <form method="POST" class="">
                <div class="row">
                    <div class="col-2 offset-2">
                        <select class="form-select" name="option_search" id="option_search">
                            <option value="" selected disabled>Filtro</option>
                            <option value="id">ID</option>
                            <option value="name">Nombre</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <input type="text" name="txtbuscar" id="cajabuscar" placeholder="Ingresar producto" class="form form-control">
                    </div>
                    <div class="col-2">
                        <input type="submit" value="Buscar" class="btn btn-success" name="btnbuscar">
                    </div>
                </div>
            </form>
        </div>
        <table class="table table-sm table-hover text-center border-secondary rounded mx-auto" style="width:75%;">
            
            <thead class="border table-primary">
                <tr><th colspan="9" class="text-center"><h1>LISTA DE PRODUCTOS</h1><th><a class="btn btn-primary mt-2" onclick="abrirform()">Agregar</a></th></tr>
                <tr>
                    <th>ID</th>
                    <th>Codigo</th>
                    <th>Cant.</th>
                    <th>Nombre producto</th>
                    <th>Marca</th>
                    <th>Categoria</th>
                    <th>Descripcion</th>
                    <th>imagenes</th>
                    <th>precio</th>
                    <th>Accion</th>
                    
                </tr>     
            </thead>   
            <tbody class="border" id="tbody-products">
                <?php
                    include_once 'app/class/product.php';
                    foreach($this->products as $product):
                ?>
                <tr id="row-<?= $product['id'] ?>">
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['cod'] ?></td>
                    <td><?= $product['in_inventary'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['trademark'] ?></td>
                    <td><?= $product['category'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td><?= $product['images'] ?></td>
                    <td><?= $product['price'] ?></td>
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
                        <td>Cantidad</td>
                        <td><input class="form-control" type="number" name="in_inventary" required></td>
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

