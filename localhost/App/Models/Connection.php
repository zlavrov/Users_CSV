<?php

namespace App\Models;

use App\Models\Config\Config;
use PDO;
use PDOException;
use App\Models\Errorhandler;

class Connection {

    
    /**
     * Checking the database connection
     */

    public static function connection() {

        $config = Config::config();
        try {
            $conn = new PDO("mysql:host=" . $config["host"] . ":" . $config["port"] . ";dbname=" . $config["dbname"] . "", $config["username"], $config["password"]);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        }
        catch (PDOException $e) {
            Errorhandler::Errorhandler("Database error: " . $e->getMessage());
        }
    }
}

?>