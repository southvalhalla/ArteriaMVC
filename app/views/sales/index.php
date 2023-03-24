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
                        <input type="text" name="txtbuscar" id="cajabuscar" placeholder="Ingresar ID Venta" class="form form-control">
                    </div>
                    <div class="col-2">
                        <input type="submit" value="Buscar" class="btn btn-success" name="btnbuscar">
                    </div>
                </div>
            </form>
        </div>
        <table class="table table-sm table-hover text-center border-secondary rounded mx-auto" style="width: 90%;height:auto">
            <thead class="border table-primary">
                <tr>
                    <th colspan="8" class="text-center">
                        <h1>VENTAS</h1>
                    </th>
                    <th>
                        <a href="<?= constant('URL') ?>sales/newSale" class="mt-2"><button class="btn btn-primary">Agregar</button></a>
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Cod</th>
                    <th>Fecha</th>
                    <th>ID Cliente</th>
                    <th>Estado Pedido</th>
                    <th>Información de pago</th>
                    <th>Productos</th>
                    <th>Precio Total</th>
                    <th>Accion</th>
                    
                </tr>
            </thead> 
            <tbody class="border">
                <?php
                    include_once 'app/class/product.php';
                    foreach($this->sales as $sale):
                ?>
                <tr id="row-<?= $sale['id'] ?>">
                    <td><?= $sale['id'] ?></td>
                    <td><?= $sale['cod'] ?></td>
                    <td><?= $sale['date'] ?></td>
                    <td><?= $sale['id_client'] ?></td>
                    <td><?= $sale['status'] ?></td>
                    <td><?= $sale['pay_info'] ?></td>
                    <td><?= $sale['products'] ?></td>
                    <td><?= $sale['total'] ?></td>
                    <td style='width:26%'>
                        <a class='btn btn-success' href="<?= constant('URL').'products/showProduct/' . $product['id']; ?>">Modificar</a> | <a class='bDelete btn btn-danger' data-id="<?= $product['id']; ?>">Eliminar</a>
                    </td>
                <?php endforeach; ?>
                </tr>
            </tbody>                     
        </table>
        <script src="public/js/main.js"></script>
        <div class="caja_popup bg-body-secondary border border-4 border-primary-subtle rounded position-absolute top-50 start-50 translate-middle w-50 h-75" id="formregistrar">
        <div class="caja_popup" id="formregistrar">
            <form action="" class="contenedor_popup" method="POST">
            <table>
                    <tr><th colspan="2">Nueva Compra</th></tr>
                    <tr>
                        <td>Fecha</td>
                        <td><input class="form-control" type="date" name="txtfecha" required></td>
                    </tr>
                    <tr>
                        <td>Cliente</td>
                        <td>
                            <select class="form-select" name="txtcliente">
                                <option value="">Todavia no hay nada</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Metodo de pago</td>
                        <td>
                            <select class="form-select" name="txtmetodo" required>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Tarjeta">Tarjeta</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Precio Total</td>
                        <td><input class="form-control" type="number" name="txtprecio" required></td>
                    </tr>
                    <tr> 	
                        <td colspan="2">
                            <button class="btn btn-danger ms-50" type="button" onclick="cancelarform()">Cancelar</button>
                            <input class="btn btn-success" type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm ('¿Deseas registrar a este usuario?');">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        </div>
    </body>
</html>
<?php

?>

