<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="<?= constant('URL') ?>public/css/style.css" rel="stylesheet">

    <title>Arteria</title>
    <style>
		img {
            width: 100vw;
            height: auto;
        }   
        body {
            height: 100%;
            overflow: hidden;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
            overflow-y: auto;
        }
    </style>
</head>
<body class="bg-dark">

    <?php
        include 'app/views/navBar.php';
    ?>
    <img src="public/img/logo_negro.jpg" alt="Descripción de la imagen">
    <div>
        <div style="top:25%" class="position-absolute start-50 translate-middle">
            <!-- <center><h1 class="display-1 text-danger ">Arteria</h1></center> -->
            <form method="POST" action="" class="text-white" >
                <div class="form-group">
                    <label  for="doc">BUSQUEDA</label>
                    <select name="tipo">
                        <option value="nombre">Nombre/Tipo</option>
                        <option value="documento">Documento/ID</option>                        
                    </select>
                    <select name="selec">
                        <option value="usuario">Usuarios</option>
                        <option value="compras">Compras</option>
                        <option value="categorias">Categorias</option>
                        <option value="productos">Productos</option>
                    </select>
                    <input type="text" name="doc" id="doc">
                    <input class="btn btn-primary p-0" type="submit" value="Consultar" name="btn_consultar">
                </div>
            </form>
        </div>
    </div>
</body>
</html>