$(function(){
    $("#upload").hide();
});

$(document).ready(function(){
    $(".button").click(function(){
        $("#upload").toggle(1000); 
    });
})