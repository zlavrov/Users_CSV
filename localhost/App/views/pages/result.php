<?php

    use App\Controllers\Elements;
    use App\Models\Select;
    use App\views\inclusion\Thead;
    use App\Models\Errorhandler;

    /**
     * Displays a table of records from a database
     */

?>
<!DOCTYPE html>
<html lang="en">
    <?php Elements::elements('head'); ?>
    <body>
        <div class="container-fluid">

            <div class="d-flex justify-content-center mt-4">
                <h1>View results</h1>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <a href="/upload">Import data</a>
            </div>

            <div class="d-flex justify-content-center mt-4">

                <?php 
                    
                    $result = Select::select();

                    if ($result) {
                        $thead = Thead::thead();
                        echo $thead;
                        foreach($result as $row){
                            echo "<tr>";
                            echo '<td scope="col"><b>' . $row["UID"] . '</b></td>';
                            echo "<td>" . $row["Name"] . "</td>";
                            echo "<td>" . $row["Age"] . "</td>";
                            echo "<td>" . $row["Email"] . "</td>";
                            echo "<td>" . $row["Phone"] . "</td>";
                            echo "<td>" . $row["Gender"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody></table>";

                    } else {
                        Errorhandler::Errorhandler("No data in database");
                    }

                ?>

            </div>

            <div class="d-flex justify-content-center mt-4 mb-5">
                <button class="btn btn-primary" style="width: 10%" onclick="document.getElementById('link').click()"><i class="fa fa-download"></i>Export to CSV</button>
                <a id="link" href="/App/views/components/files_export/Export_to_CSV.csv" download hidden></a>
            </div>

        </div>

        <script src="/App/views/components/scripts/script.js"></script>
    </body>
</html>