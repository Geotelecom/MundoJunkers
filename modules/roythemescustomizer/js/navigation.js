$(document).ready(function(){

    $(".tab-pane:first").addClass("active");
    $(".ulnav li:first").addClass("active");

    $("#sidenav li a").click(function(evt){

        $("#sidenav li").removeClass("active");
        $(this).parent().addClass("active");

        var clicked_group = $(this).attr("href");

        $(".tab-pane").hide();

        $(clicked_group).fadeIn("fast");
        return false;

    });

});