$(document).ready(function(){

    disableCache();
    
    // Displays above content, .load would be static within content
    $.get("tiles/nav_footer/nav_top_relative.html", function(data) {
        $("#nav_top_relative").replaceWith(data);
    });

    $("#near").load("tiles/roadmap/near.html");
    $("#far").load("tiles/roadmap/far.html");

});