<?php
    $config = [
        'HELPERS_PATH' => APPLICATION_PATH . DS . 'lib' . DS . 'helpers' . DS,
        'CONTROLLER_PATH' => APPLICATION_PATH . DS . 'controller' . DS,
        'IMAGES_PATH' =>  DS . 'assets' . DS .'img' . DS,
        'MODEL_PATH' => APPLICATION_PATH . DS . 'model' . DS,
        'VIEW_PATH' => APPLICATION_PATH . DS . 'view' . DS,
        'DATA_PATH' => APPLICATION_PATH . DS . 'data' . DS,
        'LIB_PATH' => APPLICATION_PATH . DS . 'lib' . DS
    ];

    define("URL","/");
    define("CONTROLLER_INDEX",0);
    define("METHOD_INDEX",1);
    define("PARAMETER_INDEX",2);

    //This code must be uncomment when it deploys to the server
    /*define("URL","http://f0t22.gblearn.com/comp1230/assignments/assignment1/");
    define("CONTROLLER_INDEX",3);
    define("METHOD_INDEX",4);
    define("PARAMETER_INDEX",5);*/

    
    define('CATEGORY_ID', 0);
    define('CATEGORY_TITLE', 1);
    define('CATEGORY_DESCRIPTION', 2);


    define('ITEM_ID', 0);
    define('ITEM_TITLE', 1);
    define('ITEM_DESCRIPTION', 2);
    define('ITEM_PRICE', 3);
    define('ITEM_PICTURE', 4);
    define('ITEM_CATEGORY_ID', 5);

