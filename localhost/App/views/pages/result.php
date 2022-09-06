<?php

    use App\Controllers\Elements;
    use App\Models\Select;

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
                <?php Select::select(); ?>
            </div>
            <div>
                <button class="btn btn-primary" style="width: 10%" onclick="document.getElementById('link').click()"><i class="fa fa-download"></i>Export to CSV</button>
                <a id="link" href="/App/views/components/files_export/Export_to_CSV.csv" download hidden></a>
            </div>
        </div>
        <script src="/App/views/components/scripts/script.js"></script>
    </body>
</html>