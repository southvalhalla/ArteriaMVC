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
                            <option value="user">Nombre Usuario</option>
                            <option value="email">Correo Electronico</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <input type="text" name="txtbuscar" id="cajabuscar" placeholder="Ingresar usuario" class="form form-control">
                    </div>
                    <div class="col-2">
                        <input type="submit" value="Buscar" class="btn btn-success" name="btnbuscar">
                    </div>
                </div>
            </form>
        </div>
        <table class="table table-sm table-hover text-center border-secondary rounded mx-auto" style="width:70%;height:auto">
            <thead class="border table-primary">
                <tr><th colspan="4" class="text-center"><h1>LISTA DE USUARIOS</h1><th><a class="btn btn-primary mt-2" onclick="abrirform()">Agregar</a></th></tr>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Accion</th>
                    
                </tr> 
            </thead> 
            <tbody class="border" id="tbody-users">
                <?php
                    include_once 'app/class/user.php';
                    foreach($this->users as $user):
                ?>
                <tr id="row-<?= $user['id'] ?>">
                    <td><?= $user['id'] ?></td>
                    <td><?= $result=$user['employee']!= NULL?$user['employee']:$user['client'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td style='width:26%'>
                        <a class='btn btn-success' href="<?= constant('URL').'users/showUser/' . $user['id']; ?>">Modificar</a> | <a class='bDelete btn btn-danger' data-id="<?= $user['id']; ?>">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>                      
        </table>
        <script src="public/js/main.js"></script>
        <div class="caja_popup bg-body-secondary border border-4 border-primary-subtle rounded position-absolute top-50 start-50 translate-middle w-50 h-75" id="formregistrar">
            <form action="<?= constant('URL').'users/addUser/' ?>" class="contenedor_popup" method="POST">
                <table>
                    <tr><th colspan="2">Nuevo Usuario</th></tr>
                    <tr>
                        <td>Categoria</td>
                        <td>
                            <select class="form-select ms-1" name="user_info" required>
                                <option value="" disabled selected>--SELECCIONE UN USUARIO--</option>
                                <optgroup label="Clientes">
                                    <?php
                                        include_once 'app/class/client.php';
                                        foreach($this->clients as $client):
                                            $options = 'client,'.$client['id'].','.$client['names'].' '.$client['lastnames'].','.$client['email'];
                                    ?>

                                    <option value="<?= $options ?>">ID: <?= $client['id']?> | <?= $client['names'].' '.$client['lastnames'] ?></option>

                                    <?php endforeach; ?> 
                                </optgroup>
                                <optgroup label="Empleados">
                                    <?php
                                        include_once 'app/class/employee.php';
                                        foreach($this->employees as $employee):
                                            
                                            $options = 'employee,'.$employee['id'].','.$employee['names'].' '.$employee['lastnames'].','.$employee['email'];
                                    ?>

                                    <option value="<?= $options ?>">ID: <?= $employee['id']?> | <?= $employee['names'].' '.$employee['lastnames'] ?></option>

                                    <?php endforeach; ?>
                                </optgroup>
                            </select>   
                        </td>
                    </tr>
                    <tr>
                        <td>Rol </td>
                        <td>
                            <select name="role" id="role" class="form-select ms-1">
                                <option value="Administrador">Administrador</option>
                                <option value="Despachador">Despachador</option>
                                <option value="Gerente">Gerente</option>
                                <option value="Vendedor">Vendedor</option>
                                <option value="Cliente">Cliente</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Contraseña </td>
                        <td><input type="password" name="password"class="form-control ms-1"></td>
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
            <script src="<?= constant('URL') ?>public/js/users.js"></script>
        </div>
    </body>
</html>
<?php
    
?>

