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
                    <th colspan="7" class="text-center">
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
                    <th>Precio Total</th>
                    <th>Información General</th>
                    <th>Estado</th>
                    <th>Accion</th>
                    
                </tr>
            </thead> 
            <tbody class="border" id="tbody-sales">
                <?php
                    include_once 'app/class/sale.php';
                    foreach($this->sales as $sale):
                ?>
                <tr id="row-<?= $sale['id'] ?>">
                    <td><?= $sale['id'] ?></td>
                    <td><?= $sale['cod'] ?></td>
                    <td><?= $sale['date'] ?></td>
                    <td><?= $sale['id_client'] ?></td>
                    <td><?= $sale['total'] ?></td>
                    <td>
                        <a href="<?= constant('URL').'sales/viewInfo/' . $sale['id'].'/'.$sale['id_client'] ?>"><button class="btn btn-info">Ver</button></a>
                    </td>
                    <td id="formStatus-<?= $sale['id'] ?>" hidden>
                        <form action="<?= constant('URL').'sales/editStatus/' . $sale['id']; ?>" >
                            <div class="row mx-1">
                                <div class="col-8">
                                    <select name="status" class="form-select ms-1">
                                            <option value="Pendiente" <?= $sale['status'] == "Pendiente"?"selected":"" ?>>Pendiente</option>
                                            <option value="Cancelado" <?= $sale['status'] == "Cancelado"?"selected":"" ?>>Cancelado</option>
                                            <option value="Despachando" <?= $sale['status'] == "Despachando"?"selected":"" ?>>Despachando</option>
                                            <option value="Enviado" <?= $sale['status'] == "Enviado"?"selected":"" ?>>Enviado</option>
                                            <option value="Finalizado" <?= $sale['status'] == "Finalizado"?"selected":"" ?>>Finalizado</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <button type="submit" id="btnSave-<?= $sale['id'] ?>" data-id="<?= $sale['id'] ?>" class='btn btn-success'>Guardar</button>
                                </div>
                            </div>
                        </form>
                    </td>
                    <td id="viewStatus-<?= $sale['id'] ?>"><?= $sale['status'] ?></td>
                    <td style='width:26%'>
                        <button onclick="change(<?= $sale['id'] ?>)" id="btnChange-<?= $sale['id'] ?>" class='btn btn-success'>Cambiar Estado</button> <button class='bDelete btn btn-danger' data-id="<?= $sale['id']; ?>">Eliminar</button>
                    </td>
                <?php endforeach; ?>
                </tr>
            </tbody>                     
        </table>
        <div class="caja_popup bg-body-secondary border border-4 border-primary-subtle w-50 h-75" id="formregistrar">
            <div class="caja_popup" id="view-info">
                
            </div>
        </div>
        <script src="<?= constant('URL') ?>public/js/main.js"></script>
        <script src="<?= constant('URL') ?>public/js/sales.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </body>
</html>
<?php

?>

