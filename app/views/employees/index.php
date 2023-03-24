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
                            <option value="document_number">Numero de documento</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <input type="text" name="txtbuscar" id="cajabuscar" placeholder="Ingresar empleado" class="form form-control">
                    </div>
                    <div class="col-2">
                        <input type="submit" value="Buscar" class="btn btn-success" name="btnbuscar">
                    </div>
                </div>
            </form>
        </div>
        <table class="table table-sm table-hover text-center border-secondary rounded mx-auto" style="width:95%;">
            <thead class="border table-primary">
                <tr>
                    <th colspan="8" class="text-center"><h1>LISTA DE EMPLEADOS</h1></th>
                    <th>
                        <button class="btn btn-primary my-auto" onclick="abrirform()">Agregar</button><a href="<?= constant('URL').'employees/generatePDF'; ?>"> | <button class="btn btn-info my-auto"">Informe</button></a>
                    </th>
                </tr>
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
            <tbody class="border" id="tbody-products">
                <?php
                    include_once 'app/class/employee.php';
                    foreach($this->employees as $employee):
                ?>
                <tr id="row-<?= $employee['id'] ?>">
                    <td><?= $employee['id'] ?></td>
                    <td><?= $employee['document_type'] ?></td>
                    <td><?= $employee['document_number'] ?></td>
                    <td><?= $employee['names'] ?></td>
                    <td><?= $employee['lastnames'] ?></td>
                    <td><?= $employee['phone'] ?></td>
                    <td><?= $employee['email'] ?></td>
                    <td><?= $employee['job'] ?></td>
                    <td style="width: 20%;">
                        <a href="<?= constant('URL').'employees/showEmployee/'.$employee['id']; ?>"><button class="btn btn-success">Modificar</button></a> | <button class='bDelete btn btn-danger' data-id="<?= $employee['id']; ?>">Eliminar</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>                
        </table>
        <card class="caja_popup bg-white border rounded position-absolute top-50 start-50 translate-middle" style="width:40%;height:40%" id="formregistrar">
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
                    </card>
    </body>
</html>

