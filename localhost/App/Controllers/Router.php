<?php

    namespace App\Controllers;

    use App\Models\Clear;
    use App\Models\Connection;
    use App\Models\Insert;
    use App\Models\Errorhandler;


class Router {


    public static function router($route = "") {

        if ($route == "") {
            require_once "App/views/pages/home.php";
        } else if ($_SERVER['REQUEST_METHOD'] === "GET") {
            require_once "App/views/pages/" . $route . ".php";
        } else if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if ($_GET['parametr'] == "clear") {
                Clear::clear();
            } else if ($_GET['parametr'] == "import") {
                Insert::insert();
            }
        }
    }


    /**
     * If there is a connection to the database, then it further determines the method and directs it along the route
     */

    public static function start() {

        $permission = Connection::connection();
        if($permission) {
            self::router($_GET['parametr']);
        } else {
            Errorhandler::Errorhandler("Database error");
        }
    }

}

?>