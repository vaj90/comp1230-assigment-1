<?php
    ob_start();
    $root_dir = dirname(__FILE__);
    defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/app'));
    const DS = DIRECTORY_SEPARATOR;
    $cfg = APPLICATION_PATH . DS . 'config' . DS;
    require $cfg . 'config.php';
    $lib = $config['LIB_PATH'];
    $hp = $config['HELPERS_PATH'];
    $vw = $config['VIEW_PATH'];
    $dt = $config['DATA_PATH'];
    $logged;
    $ctrlr = "";
    $rq_method = 'GET';
    require $hp . 'session_helper.php';
    require $hp . 'file_helper.php';
    require $lib . 'bootstrap.php';
    require $lib . 'view.php';
    require $lib . 'controller.php';
    require $dt . 'data_manager.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assign</title>
    <link type="text/css" rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.css">
    <link type="text/css" rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="/css/custom.css">
    <script src="/vendor/jquery/jquery-3.5.1.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="/vendor/bootbox/bootbox.js"></script>
    <script src="/js/app.js"></script>
</head>
<body>
    <div class="container">
        <?php
            $app = new Bootstrap();
            echo "Hello World";
        ?>
    </div>
</body>
</html>