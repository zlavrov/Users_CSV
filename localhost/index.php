<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    /**
     * Application launch
     */

    use App\Controllers\Router;
    require_once __DIR__ . "/vendor/autoload.php";
    Router::start();

?>