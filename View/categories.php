<?php
    include_once "../controller/categories.controller.php";
    $page = 1;
?>
<html>
    <style>
        
    </style>
    <head>    
        <title>Arteria</title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="../src/style.css">
    </head>
    <body class="bg-dark bg-gradient">
        <!-- <?php include('../comple/navBar.php'); ?> -->
        <table class="table table-dark table-striped table-hover d-flex justify-content-center border-secondary rounded ">
            <!-- <div id="barrabuscar" class="ms-2 form-group">
                <form method="POST">
                    <input type="text" name="txtbuscar" id="cajabuscar" placeholder="Ingresar nombre de categoria" class="form form-control w-25"><input type="submit" value="Buscar" name="btnbuscar" class="btn btn-success mt-2">
                </form>
            </div> -->
            <tr><th colspan="3" class="text-center"><h1>categorias</h1><th><a class="btn btn-primary mt-2" onclick="abrirform()">Agregar</a></th></tr>
            <tr>
            
                <th>id</th>
                <th>Tipo de Producto</th>
                <th>Caracteristicas</th>
                <th>Accion</th>
                
            </tr>
            <?php foreach ($categories as $category ) { ?>
            <tr>       
                <td><?= $category[0]; ?></td>                
                <td><?= $category['tipo_pro']; ?></td>
                <td><?= $category['carac']; ?></td>
                <td style='width:auto'><a class='btn btn-success' href=<?= "editar.php?cod=$mostrar[cod]" ?> >Modificar</a> | <a class='btn btn-danger' href=<?= "eliminar.php?cod=$mostrar[cod]" ?> onClick=<?= "return confirm('¿Estás seguro de eliminar a $mostrar[tipo_pro]?')" ?> >Eliminar</a></td> 
            </tr>
            <?php } ?>
        </table>
        <script>
            function abrirform() {
                document.getElementById("formregistrar").style.display = "block";
            }

            function cancelarform() {
                document.getElementById("formregistrar").style.display = "none";
            } 

        </script>
        <!-- <div class="caja_popup" id="formregistrar">
            <form action="agregar.php" class="contenedor_popup" method="POST">
                <table>
                    <tr><th colspan="2">Categoria</th></tr>
                    <tr>
                        <td>id</td>
                        <td><input type="number" name="txtcod" required></td>
                    </tr>
                    <tr>
                        <td>tipo_producto</td>
                        <td><input type="text" name="txttipo_pro" required></td>
                    </tr>
                    <tr>
                        <td>caracteristicas</td>
                        <td><input type="text" name="txtcarac" required></td>
                    </tr>
                    <tr> 	
                        <td colspan="2">
                            <button type="button" onclick="cancelarform()">Cancelar</button>
                            <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm ('¿Deseas registraresta categoria?');">
                        </td>
                    </tr>
                </table>
            </form>
        </div> -->
    </body>
</html>

