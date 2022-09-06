<?php
namespace App\Models\Config;

class Config {
    

    /**
     * Database connection configuration
     */

    public static function config() {
        return [
            "host" => "localhost",
            "port" => 3333,
            "username" => "root",
            "password" => "root",
            "dbname" => "data_db",
            "tbname" => "data_tb"
        ];
    }
}

?>