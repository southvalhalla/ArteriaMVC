<html>
    <head>    
		<title>Arteria</title>
		<meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= constant('URL') ?>public/css/style.css">
    </head>
    <body>
        <?php
            include 'app/views/navBar.php';
        ?>
        <div class="bg-body-secondary border" id="formregistrar">
            <div class="" id="formregistrar">
                <form action="" class="" method="POST">

                    <div class="row">
                        <div class="col-12 border-bottom">
                            <h1 class="text-center">Nueva Compra</h1>
                        </div>
                        <div class="row mx-2 border-bottom">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-8">
                                                <label for="">Cliente</label>
                                                <select name="" id="" class="form-select">
                                                <?php include_once 'app/class/client.php';
                                                foreach($this->clients as $client):?>

                                                    <option value="<?= $$client['id'] ?>">ID: <?= $client['id']?> | <?= $client['names'].' '.$client['lastnames'] ?></option>

                                                <?php endforeach; ?>
                                                </select>    
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="">Fecha</label>
                                                <input type="date" value="0" class="form-control">   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-2 border-bottom">
                            <div class="col-lg-3">
                                <button type="button" id="btnAdd" class="btn btn-primary">Añadir otro producto</button>
                            </div>
                            <div class="col-12">
                                <div class="row" id="product">
                                    <div class="col-lg-4" id="new">
                                        <div class="row mb-2">
                                            <div class="col-lg-9">
                                                <label for="">Producto</label>
                                                <select name="" id="" class="form-select">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                </select>    
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="">Cantidad</label>
                                                <input type="number" value="0" class="form-control">   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12  border-bottom">
                            <div class="row m-2">
                                <div class="col-lg-4 col-xs-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <input type="radio" name="confirm_method" id="confirm_method"> Tarjeta de Credito/Debito
                                            </p>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <label>Numero de tarjeta</label>
                                            <input class="form-control" type="number" name="txtfecha" required>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <label>Nombre titular</label>
                                            <input class="form-control" type="text" name="txtfecha" required>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <label>Fecha de vencimiento</label>
                                            <input class="form-control" type="date" name="txtfecha" required>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <label>Código de seguridad</label>
                                            <input class="form-control" type="text" name="txtfecha" required>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <label>Banco emisor</label>
                                            <input class="form-control" type="text" name="txtfecha" required>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <label>Tipo de tarjeta</label>
                                            <input class="form-control" type="text" name="txtfecha" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 border-start border-end">
                                    <div class="row">
                                        <div class="col-12 mt-sm-2 mt-lg-0">
                                            <p>
                                                <input type="radio" name="confirm_method" id="confirm_method"> Efectivo
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <label>Nombres y apellidos</label>
                                            <input class="form-control" type="text" name="txtfecha" required>
                                        </div>
                                        <div class="col-6">
                                            <label>Cod Factura</label>
                                            <input class="form-control" type="text" name="txtfecha" required>
                                        </div>                                
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="row">
                                        <div class="col-12 mt-sm-2">
                                            <p>
                                                <input type="radio" name="confirm_method" id="confirm_method"> Nequi
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <label>Nombres y apellidos</label>
                                            <input class="form-control" type="text" name="txtfecha" required>
                                        </div>
                                        <div class="col-6">
                                            <label>Celular</label>
                                            <input class="form-control" type="text" name="txtfecha" required>
                                        </div>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 border-bottom">
                            <div class="row m-2">
                                <div class="col-lg-4 col-sm-6">
                                    <div class="row">
                                        <div class="col-3">
                                            <a href="<?= constant('URL') ?>sales"><button class="btn btn-danger" type="button" onclick="cancelarform()">Cancelar</button></a>
                                        </div>
                                        <div class="col-3">
                                            <input class="btn btn-success" type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm ('¿Deseas registrar a este usuario?');">
                                        </div>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <script src="<?= constant('URL') ?>public/js/sales.js"></script>
            </div>
        </div>
    </body>
</html>
<?php

?>

