<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= constant('URL') ?>main">ArteriaElectronics</a>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= constant('URL') ?>products" >Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= constant('URL') ?>categories" >Categorias</a>
          <li class="nav-item">
            <a class="nav-link" href="<?= constant('URL') ?>sales" >Ventas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= constant('URL') ?>employees" >Empleados</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= constant('URL') ?>clients" >Clientes</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="<?= constant('URL') ?>users" >Usuarios</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link btn btn-outline-success my-2 my-sm-0" href="#">Cerrar sesión</a>
          </li>
          
        </ul>
      </div>
    </nav>
  </body>
</html>