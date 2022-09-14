<?php

namespace App\Models;
use App\Models\Config\Config;
use App\Models\Errors;
use App\Models\Connection;
use PDO;
use PDOException;

class Results {

    public static function results($column, $orientation) {
        $response = "";
        $config = Config::config();
        $answer = self::check_records();
        if (!$answer) {
            Errors::errors("No data in database");
        } else {
            try {
                $conn = Connection::conn();
                if ($column == "default" && $orientation == "default") {
                    $sql = "SELECT * FROM " . $config["tbname"] . "";
                } else {
                    $sql = "SELECT * FROM " . $config["tbname"] . " ORDER BY " . $column . " " . $orientation . "";
                }
                $sth = $conn->query($sql);
                $result = $sth->fetchAll();
                self::clean_export_file();
                $fd = fopen("files/export/Export_to_CSV.csv", 'a') or Errors::errors("Failed to write to file Export_to_CSV.csv");
                $arr = ["UID", "Name", "Age", "Email", "Phone", "Gender"];
                fputcsv($fd, $arr);
                foreach($result as $row){
                    $ar = [$row["UID"], $row["Name"], $row["Age"], $row["Email"], $row["Phone"], $row["Gender"]];
                    fputcsv($fd, $ar);
                }
                fclose($fd);
                foreach($result as $row){
                    $response .= "<tr>";
                    $response .= '<td scope="col"><b>' . $row["UID"] . '</b></td>';
                    $response .= "<td>" . $row["Name"] . "</td>";
                    $response .= "<td>" . $row["Age"] . "</td>";
                    $response .= "<td>" . $row["Email"] . "</td>";
                    $response .= "<td>" . $row["Phone"] . "</td>";
                    $response .= "<td>" . $row["Gender"] . "</td>";
                    $response .= "</tr>";
                }
                return $response;
            }
            catch (PDOException $e) {
                Errors::errors("Database error: " . $e->getMessage());
            }
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
     * Checking for Records in a Database
     */

    public static function check_records() {

        $config = Config::config();
        try {
            $conn = Connection::conn();
            $check_user = $conn->query("SELECT EXISTS(SELECT * FROM " . $config["tbname"] . " LIMIT 1) AS check_user;");
            foreach($check_user as $checks) {
                if ($checks['check_user'] == 1) {
                    return true;
                } else if ($checks['check_user'] == 0) {
                    return false;
                }
            }
        }
        catch (PDOException $e) {
            Errors::errors("Database error: " . $e->getMessage());
        }
    }
}

?>