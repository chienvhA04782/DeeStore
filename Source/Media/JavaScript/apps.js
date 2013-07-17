/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var layerSite = [];
layerSite.activeMenu = function(fclass) {
    // set for site map
    $("a.sitemap_ChildClass").html("");
    $("a.sitemap_parentClass").html("&nbsp; → &nbsp;" + $("."  + fclass).html());
    
    $("ul.parent li a").removeClass("active");
    $("ul.menuLeft li a").removeClass("active");
    $('.' + fclass).addClass("active");
};
layerSite.activeMenuChild = function(fclass, parentClass) {
    $("ul.parent li a").removeClass("active");
    $("ul.menuLeft li a").removeClass("active");
    $("ul.menuLeft li a." + fclass).addClass("active");
    $('.' + parentClass).addClass("active");
    
    // set for site map
    $("a.sitemap_parentClass").html("&nbsp; → &nbsp;" + $("."  + parentClass).html());
    $("a.sitemap_ChildClass").html("&nbsp; → &nbsp;" + $("." + fclass).html());
};