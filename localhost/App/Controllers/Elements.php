<?php

namespace App\Controllers;


class Elements {


    /**
     * Adding page parts, head and form
     */


    public static function elements($parametr) {

        require_once "App/views/inclusion/" . $parametr . ".php";
        
    }
}

?>