<?php

namespace App\Controllers;

class Parts {

    public static function parts($parts) {
        if ($parts) {
            require_once "App/Views/Parts/" . $parts . ".php";
        }
    }
}

?>