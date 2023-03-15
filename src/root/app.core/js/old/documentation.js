// Builds Documentation webpage via templates
$(document).ready(function(){

    disableCache();

    // Displays above content, .load would be static within content
    // $.get("tiles/nav_footer/nav_documentation.html", function(data) {
    //     $("#navbar_documentation").replaceWith(data);
    // });

    // Load all Tiles based on <div> id's within page
    $("#viewport").load("tiles/documentation/viewport.html");
    $("#containers").load("tiles/documentation/containers.html");
    $("#offset").load("tiles/documentation/offset.html");
    $("#padding").load("tiles/documentation/padding.html");
    $("#margin").load("tiles/documentation/margin.html");
    $("#display").load("tiles/documentation/display.html");
    $("#themes").load("tiles/documentation/themes.html");
    $("#colors").load("tiles/documentation/colors.html");
    $("#text").load("tiles/documentation/text.html");
    $("#border").load("tiles/documentation/border.html");
    $("#round").load("tiles/documentation/round.html");
    $("#other").load("tiles/documentation/other.html");

    
    
});
