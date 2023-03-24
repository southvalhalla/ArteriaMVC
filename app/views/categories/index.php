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
                    <div class="col-4 offset-3">
                        <input type="text" name="txtbuscar" id="cajabuscar" placeholder="Ingresar categoria" class="form form-control">
                    </div>
                    <div class="col-2">
                        <input type="submit" value="Buscar" class="btn btn-success" name="btnbuscar">
                    </div>
                </div>
            </form>
        </div>
        <table class="table table-sm table-hover text-center border-secondary rounded mx-auto" style="width:75%;">
            <thead class="border table-primary">
                <tr>
                    <th colspan="3" class="text-center w-auto">
                        <h1>LISTA DE CATEGORIAS</h1>
                    </th>
                    <th><a class="btn btn-primary mt-2" onclick="abrirform()">Agregar</a></th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Nombre Categoria</th>
                    <th>caracteristicas</th>
                    <th>Accion</th>
                    
                </tr>
            </thead>
            <tbody class="border" id="tbody-categories">
                <?php
                    include_once 'app/class/category.php';
                    foreach ($this->categories as $category ):
                        
                ?>                        
                <tr id="row-<?= $category['id'] ?>">
                    <td><?= $category['id'] ?></td>
                    <td><?= $category['category'] ?></td>
                    <td><?= $category['characteristics'] ?></td>
                    <td class='w-auto'>
                        <a class="btn btn-success" href="<?= constant('URL').'Categories/showCategory/' . $category['id']; ?>">Modificar</a> | <button class="bDelete btn btn-danger" data-id="<?= $category['id']; ?>">Eliminar</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            
        </table>
        <script src="<?= constant('URL') ?>public/js/main.js"></script>
        <div class="caja_popup bg-body-secondary border border-4 border-primary-subtle rounded position-absolute top-50 start-50 translate-middle" style="width:35%; height:35%;" id="formregistrar">
            <form action="<?= constant('URL').'Categories/createCategory/' ?>" class="contenedor_popup" method="POST">
                <table>
                    <tr>
                    <th colspan="2">Categoria</th>
                    </tr>
                    <tr>
                        <td>categoria</td>
                        <td><input class="form-control ms-2" type="text" id="category" name="category" required></td>
                    </tr>
                    <tr>
                        <td>caracteristicas</td>
                        <td><input class="form-control ms-2" type="text" id="characteristics" name="characteristics" required></td>
                    </tr>
                    <tr> 	
                        <td colspan="2">
                            <button class="btn btn-danger" type="button" onclick="cancelarform()">Cancelar</button>
                            <input class="btn btn-success" id="submitBtn" type="submit" name="btnregistrar" value="Registrar">
                        </td>
                    </tr>
                    
                </table>
            </form>
        </div>
        <div class="center"><?= $this->message ?></div>
        
        <script src="<?= constant('URL') ?>public/js/categories.js"></script>
    </body>
</html>

