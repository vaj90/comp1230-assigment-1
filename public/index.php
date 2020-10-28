<?php
    session_start();
    defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../app'));
    const DS = DIRECTORY_SEPARATOR;
    $cfg = APPLICATION_PATH . DS . 'config' . DS;
    require $cfg . 'config.php';
    $lib = $config['LIB_PATH'];
    $hp = $config['HELPERS_PATH'];
    $vw = $config['VIEW_PATH'];
    require $hp . 'session_helper.php';
    require $hp . 'file_helper.php';
    require $lib . 'bootstrap.php';
    require $lib . 'view.php';
    require $lib . 'controller.php';
    require $lib . 'data_manager.php';
    require $lib . 'flatfile' . DS . 'flatfile.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assign</title>
    <link type="text/css" rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="/assets/css/custom.css">
    <script src="/vendor/jquery/jquery-3.5.1.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</head>
<body>
    <div class="container">
        <?php
        $app = new Bootstrap();
        $session_helper = new SessionHelper();

        $cfh = new FileHelper("category");
        /*$ifh = new FileHelper('item');
        $id = $ifh->getId();*/

        //echo "<h1>$id</h1>";
        //$category = new Category($id,'Category 1','This is the description');

        $flatfile_db = new Flatfile();
        $data_manager = new DataManager($flatfile_db);
        $data_manager->addCategory($cfh->getId(),'category 1', 'category 1 description');

        ?>
    </div>
</body>
</html>