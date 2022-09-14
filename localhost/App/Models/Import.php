<?php

namespace App\Models;

use App\Models\Errors;
use App\Models\Connection;
use App\Models\Config\Config;
use PDO;
use PDOException;

class Import {

    public static $list = ['UID', 'Name', 'Age', 'Email', 'Phone', 'Gender'];
    public static $file_to = "files/import/";

    public static function uploadfile() {

        $file_size = $_FILES['name_csv_file']['size'];
        $file_from = $_FILES['name_csv_file']['tmp_name'];
        self::$file_to .= $_FILES['name_csv_file']['name'];
        if ($file_size <= 1048576) {
            if (move_uploaded_file($file_from, self::$file_to)) {
                $file_to_read = fopen(self::$file_to, 'r');
                $lines = fgetcsv($file_to_read, ',');
                if ($lines == self::$list) {
                    fclose($file_to_read);
                    header("Location: /import");
                    self::import_to_db();
                } else {
                    fclose($file_to_read);
                    unlink(self::$file_to);
                    Errors::errors("Columns in file do not match");
                    die();
                }
            } else {
                Errors::errors("File is no load");
                die();
            }
        } else {
            Errors::errors("File is too big");
            die();
        }
    }

    

    public static function import_to_db() {

        $config = Config::config();
        $permission = Connection::connection();
        $file_to_read = fopen(self::$file_to, 'r');
        if ($permission == "true") {
            $conn = Connection::conn();
            while (!feof($file_to_read) ) {
                $lines = fgetcsv($file_to_read, ',');
                if ($lines[0] !== null) {
                    try{
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
                        Errors::errors("Database error: " . $e->getMessage());
                    }
                }
            }
        } else {
            Errors::errors("Data is not connect");
        }
    }
}

?>