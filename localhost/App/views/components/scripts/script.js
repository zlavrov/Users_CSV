/**
 * Initializes the loading of an external script
 */


bsCustomFileInput.init()



/**
 * Limits file uploads to no more than 1 MB
 */

function check_size_file() {

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
}

check_size_file();

/**
 * Sends an ajax request to delete records from the database
 */

$('.clear_records').on('click', function () {

    $.ajax({
        type: 'POST',
        cache: false,
        dataType: 'json',
        url: '/clear',
        data: {  },
        success: function (data) {
            console.log(data.status);
        }
    });


});


/**
 * Sorts records on the results page
 */

function sortTable(n) {

    let table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable");
    switching = true;
    dir = "asc"; 
    while (switching) {
        switching = false;
        rows = table.getElementsByTagName("TR");
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch= true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount ++;      
        } else {
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}