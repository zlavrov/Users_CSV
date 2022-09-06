<?php

namespace App\Models;
use App\Models\Config\Config;
use PDO;
use PDOException;
use App\Models\Errorhandler;

class Select {


    /**
     * Gets records from the database, writes to the data in the export file, forms a table of results
     */

    public static function select() {

        $config = Config::config();
        $answer = self::check_records();
        if (!$answer) {
            Errorhandler::Errorhandler("No data in database");
        } else {
            try {
                $conn = new PDO("mysql:host=" . $config["host"] . ":" . $config["port"] . ";dbname=" . $config["dbname"] . "", $config["username"], $config["password"]);
                $sql = "SELECT * FROM " . $config["tbname"] . "";
                $result = $conn->query($sql);
                self::clean_export_file();
                $fd = fopen("App/views/components/files_export/Export_to_CSV.csv", 'a') or Errorhandler::Errorhandler("Failed to write to file Export_to_CSV.csv");
                $arr = ["UID", "Name", "Age", "Email", "Phone", "Gender"];
                fputcsv($fd, $arr);
                $respons = require_once "App/views/inclusion/thead.php";
                foreach($result as $row){
                    $respons .= "<tr>";
                    $respons .= '<td scope="col"><b>' . $row["UID"] . '</b></td>';
                    $respons .= "<td>" . $row["Name"] . "</td>";
                    $respons .= "<td>" . $row["Age"] . "</td>";
                    $respons .= "<td>" . $row["Email"] . "</td>";
                    $respons .= "<td>" . $row["Phone"] . "</td>";
                    $respons .= "<td>" . $row["Gender"] . "</td>";
                    $respons .= "</tr>";

                    $ar = [$row["UID"], $row["Name"], $row["Age"], $row["Email"], $row["Phone"], $row["Gender"]];
                    fputcsv($fd, $ar);
                }
                $respons .= "</tbody></table>";
                fclose($fd);
                echo $respons;
            }
            catch (PDOException $e) {
                Errorhandler::Errorhandler("Database error: " . $e->getMessage());
            }
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
     * Checking for Records in a Database
     */

    public static function check_records() {

        $config = Config::config();
        try {
            $conn = new PDO("mysql:host=" . $config["host"] . ":" . $config["port"] . ";dbname=" . $config["dbname"] . "", $config["username"], $config["password"]);
            $check_user = $conn->query("SELECT EXISTS(SELECT * FROM data_tb LIMIT 1) AS check_user;");
            foreach($check_user as $checks) {
                if ($checks['check_user'] == 1) {
                    return true;
                } else if ($checks['check_user'] == 0) {
                    return false;
                }
            }
        }
        catch (PDOException $e) {
            Errorhandler::Errorhandler("Database error: " . $e->getMessage());
        }
    }
}

?>