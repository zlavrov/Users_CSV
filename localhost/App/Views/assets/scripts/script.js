function sorts(name_col) {
    let element = document.getElementById(name_col)
    let vektor = "";
    if (element.className == "asc") {
        $(`#${name_col}`).removeClass("asc").addClass("desc");
        vektor = "desc";
    } else if (element.className == "desc") {
        $(`#${name_col}`).removeClass("desc").addClass("asc");
        vektor = "asc";
    } else {
        $(`#${name_col}`).removeClass("norm").addClass("asc");
        vektor = "asc";
    }
        ajax_query(name_col, vektor);
}

const selectElement = document.querySelector('.select_name');
let vektor = "";
let name_col = "Gender"
selectElement.addEventListener('change', (event) => {

    if (event.target.value == "Male") {
        vektor = "asc";
    } else if (event.target.value == "Female") {
        vektor = "desc";
    }
    ajax_query(name_col, vektor);
});

function ajax_query(name_col, vektor) {

    $.ajax({
        type: 'POST',
        cache: false,
        dataType: 'text',
        url: '/sorts',
        data: { column: name_col, orientation: vektor},
        success: function (data) {
        document.getElementById("name_tbody").innerHTML = data;
        }
    });

}
