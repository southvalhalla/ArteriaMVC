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
        <table class="table table-dark table-striped table-hover border-secondary rounded mx-auto" style="width:95%;">
            
            <!-- <div id="barrabuscar" class="ms-2 form-group">
                <form method="POST">
                    <input type="text" name="txtbuscar" id="cajabuscar" placeholder="Ingresar nombre de producto" class="form form-control w-25"><input type="submit" value="Buscar" class="btn btn-success mt-2" name="btnbuscar">
                </form>
            </div> -->
            <thead>
                <tr><th colspan="8" class="text-center"><h1>LISTA DE EMPLEADOS</h1><th><a class="btn btn-primary mt-2" onclick="abrirform()">Agregar</a></th></tr>
                <tr>
                    <th>ID</th>
                    <th>TIPO DE DOCUMENTO</th>
                    <th>NUMERO DE DOCUMENTO</th>
                    <th>NOMBRES</th>
                    <th>APELLIDOS</th>
                    <th>TELEFONO - CELULAR</th>
                    <th>CORREO</th>
                    <th>CARGO</th>
                    <th>Accion</th>
                    
                </tr>     
            </thead>   
            <tbody id="tbody-products">
                <?php
                    include_once 'app/class/product.php';
                    foreach($this->employees as $employee):
                ?>
                <tr id="row-<?= $employee['id'] ?>">
                    <th><?= $employee['id'] ?></th>
                    <th><?= $employee['document_type'] ?></th>
                    <th><?= $employee['document_number'] ?></th>
                    <th><?= $employee['names'] ?></th>
                    <th><?= $employee['lastnames'] ?></th>
                    <th><?= $employee['phone'] ?></th>
                    <th><?= $employee['email'] ?></th>
                    <th><?= $employee['job'] ?></th>
                    <td style='width:26%'>
                        <a class='btn btn-success' href="<?= constant('URL').'employees/showEmployee/' . $employee['id']; ?>">Modificar</a> | <a class='bDelete btn btn-danger' data-id="<?= $employee['id']; ?>">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>                
        </table>
        <div class="caja_popup bg-body-secondary border border-4 border-primary-subtle rounded position-absolute top-50 start-50 translate-middle" style="width: 35%; height: 45%;" id="formregistrar">
            <form action="<?= constant('URL').'employees/addEmployee/' ?>" class="contenedor_popup" method="POST">
                <table>
                    <tr><th colspan="2">Nuevo Empleado</th></tr>
                    <tr>
                        <td>
                            <select class="form-select" name="document_type" required>
                                <option value="" disabled selected>Tipo de documento</option>
                                <option value="cedula de ciudadania">Cedula de ciudadania</option>
                                <option value="tarjeta de identidad">Tarjeta de identidad</option>
                                <option value="cedula de extranjeria">Cedula de extranjeria</option>
                            </select>
                        </td>
                        <td>
                            <input class="form-control" type="number" name="document_number" placeholder="Numero de documento" required>
                        </td>
                    </tr> 
                    <tr>
                        <td>
                            <input class="form-control" type="text" name="names" placeholder="Nombres" required>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="lastnames" placeholder="Apellidos" required>
                        </td>
                    </tr>
                    <tr>
                        <td  colspan="2">
                            <input class="form-control" type="email" name="email" placeholder="Correo" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="form-control" type="number" name="phone" placeholder="Telefono" required>
                        </td>
                        <td>
                            <select class="form-select" name="job" required>
                                <option value="" disabled selected>Cargo</option>
                                <option value="Gerente">Gerente</option>
                                <option value="Vendedor">Vendedor</option>
                                <option value="Desarrollador">Desarrollador</option>
                            </select>
                        </td>
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
            <script src="<?= constant('URL') ?>public/js/employees.js"></script>
        </div>
    </body>
</html>

