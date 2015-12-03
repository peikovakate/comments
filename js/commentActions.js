

function deleteComment(id){
    var idToDelete;
    if (id=="Delete all"){
        idToDelete = "table";
    }else{
        idToDelete = "tr"+id;
    }
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById(idToDelete).innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("POST", "/Model/deleteComment.php?arg="+id, true);
    xhttp.send();
}
function addComm(){
    var msg =  $("#postComment").serialize();
    $.ajax({
        type: 'POST',
        url: '../Model/addComment.php',
        data: msg,
        success: function(data){
            data = '<tr id="tr0"></tr>' + data;
            $("#tr0").replaceWith(data);

        }

    })
    return false;
}