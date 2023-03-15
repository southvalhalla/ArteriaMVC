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
        <table class="table table-dark table-striped table-hover d-flex justify-content-center border-secondary rounded ">
            
            <div id="barrabuscar" class="ms-2 form-group">
                <form method="POST">
                    <input type="text" name="txtbuscar" id="cajabuscar" placeholder="Ingresar nombre de producto" class="form form-control w-25"><input type="submit" value="Buscar" class="btn btn-success mt-2" name="btnbuscar">
                </form>
            </div>
            <tr><th colspan="6" class="text-center"><h1>LISTA DE COMPRAS</h1><th><a class="btn btn-primary mt-2" onclick="abrirform()">Agregar</a></th></tr>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>ID Cliente</th>
                <th>Estado Pedido</th>
                <th>metodo de pago</th>
                <th>Precio Total</th>
                <th>Accion</th>
                
            </tr>                        
            <tr>
                <td>cod</td>
                <td>fecha</td>
                <td>IDcliente</td>
                <td>estadoPedido</td>
                <td>metodoPago</td>
                <td>precioTotal</td>
                <td style='width:26%'>
                    <a class='btn btn-success' href='#'>Modificar</a> | <a class='btn btn-danger' href='#' onClick="">Eliminar</a>
                </td>
            </tr>
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

