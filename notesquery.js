$(function(){
    $("#view").hide();
});

$(document).ready(function(){
    $(".btn-btn").click(function(){
        $("#view").toggle(1000); 
    });
})