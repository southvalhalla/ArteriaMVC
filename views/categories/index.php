<html>
    <head>    
		<title>Arteria</title>
		<meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="/public/css/style.css">
    </head>
    <body class="bg-dark bg-gradient">
        <?php
            include 'navBar.php';
        ?>
        <table class="table table-dark table-striped table-hover d-flex justify-content-center border-secondary rounded ">
            
            <div id="barrabuscar" class="ms-2 form-group">
                <form method="POST">
                    <input type="text" name="txtbuscar" id="cajabuscar" placeholder="Ingresar nombre de producto" class="form form-control w-25"><input type="submit" value="Buscar" class="btn btn-success mt-2" name="btnbuscar">
                </form>
            </div>
            <tr><th colspan="9" class="text-center"><h1>LISTA DE CATEGORIAS</h1><th><a class="btn btn-primary mt-2" onclick="abrirform()">Agregar</a></th></tr>
            <tr>
                <th>id</th>
                <th>Tipo de Producto</th>
                <th>Caracteristicas</th>
                <th>Accion</th>
                
            </tr>                        
            <tr>
                <td>cod</td>
                <td>tipo_pro</td>
                <td>carac</td> 
                <td style='width:26%'>
                    <a class='btn btn-success' href='#'>Modificar</a> | <a class='btn btn-danger' href='#' onClick=<?="return confirm('¿Estás seguro de eliminar a $mostrar[nom_pro]?')"?>>Eliminar</a>
                </td>
            </tr>
        </table>
        <script src="/src/main.js"></script>
        <div class="caja_popup bg-body-secondary border border-4 border-primary-subtle rounded position-absolute top-50 start-50 translate-middle w-50 h-75" id="formregistrar">
        <div class="caja_popup" id="formregistrar">
            <form action="" class="contenedor_popup" method="POST">
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
        </div>
        </div>
    </body>
</html>
<?php
$page = 1;
?>

