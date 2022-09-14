<?php

namespace App\Controllers;
use App\Models\Errors;
use App\Models\Connection;
use App\Models\Import;
use App\Models\Clear;
use App\Models\Results;

class Router {

    public static function router() {

        $directory = 'App/Views/Pages/';
        $scanned_directory = array_diff(scandir($directory), array('..', '.'));
        if (isset($_GET['parametr'])) {

            if (in_array($_GET['parametr'] . ".php", $scanned_directory)) {
                require_once "App/Views/Pages/" . $_GET['parametr'] . ".php";
            } else if ($_GET['parametr'] == "uploadfile") {
                Import::uploadfile();
            } else if ($_GET['parametr'] == "clear") {
                Clear::clear();
            } else if ($_GET['parametr'] == "sorts") {
                $column = $_POST['column'];
                $orientation = $_POST['orientation'];
                echo Results::results($column, $orientation);
            } else {
                require_once "App/Views/Pages/home.php";
            }
        } else {
            require_once "App/Views/Pages/home.php";
        }
    }

    /**
     * If there is a connection to the database, then it further determines the method and directs it along the route
     */

    public static function start() {

        $permission = Connection::connection();
        if($permission == "true") {
            self::router();
        } else {
            Errors::errors("$permission");
        }
        
    }

}

?>