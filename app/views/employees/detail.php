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
        <form action="<?= constant('URL') ?>employees/editEmployee" class="contenedor_popup" method="POST">
            <table class="table table-dark table-striped table-hover justify-content-center border-secondary rounded w-auto">
                <tr><th colspan="2">Editar Empleado</th></tr>
                <tr>
                    <td>
                        <select class="form-select" name="document_type" required>
                            <?php
                            $option1 = "";
                            $option2 = "";
                            $option3 = "";
                                if ($this->employeeView->document_type == "cedula de ciudadania"){
                                    $option1 = "selected";
                                }else if ($this->employeeView->document_type == "tarjeta de identidad"){
                                    $option2 = "selected";
                                }else if ($this->employeeView->document_type == "cedula de extranjeria"){
                                    $option3 = "selected";
                                }
                            ?>
                            <option value="" disabled>Tipo de documento</option>
                            <option value="cedula de ciudadania" <?= $option1 ?>>Cedula de ciudadania</option>
                            <option value="tarjeta de identidad" <?= $option2 ?>>Tarjeta de identidad</option>
                            <option value="cedula de extranjeria" <?= $option3 ?>>Cedula de extranjeria</option>
                        </select>
                    </td>
                    <td>
                        <input class="form-control" type="number" name="document_number" value="<?= $this->employeeView->document_number ?>" placeholder="Numero de documento" required>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <input class="form-control" type="text" name="names" value="<?= $this->employeeView->names ?>" placeholder="Nombres" required>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="lastnames" value="<?= $this->employeeView->lastnames ?>" placeholder="Apellidos" required>
                    </td>
                </tr>
                <tr>
                    <td  colspan="2">
                        <input class="form-control" type="email" name="email" value="<?= $this->employeeView->email ?>" placeholder="Correo" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="form-control" type="number" name="phone" value="<?= $this->employeeView->phone ?>" placeholder="Telefono" required>
                    </td>
                    <td>
                        <?php
                            $option1 = "";
                            $option2 = "";
                            $option3 = "";
                                if ($this->employeeView->document_type == "Gerente"){
                                    $option1 = "selected";
                                }else if ($this->employeeView->document_type == "Vendedor"){
                                    $option2 = "selected";
                                }else if ($this->employeeView->document_type == "Desarrollador"){
                                    $option3 = "selected";
                                }
                            ?>
                        <select class="form-select" name="job" required>
                            <option value="" disabled>Cargo</option>
                            <option value="Gerente" <?= $option1 ?>>Gerente</option>
                            <option value="Vendedor" <?= $option2 ?>>Vendedor</option>
                            <option value="Desarrollador" <?= $option3 ?>>Desarrollador</option>
                        </select>
                    </td>
                </tr>
                <tr> 	
                    <td colspan="2">
                        <a href="<?= constant('URL') ?>employees"><button  class="btn btn-danger" type="button" onclick="cancelarform()">Cancelar</button></a>
                        <a href=""><input class="btn btn-success" type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm ('¿Deseas registrar a este producto?');"></a>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>

