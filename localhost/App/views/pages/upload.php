<?php

    use App\Controllers\Elements;

    /**
     * Displays the submit form
     */

?>
<!DOCTYPE html>
<html lang="en">
    <?php Elements::elements('head'); ?>
    <body>
        <div class="container-fluid">
        <div class="d-flex justify-content-center mt-4">
            <h1>Import data</h1>
        </div>
            <div class="d-flex justify-content-center">
                <?php Elements::elements('form'); ?>
            </div>
        </div>
        <script src="/App/views/components/scripts/script.js"></script>
    </body>
</html>