<html>
    <head>    
		<title>Arteria</title>
		<meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= constant('URL') ?>public/css/style.css">
    </head>
    <body class="bg-dark bg-gradient">
        <?php
            include 'views/navBar.php';
        ?>
        <table class="table table-dark table-striped table-hover d-flex justify-content-center border-secondary rounded ">
            
            <div id="barrabuscar" class="ms-2 form-group">
                <form method="POST">
                    <input type="text" name="txtbuscar" id="cajabuscar" placeholder="Ingresar nombre de producto" class="form form-control w-25"><input type="submit" value="Buscar" class="btn btn-success mt-2" name="btnbuscar">
                </form>
            </div>
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
            <!-- <?php foreach ($categories as $category ): ?>                        
            <tr>
                <td><?= $category['cod'] ?></td>
                <td><?= $category['tipo_pro'] ?></td>
                <td><?= $category['carac'] ?></td>
                <td class='w-auto'>
                    <a class='btn btn-success' href='#'>Modificar</a> | <a class='btn btn-danger' href='#' onClick="">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?> -->
        </table>
        <script src="<?= constant('URL') ?>public/js/main.js"></script>
        <div class="caja_popup bg-body-secondary border border-4 border-primary-subtle rounded position-absolute top-50 start-50 translate-middle" style="width:35%; height:35%;" id="formregistrar">
            <form action="<?= constant('URL') ?>categories/createCategory" class="contenedor_popup" method="POST">
                <table>
                    <tr>
                    <th colspan="2">Categoria</th></tr>
                    <tr>
                        <td>id</td>
                        <td><input class="form-control ms-2" type="number" name="txtcod" required></td>
                    </tr>
                    <tr>
                        <td>categoria</td>
                        <td><input class="form-control ms-2" type="text" name="txttipo_pro" required></td>
                    </tr>
                    <tr>
                        <td>caracteristicas</td>
                        <td><input class="form-control ms-2" type="text" name="txtcarac" required></td>
                    </tr>
                    <tr> 	
                        <td colspan="2">
                            <button class="btn btn-danger" type="button" onclick="cancelarform()">Cancelar</button>
                            <input class="btn btn-success" type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm ('¿Deseas registraresta categoria?');">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

