<?php

    define('IS_LOCAL', in_array($_SERVER['REMOTE_ADDR'],['127.0.0.1','::1']));      /* Server */

    date_default_timezone_set('America/Lima');                                      /* timezone */

    define('LANG','es');                                                            /* Language */

    define('BASEPATH', IS_LOCAL ? '/ciisapp/' : 'https://ciistacna.com/');

    define('AUTH_SALT', 'ciisapp<3');                                        /* Sal del Sistema */

    define('PORT','80');

    define('URL', IS_LOCAL ? 'http://127.0.0.1:'.PORT.'/ciisapp/' : 'https://ciistacna.com/');

    // rutas de directorios y archivos =>

    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', getcwd().DS);

    define('APP',           ROOT.'app'.DS);
    define('CLASSES',       APP.'classes'.DS);
    define('CONFIG',        APP.'config'.DS);
    define('CONTROLLERS',   APP.'controllers'.DS);
    define('FUNCTIONS',     APP.'functions'.DS);
    define('MODELS',        APP.'models'.DS);

    define('TEMPLATES',     ROOT.'templates'.DS);
    define('INCLUDES',      TEMPLATES.'includes'.DS);
    define('MODULES',       TEMPLATES.'modules'.DS);
    define('VIEWS',         TEMPLATES.'views'.DS);

    define('ASSETS',        URL.'assets/');
    define('CSS',           ASSETS.'css/');
    define('FAVICON',       ASSETS.'favicon/');
    define('FONTS',         ASSETS.'fonts/');
    define('IMAGES',        ASSETS.'images/');
    define('JS',            ASSETS.'js/');
    define('PLUGINS',       ASSETS.'plugins/');
    define('UPLOADS',       ASSETS.'uploads/');

    // credenciales base de datos   =>  desarrollo
    define('LDB_ENGINE' ,   'mysql');
    define('LDB_HOST'   ,   'localhost');
    define('LDB_NAME'   ,   'ciis2020');
    define('LDB_USER'   ,   'root');
    define('LDB_PASS'   ,   'FrancoSQL12+');
    define('LDB_CHARSET',   'utf8');

    // credenciales base de datos   =>  producción
    define('DB_ENGINE' ,   'mysql');
    define('DB_HOST'   ,   'localhost');
    define('DB_NAME'   ,   'ciis2020');
    define('DB_USER'   ,   'root');
    define('DB_PASS'   ,   'lobitogeiner24');
    define('DB_CHARSET',   'utf8');

    /**
     * Controlador Defecto
    */
    define('DEFAULT_CONTROLLER'         , 'home');
    define('DEFAULT_ERROR_CONTROLLER'   , 'error');
    define('DEFAULT_METHOD'             , 'index');
