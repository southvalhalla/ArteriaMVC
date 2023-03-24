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
        <form action="<?= constant('URL') ?>users/editUser" class="contenedor_popup" method="POST">
            <table class="table table-dark table-striped table-hover justify-content-center border-secondary rounded mx-auto">
                <tr><th colspan="2">Nuevo Usuario</th></tr>
                <tr>
                    <td>Categoria</td>
                    <td>
                        <select class="form-select ms-1" name="user_info" required>
                            <option value="" disabled>--SELECCIONE UN USUARIO--</option>
                                <?php 
                                $role = $this->userView->role=='Cliente'?'client':'employee';
                                $id = $this->userView->id_client!=NULL?$this->userView->id_client:$this->userView->id_employee;
                                $name = $this->userView->client!=NULL?$this->userView->client:$this->userView->employee;
                                $options=$role.','.$id.','.$name.','.$this->userView->email;
                                $idUser=$id;
                                $nameUser=$name;
                            ?>
                            <optgroup label="Seleccionado">
                                <option value="<?= $options ?>" selected>
                                    ID: <?= $idUser?> | <?= $nameUser ?>
                                </option>
                            </optgroup>
                            <optgroup label="Clientes">
                                <?php

                                    include_once 'app/class/client.php';
                                    foreach($this->clients as $client):
                                        $result = "";
                                        $options = 'cliente,'.$client['id'].','.$client['names'].' '.$client['lastnames'].','.$client['email'];
                                ?>

                                <option value="<?= $options ?>">
                                    ID: <?= $client['id']?> | <?= $client['names'].' '.$client['lastnames'] ?>
                                </option>

                                <?php endforeach; ?> 
                            </optgroup>
                            <optgroup label="Empleados">
                                <?php
                                    include_once 'app/class/employee.php';
                                    foreach($this->employees as $employee):
                                        $result="";
                                        $options = 'employee,'.$employee['id'].','.$employee['names'].' '.$employee['lastnames'].','.$employee['email'];
                                ?>

                                <option value="<?= $options ?>">
                                    ID: <?= $employee['id']?> | <?= $employee['names'].' '.$employee['lastnames'] ?>
                                </option>

                                <?php endforeach; ?>
                            </optgroup>                            
                        </select>   
                    </td>
                </tr>
                <tr>
                    <td>Rol </td>
                    <td>
                        <select name="role" id="role" class="form-select ms-1">
                            <?php if($this->userView->role!='Cliente'){ ?>
                                <option value="Administrador" <?= $this->userView->role == "Administrador"?"selected":"" ?>>Administrador</option>
                                <option value="Despachador" <?= $this->userView->role == "Despachador"?"selected":"" ?>>Despachador</option>
                                <option value="Gerente" <?= $this->userView->role == "Gerente"?"selected":"" ?>>Gerente</option>
                                <option value="Vendedor" <?= $this->userView->role == "Vendedor"?"selected":"" ?>>Vendedor</option>
                            <?php } ?>

                            <option value="Cliente" <?= $this->userView->role == "Cliente"?"selected":"" ?>>Cliente</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Contraseña </td>
                    <td><input type="password" name="password" class="form-control ms-1" value="<?= $this->userView->password; ?>"></td>
                </tr>
                <tr> 	
                    <td colspan="2">
                        <a href="<?= constant('URL') ?>users"><button  class="btn btn-danger" type="button" onclick="cancelarform()">Cancelar</button></a>
                        <input class="btn btn-success" type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm ('¿Deseas registrar a este producto?');">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>

