<?php
session_start();
define('WORK_MODE', 'developing'); // production / developing

if (WORK_MODE == "developing") {
    error_reporting(E_ALL);
    define('HOST', '127.0.0.1');
    define('USER', 'postgres');
    define('PASSWORD', 'postgres');
    define('DATABASE', 'chat');
    define('PORT', "5432");
    define('BASE_URL', "http://localhost/taxi_ui/");
    define('MAIL_HEADER','Chat');
    define('ADMIN_EMAIL','palanivelayudam@gmail.com');
} else if (WORK_MODE == "production") {
    error_reporting(E_ALL);
    define('HOST', 'HOST');
    define('USER', 'USER');
    define('PASSWORD', 'PASSWORD');
    define('DATABASE', 'DATABASE');
    define('PORT', "PORT");
    define('BASE_URL', "BASEURL"); //http://localhost/taxi_ui/
    define('MAIL_HEADER','Chat');
    define('ADMIN_EMAIL','palanivelayudam@gmail.com');
}

define('BASE_PATH', str_replace("\\", "/", realpath("")));