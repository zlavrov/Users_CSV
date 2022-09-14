<?php

namespace App\Models;
use App\Models\Errors;
use App\Models\Config\Config;
use PDOException;

class Clear {


    /**
     * Clears the database of all records
     */

    public static function clear() {

        $response = self::check_user();
        $config = Config::config();
        try {
            $conn = Connection::conn();
            if ($response) {
                $sql = "TRUNCATE TABLE " . $config["tbname"] . ";";
                $conn->exec($sql);
                header("Location: /import");
            } else if ($response) {
                Errors::errors("No records in database");
            }
            self::clean_export_file();
            header("Location: /import");
        } catch(PDOException $e) {
            Errors::errors("Database error: " . $e->getMessage());
        }
    }


    /**
     * Clears the export file
     */

    public static function clean_export_file() {

        $fd = fopen("files/export/Export_to_CSV.csv", 'w') or Errors::errors("Failed to clear file Export_to_CSV.csv");
        fclose($fd);
    }


    /**
     * Checks if there are records in the database
     */

    public static function check_user() {

        $config = Config::config();
        try {
            $conn = Connection::conn();
            $check_user = $conn->query("SELECT EXISTS(SELECT * FROM " . $config["tbname"] . ") AS check_user");
            foreach($check_user as $checks) {
                if ($checks['check_user'] == 1) {
                    return true;
                } else if ($checks['check_user'] == 0) {
                    return false;
                }
            }
        } catch(PDOException $e) {
            Errors::errors("Database error: " . $e->getMessage());
        }
    }
}

?>