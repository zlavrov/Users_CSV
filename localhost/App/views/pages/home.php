<!DOCTYPE html>
<html lang="en">
    <?php

    require_once "App/Views/Parts/head.php";

    ?>
    <body>
        <div class="px-4 my-5 text-center">
            <h1 class="display-5 fw-bold">Home page</h1>
            <div class="col-lg-6 mx-auto">
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a class="btn btn-lg btn-primary px-4 gap-3" href="/import">Import data</a>
                    <a class="btn btn-outline-secondary btn-lg px-4" href="/results">View results</a>
                </div>
            </div>
        </div>
    </body>
</html>