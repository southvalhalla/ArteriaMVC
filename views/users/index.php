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
            <tr><th colspan="9" class="text-center"><h1>LISTA DE USUARIOS</h1><th><a class="btn btn-primary mt-2" onclick="abrirform()">Agregar</a></th></tr>
            <tr>
                <th>Num Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Ciudad</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Codigo postal</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Accion</th>
                
            </tr>                        
            <tr>
                <td>cod</td>
                <td>nombre</td>
                <td>apellido</td>
                <td>ciudad</td>
                <td>direccion</td>
                <td>telefono</td>
                <td>codigo_postal</td>
                <td>correo_cliente</td>
                <td>contrasena</td>
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
                    <tr><th colspan="2">Nuevo usuario</th></tr>
                    <tr>
                        <td>Num Documento</td>
                        <td><input class="form-control" type="number" name="txtcod" required></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><input class="form-control" type="text" name="txtnombre" required></td>
                    </tr>
                    <tr>
                        <td>Apellido</td>
                        <td><input class="form-control" type="text" name="txtapellido" required></td>
                    </tr>
                    <tr>
                        <td>Ciudad</td>
                        <td><input class="form-control" type="text" name="txtciudad" required></td>
                    </tr>
                    <tr>
                        <td>Direccion</td>
                        <td><input class="form-control" type="text" name="txtdireccion" required></td>
                    </tr>
                    <tr>
                        <td>Telefono</td>
                        <td><input class="form-control" type="number" name="txttelefono" required></td>
                    </tr>
                    <tr>
                        <td>Codigo postal</td>
                        <td><input class="form-control" type="number" name="txtcodigo" required></td>
                    </tr>
                    <tr>
                        <td>Correo</td>
                        <td><input class="form-control" type="email" name="txtcorreo" required></td>
                    </tr>
                    <tr>
                        <td>Contraseña</td>
                        <td><input class="form-control" type="password" name="txtcontrasena" required></td>
                    </tr>
                    <tr> 	
                        <td colspan="2">
                            <button class="btn btn-danger" type="button" onclick="cancelarform()">Cancelar</button>
                            <input class="btn btn-primary" type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm ('¿Deseas registrar a este usuario?');">
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

