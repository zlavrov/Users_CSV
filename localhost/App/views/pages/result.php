<?php

    use App\Controllers\Elements;
    use App\Models\Select;
    use App\views\inclusion\Thead;

    /**
     * Displays a table of records from a database
     */

?>
<!DOCTYPE html>
<html lang="en">
    <?php Elements::elements('head'); ?>
    <body>
        <div class="container-fluid">
            <h1>View results</h1>
            <a href="/upload">Import data</a>
            <div>
                <?php 
                    
                    $result = Select::select();
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
                    
                ?>
            </div>
            <div>
                <button class="btn btn-primary" style="width: 10%" onclick="document.getElementById('link').click()"><i class="fa fa-download"></i>Export to CSV</button>
                <a id="link" href="/App/views/components/files_export/Export_to_CSV.csv" download hidden></a>
            </div>
        </div>
        <script src="/App/views/components/scripts/script.js"></script>
    </body>
</html>