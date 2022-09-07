<?php

namespace App\views\inclusion;

class Thead {

        /**
     * Returns the title of the result table
     */

    public static function thead() {

        return '<table id="myTable" class="table mt-4"><thead><tr><th onclick="sortTable(0)" scope="col">UID</th><th onclick="sortTable(1)" scope="col">Name</th><th onclick="sortTable(2)" scope="col">Age</th><th onclick="sortTable(3)" scope="col">Email</th><th onclick="sortTable(4)" scope="col">Phone</th><th scope="col"><select onchange="sortTable(5)"><option selected disabled>Gender</option><option>Male</option><option>Female</option></select></th></tr></thead><tbody>';
    }
}

?>