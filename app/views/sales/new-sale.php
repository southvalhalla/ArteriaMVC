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
                <form action="<?= constant('URL') ?>sales/addSale" class="" method="POST">

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
                                                <select name="id_client" id="" class="form-select">
                                                    <option value="" disabled selected>Seleccione Cliente</option>
                                                <?php include_once 'app/class/client.php';
                                                foreach($this->clients as $client):?>

                                                    <option value="<?= $client['id'] ?>">ID: <?= $client['id']?> | <?= $client['names'].' '.$client['lastnames'] ?></option>

                                                <?php endforeach; ?>
                                                </select>    
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="">Fecha</label>
                                                <input type="date" name="date" class="form-control">   
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
                                                <select name="productselected[]" id="" class="form-select">
                                                    <option value="" disabled selected>Seleccione un Producto</option>
                                                    <?php 
                                                    foreach($this->products as $product): 
                                                    $info = $product['id'].'_'.$product['name'].'_'.$product['cod'].'_'.$product['in_inventary'].'_'.$product['price'];
                                                    ?>
                                                    <option value="<?= $info ?>"><?= $product['id'] ?> | <?= $product['cod'] ?> | <?= $product['name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>    
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="">Cantidad</label>
                                                <input type="number" name="count[]" min="1" class="form-control">   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12  border-bottom">
                            <div class="row m-2">
                                <div class="col-lg-4 col-xs-6">
                                    <div class="row" id="card_method">
                                        <div class="col-12">
                                            <p>
                                                <input type="radio" value="0" name="confirm_method" id="confirm_card_method" required> Tarjeta de Credito/Debito
                                            </p>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <label>Numero de tarjeta</label>
                                            <input class="form-control" type="number" name="num_card" id="card_element1" disabled >
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <label>Nombre titular</label>
                                            <input class="form-control" type="text" name="titular_card" id="card_element2" disabled >
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <label>Fecha de vencimiento</label>
                                            <input class="form-control" type="date" name="expirate_date" id="card_element3" disabled >
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <label>Código de seguridad</label>
                                            <input class="form-control" type="text" name="security_cod" id="card_element4" maxlength="4" disabled >
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <label>Banco emisor</label>
                                            <input class="form-control" type="text" name="bank" id="card_element5" disabled >
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <label>Tipo de tarjeta</label>
                                            <input class="form-control" type="text" name="card_type" id="card_element6" disabled >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 border-start border-end">
                                    <div class="row" id="cash_method">
                                        <div class="col-12 mt-sm-2 mt-lg-0">
                                            <p>
                                                <input type="radio" value="1" name="confirm_method" id="confirm_cash_method" required> Efectivo
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <label>Nombres y apellidos</label>
                                            <input class="form-control" type="text" name="cash_name" id="cash_element1" disabled>
                                        </div>
                                        <div class="col-6">
                                            <label>Cod Factura</label>
                                            <input class="form-control" type="text" name="cash_cod" id="cash_element2" disabled>
                                        </div>                                
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="row" id="nequi_method">
                                        <div class="col-12 mt-sm-2">
                                            <p>
                                                <input type="radio" value="2" name="confirm_method" id="confirm_nequi_method" required> Nequi
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <label>Nombres y apellidos</label>
                                            <input class="form-control" type="text" name="nequi_name" id="nequi_element1" disabled>
                                        </div>
                                        <div class="col-6">
                                            <label>Celular</label>
                                            <input class="form-control" type="text" name="nequi_num" id="nequi_element2" disabled>
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
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            </div>
        </div>
    </body>
</html>
<?php

?>

