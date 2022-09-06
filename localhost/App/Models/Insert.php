<?php

namespace App\Models;
use App\Models\Config\Config;
use PDO;
use PDOException;
use App\Models\Errorhandler;

class Insert {


    /**
     * Saves the imported file, extracts data from the imported file line by line, 
     * checks for compatibility of the file columns with the database columns, 
     * checks for the presence of UID records in the database, if there are no matches, 
     * writes, if there are matches, edits
     */

    public static function insert() {

        $config = Config::config(); 
        $file_from = $_FILES['name_csv_file']['tmp_name'];
        $file_to = 'App/views/components/files_import/' . $_FILES['name_csv_file']['name'];
        if (move_uploaded_file($file_from, $file_to)) {
            $list = ['UID', 'Name', 'Age', 'Email', 'Phone', 'Gender'];
            $file_to_read = fopen($file_to, 'r');
            $lines = fgetcsv($file_to_read, ',');
            $conn = new PDO("mysql:host=" . $config["host"] . ":" . $config["port"] . ";dbname=" . $config["dbname"] . "", $config["username"], $config["password"]);
            if ($lines == $list) {
                while (!feof($file_to_read) ) {
                    $lines = fgetcsv($file_to_read, ',');
                    if ($lines[0] !== null) {
                        try {
                            $check_user = $conn->query("SELECT EXISTS(SELECT * FROM " . $config["tbname"] . " WHERE `UID` = $lines[0]) AS check_user");
                            foreach($check_user as $checks) {
                                if ($checks['check_user'] == 1) {
                                    $sql = "UPDATE " . $config["tbname"] . " SET `UID` = '$lines[0]', `Name` = '$lines[1]', `Age` = '$lines[2]', `Email` = '$lines[3]', `Phone` = '$lines[4]', `Gender` = '$lines[5]' WHERE `data_tb`.`UID` = $lines[0];";
                                    $conn->exec($sql);
                                } else if ($checks['check_user'] == 0) {
                                    $sql = "INSERT INTO " . $config["tbname"] . " (`UID`, `Name`, `Age`, `Email`, `Phone`, `Gender`) VALUES ('$lines[0]', '$lines[1]', '$lines[2]', '$lines[3]', '$lines[4]', '$lines[5]');";
                                    $conn->exec($sql);
                                }
                            }
                        } catch(PDOException $e) {
                            Errorhandler::Errorhandler("Database error: " . $e->getMessage());
                        }
                    }
                }
            } else {
                Errorhandler::Errorhandler("Columns do not match those in the database");
            }
            fclose($file_to_read);
            echo "<h2>Data upload successful</h2>";
        } else {
            Errorhandler::Errorhandler("File upload error");
        }
    }
}

?>