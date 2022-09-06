<?php

namespace App\Models;

class Errorhandler {


    /**
     * Collects all errors and presents them
     */

    public static function Errorhandler($error) {

        require_once "App/views/pages/error.php";
        echo "<h3>" . $error . "</h3>";
        die();
    }
}

?>