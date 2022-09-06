<?php

namespace App\Models;
use App\Models\Config\Config;
use PDO;
use PDOException;
use App\Models\Errorhandler;

class Clear {

    /**
     * Clears the database of all records
     */

    public static function clear() {

        $response = self::check_user();
        $config = Config::config();
        try {
            $conn = new PDO("mysql:host=" . $config["host"] . ":" . $config["port"] . ";dbname=" . $config["dbname"] . "", $config["username"], $config["password"]);
            if ($response) {
                $sql = "TRUNCATE TABLE " . $config["tbname"] . ";";
                $conn->exec($sql);
            } else if ($response) {
                Errorhandler::Errorhandler("No records in database");
            }
            self::clean_export_file();
        } catch(PDOException $e) {
            Errorhandler::Errorhandler("Database error: " . $e->getMessage());
        }
    }


    /**
     * Clears the export file
     */

    public static function clean_export_file() {

        $fd = fopen("App/views/components/files_export/Export_to_CSV.csv", 'w') or Errorhandler::Errorhandler("Failed to clear file Export_to_CSV.csv");
        fclose($fd);
    }


    /**
     * Checks if there are records in the database
     */

    public static function check_user() {

        $config = Config::config();
        try {
            $conn = new PDO("mysql:host=" . $config["host"] . ":" . $config["port"] . ";dbname=" . $config["dbname"] . "", $config["username"], $config["password"]);
            $check_user = $conn->query("SELECT EXISTS(SELECT * FROM " . $config["tbname"] . ") AS check_user");
            foreach($check_user as $checks) {
                if ($checks['check_user'] == 1) {
                    return true;
                } else if ($checks['check_user'] == 0) {
                    return false;
                }
            }
        } catch(PDOException $e) {
            Errorhandler::Errorhandler("Database error: " . $e->getMessage());
        }
    }
}


?>