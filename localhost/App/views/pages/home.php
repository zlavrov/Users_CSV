<?php

    use App\Controllers\Elements;

    /**
     * Home page
     */

?>
<!DOCTYPE html>
<html lang="en">
    <?php Elements::elements('head'); ?>
    <body>
        <div class="container-fluid">
        <div class="d-flex justify-content-center mt-4">
            <h1>Home page</h1>
        </div>
            <div class="d-flex justify-content-center">
                <a class="btn btn-lg btn-primary mr-2" href="/upload">Upload page</a><a class="btn btn-lg btn-primary ml-2" href="/result">Results page</a>
            </div>
        </div>
        <script src="/App/views/components/scripts/script.js"></script>
    </body>
</html>