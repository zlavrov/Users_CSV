<?php

    namespace App\Controllers;

    use App\Models\Clear;
    use App\Models\Connection;
    use App\Models\Insert;
    use App\Models\Errorhandler;


class Router {


    /**
     * If there is a connection to the database, then it further determines the method and directs it along the route
     */

    public static function start() {

        if(self::connect()) {
            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                $parametr = $_GET['parametr'];
                if ($parametr == "Insert") {
                    Insert::insert();
                } else if ($parametr == "clear") {
                    Clear::clear();
                }
            } else if ($_SERVER['REQUEST_METHOD'] === "GET") {
                if ($_GET['parametr'] == "") {
                    require_once "App/views/pages/home.php";
                } else {
                    $parametr = $_GET['parametr'];
                    require_once "App/views/pages/" . $parametr . ".php";
                }

            }

        } else {
            Errorhandler::Errorhandler("Database error: " . $e->getMessage());
        }
    }

    

    /**
     * Gets a response about the state of the connection to the database
     */

    public static function connect() {

        return Connection::connection();

    }
}

?>