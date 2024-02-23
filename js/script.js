$(function() {
    $("#link-login").on("click", function(){
        $("#cont-login").show();
        $("#cont-signup").hide();
    });

    $("#link-signup").on("click", function(){
        $("#cont-signup").show();
        $("#cont-login").hide();
    });
});