<?php
    $config = [
        'HELPERS_PATH' => APPLICATION_PATH . DS . 'lib' . DS . 'helpers' . DS,
        'CONTROLLER_PATH' => APPLICATION_PATH . DS . 'controller' . DS,
        'IMAGES_PATH' =>  DS . 'assets' . DS .'images' . DS,
        'MODEL_PATH' => APPLICATION_PATH . DS . 'model' . DS,
        'VIEW_PATH' => APPLICATION_PATH . DS . 'view' . DS,
        'DATA_PATH' => APPLICATION_PATH . DS . 'data' . DS,
        'LIB_PATH' => APPLICATION_PATH . DS . 'lib' . DS
    ];

    define("URL","http://localhost:8082/");
    define('CATEGORY_ID', 0);
    define('CATEGORY_TITLE', 1);
    define('CATEGORY_DESCRIPTION', 2);


    define('ITEM_ID', 0);
    define('ITEM_TITLE', 1);
    define('ITEM_DESCRIPTION', 2);
    define('ITEM_PRICE', 3);
    define('ITEM_PICTURE', 4);
    define('ITEM_CATEGORY_ID', 5);

