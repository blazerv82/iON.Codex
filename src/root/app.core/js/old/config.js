$(document).ready(function(){

    // Remove caching, auto reload
    disableCache();

    // Displays above content, .load would be static within content
    $.get("tiles/nav_footer/nav_top_relative.html", function(data) {
        $("#nav_top_relative").replaceWith(data);
    });

    // Overview
    $("#rbo").load("tiles/config/rbo.html");

    // Disclaimer
    $("#disclaimer").load("tiles/config/disclaimer.html");
    
    // Version Info
    $("#version").load("tiles/config/version.html");

    $.getJSON("js/aff_info.json", function(data) {
        var items = [];
        $.each(data, function(key, val) {
          items.push(val);
        });
       
        $("#aff_info").append(items[0] + ' ' + items[1]);
    });
    
    // Download and Use
    $("#dau").load("tiles/config/dau.html");

    
});