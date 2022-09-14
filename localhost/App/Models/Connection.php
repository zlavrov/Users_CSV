<?php

namespace App\Models;

use App\Models\Config\Config;
use App\Models\Errors;
use PDO;
use PDOException;

class Connection {

    public static function conn() {
        $config = Config::config();
        $conn = new PDO("mysql:host=" . $config["host"] . ":" . $config["port"] . ";dbname=" . $config["dbname"] . "", $config["username"], $config["password"]);
        return $conn;
    }

    /**
     * Checking the database connection
     */

    public static function connection() {

        try {
            $conn = self::conn();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return "true";
        }
        catch (PDOException $e) {
            Errors::errors("Connection failed: " . $e->getMessage());
        }
    }
}

?>