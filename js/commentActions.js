$(document).on("click", function(){
    $(".row:gt(6)").hide();

})

function deleteComment(id) {
    var response = confirm('Are you sure?');
    if (response == true) {
        var idToDelete;
        if (id == "Delete all") {
            idToDelete = "column";
        } else {
            idToDelete = "row" + id;
        }
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById(idToDelete).innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("POST", "/Model/deleteComment.php?arg=" + id, true);
        xhttp.send();
    }
}

function addComm() {
    var msg =  $("#postComment").serialize();
    $.ajax({
        type: 'POST',
        url: '../Model/addComment.php',
        data: msg,
        success: function(data){
            data = '<div class="row" id="row0"></div>' + data;
            $("#row0").replaceWith(data);
            document.getElementById("postComment").reset();
        }

    })
    return false;
}
