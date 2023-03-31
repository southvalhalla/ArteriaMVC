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
                        <input type="text" name="txtbuscar" id="cajabuscar" placeholder="Ingresar cliente" class="form form-control">
                    </div>
                    <div class="col-2">
                        <input type="submit" value="Buscar" class="btn btn-success" name="btnbuscar">
                    </div>
                </div>
            </form>
        </div>
        <table class="table table-sm table-hover text-center border-secondary rounded mx-auto" style="width:95%;">
            <thead class="border table-primary">
                <tr><th colspan="9" class="text-center"><h1>LISTA DE CLIENTES</h1><th><a class="btn btn-primary mt-2" onclick="abrirform()">Agregar</a></th></tr>
                <tr>
                    <th>ID</th>
                    <th>TIPO DE DOCUMENTO</th>
                    <th>NUMERO DE DOCUMENTO</th>
                    <th>NOMBRES</th>
                    <th>APELLIDOS</th>
                    <th>TELEFONO - CELULAR</th>
                    <th>CORREO</th>
                    <th>DIRECCION</th>
                    <th>CIUDAD</th>
                    <th>Accion</th>
                    
                </tr>     
            </thead>   
            <tbody class="border" id="tbody-products">
                <?php
                    include_once 'app/class/client.php';
                    foreach($this->clients as $client):
                ?>
                <tr id="row-<?= $client['id'] ?>">
                    <td><?= $client['id'] ?></td>
                    <td><?= $client['document_type'] ?></td>
                    <td><?= $client['document_number'] ?></td>
                    <td><?= $client['names'] ?></td>
                    <td><?= $client['lastnames'] ?></td>
                    <td><?= $client['phone'] ?></td>
                    <td><?= $client['email'] ?></td>
                    <td><?= $client['address'] ?></td>
                    <td><?= $client['city'] ?></td>
                    <td style='width:26%'>
                        <a class='btn btn-success' href="<?= constant('URL').'clients/showClient/' . $client['id']; ?>">Modificar</a> | <a class='bDelete btn btn-danger' data-id="<?= $client['id']; ?>">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>                
        </table>
        <div class="row">
            <div class="col-2 offset-5">
                <nav class="" aria-label="Page navigation">
                    <ul class="pagination">
                        <?php
                        $prev = $this->page - 1;
                        $next = $this->page + 1;

                        if($this->page == 1){ }else{  ?>
                            <li class="page-item"><a class="page-link" href="<?= constant('URL').'clients?num=1' ?>">Inicio</a></li>
                            <li class="page-item"><a class="page-link" href="<?= constant('URL').'clients?num='.$prev ?>"><?= $prev ?></a></li>
                        <?php } ?> 
                        <li class="page-item"><a class="page-link" href="<?= constant('URL').'clients?num='.$this->page; ?>"><?= $this->page ?></a></li>
                        <?php if($this->page == $this->end){ }else{ ?>
                            <li class="page-item"><a class="page-link" href="<?= constant('URL').'clients?num='.$next ?>"><?= $next ?></a></li>
                            <li class="page-item"><a class="page-link" href="<?= constant('URL').'clients?num='.$this->end ?>">Final</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="caja_popup bg-body-secondary border border-4 border-primary-subtle rounded position-absolute top-50 start-50 translate-middle" style="width: 35%; height: 60%;" id="formregistrar">
            <form action="<?= constant('URL').'clients/addClient/' ?>" class="contenedor_popup" method="POST">
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
                        <td colspan="2">
                            <input class="form-control" type="number" name="phone" placeholder="Telefono" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="form-control" type="text" name="address" placeholder="Direccion" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="form-control" type="text" name="city" placeholder="Ciudad" required>
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
            <script src="<?= constant('URL') ?>public/js/clients.js"></script>
        </div>
    </body>
</html>

