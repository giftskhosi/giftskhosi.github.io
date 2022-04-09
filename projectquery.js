$(function(){
    $("#form").hide();
});

$(document).ready(function(){
    $("#button").click(function(){
        $("#form").toggle(1000);
        $(".display").toggle(1000);
    });
})