<?php
    require __DIR__ . '/vendor/autoload.php';
    require_once 'vendor/autoload.php';
    require_once 'app/config/dataBase.php';
    
    require_once 'app/libs/app.php';
    require_once 'app/libs/view.php';
    require_once 'app/libs/model.php';
    require_once 'app/libs/controller.php';
    
    require_once 'app/config/config.php';
    $app = new App();
?>

<script>
    import 'bootstrap';
    import 'bootstrap/dist/css/bootstrap.min.css';
</script>