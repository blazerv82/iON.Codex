// Builds Documentation webpage via templates
$(document).ready(function(){

    disableCache();

    // Displays above content, .load would be static within content
    $.get("tiles/nav_footer/nav_top_relative.html", function(data) {
        $("#nav_top_relative").replaceWith(data);
    });

    $("#changelog11").load("tiles/changelog/aff_11.html");
    $("#changelog10").load("tiles/changelog/aff_10.html");
    $("#changelog9").load("tiles/changelog/aff9.html");
    $("#changelog8").load("tiles/changelog/aff8.html");
    $("#changelogv7").load("tiles/changelog/affv7.html");
    $("#changelogv6_1").load("tiles/changelog/affv6_1.html");
    $("#changelogv6_0").load("tiles/changelog/affv6_0.html");
    $("#changelogv5_1").load("tiles/changelog/affv5_1.html");
    $("#changelogv5").load("tiles/changelog/affv5.html");

});