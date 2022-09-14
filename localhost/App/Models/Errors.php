<?php

namespace App\Models;

class Errors {

    public static function errors($permission) {
        require_once "App/Views/Errors/errors.php";
        echo "<div class='d-flex justify-content-center mt-4'><h3>" . $permission . "</h3></div>";
    }
}

?>