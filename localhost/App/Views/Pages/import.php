<?php

use App\Controllers\Parts;

?>
<!DOCTYPE html>
<html lang="en">
    <?php

    Parts::parts('head');

    ?>
    <body>
        <div class="px-4 my-5 text-center">
            <h1 class="display-5 fw-bold">Import data</h1>
        </div>
        <div class="d-flex justify-content-center">
            <?php

            Parts::parts('form');

            ?>
            <div class="mt-4">
                <a href="/results">View results</a>
            </div>
        </div>
        <script>
            /**
             * Limits file uploads to no more than 1 MB
             */

                let uploadField = document.getElementById("file_id");
                let message = document.getElementById("message");
                uploadField.onchange = function() {
                    if(this.files[0].size > 1048576){
                        message.innerHTML = "File is too big";
                        this.value = "";
                    } else {
                        message.innerHTML = "";
                    }
                };
        </script>
    </body>
</html>