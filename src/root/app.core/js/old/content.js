$(document).ready(function(){

    // Remove caching, auto reload
    disableCache();

    // Displays above content, .load would be static within content
    $.get("tiles/nav_footer/nav_top_relative.html", function(data) {
        $("#nav_top_relative").replaceWith(data);
    });

});