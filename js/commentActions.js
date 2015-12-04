$(document).ready(function(){
    check();
})

function deleteComment(id) {
    var response = confirm('Are you sure?');
    if (response == true) {
        $.ajax({
            type: 'POST',
            url: '../Model/deleteComment.php',
            data: "arg="+id,
            success: function (data) {
                if(id=="Delete all") {
                    $("#column").empty();
                    $("#column").append(data);
                }else{
                    $("#row"+id).remove();
                }
                check();
            }
        })
    }
    return false;
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
            $("#addCommentModal").modal("hide");
            check();
        }

    })
    return false;
}

var check  = function(){
    var a = $("#column > .row").length;
    //$("#column>.row:lt(6)").show();
    //$("#column>.row:gt(5)").hide();
    if (a>5){
        ("#showLessBtn").style.display="";
    }
    }
