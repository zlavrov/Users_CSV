<?php

use App\Controllers\Parts;
use App\Models\Results;
use App\Models\Errors;

?>
<!DOCTYPE html>
<html lang="en">
    <?php

    Parts::parts('head');

    ?>
    <body>
        <div class="px-4 my-5 text-center">
            <h1 class="display-5 fw-bold">View results</h1>
        </div>
        <div class="d-flex justify-content-center">
            <div class="mt-4">
                <a href="/import">Import data</a>
            </div>
        </div>

            <?php

            $result = Results::results("default", "default");
            
            if ($result) {
                require_once "App/Views/Parts/thead.php";
                echo $result;
            } else {
                Errors::errors("No data in database");
            }

            ?>
                    </tbody>
                </table>
            <div class="d-flex justify-content-center mt-4 mb-5">
                <button class="btn btn-primary" style="width: 10%" onclick="document.getElementById('link').click()"><i class="fa fa-download"></i>Export to CSV</button>
                <a id="link" href="/files/export/Export_to_CSV.csv" download hidden></a>
            </div>
        <script src="/App/Views/assets/scripts/script.js"></script>
    </body>
</html>