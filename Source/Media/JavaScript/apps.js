/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var layerSite = [];
layerSite.activeMenu = function(fclass) {
    $("ul.parent li a").removeClass("active");
    $("ul.menuLeft li a").removeClass("active");
    $('.' + fclass).addClass("active");
};
layerSite.activeMenuChild = function(fclass, parentClass) {
    $("ul.parent li a").removeClass("active");
    $("ul.menuLeft li a").removeClass("active");
    $("ul.menuLeft li a." + fclass).addClass("active");
    $('.' + parentClass).addClass("active");
};