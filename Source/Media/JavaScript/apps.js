/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var layerSite = [];
var htmlText;
var htmlLink;
layerSite.activeMenu = function(fclass) {
    htmlText = $("." + fclass).html();
    htmlLink = $("." + fclass).attr("href");
    // set for site map
    $("a.sitemap_ChildClass").html("");
    $("a.sitemap_parentClass").html("&nbsp; → &nbsp;" + "<a href=" + htmlLink + ">" + htmlText + "</a>");

    $("ul.parent li a").removeClass("active");
    $("ul.menuLeft li a").removeClass("active");
    $('.' + fclass).addClass("active");
};

var MnParentText;
var MnParentLink;
var MnChildText;
var MnChildLink;

layerSite.activeMenuChild = function(fclass, parentClass) {
    $("ul.parent li a").removeClass("active");
    $("ul.menuLeft li a").removeClass("active");
    $("ul.menuLeft li a." + fclass).addClass("active");
    $('.' + parentClass).addClass("active");

    // set for site map
    MnParentText = $("." + parentClass).html();
    MnParentLink = $("." + parentClass).attr("href");
    MnChildText = $("." + fclass).html();
    MnChildLink = $("." + fclass).attr("href");

    $("a.sitemap_parentClass").html("&nbsp; → &nbsp;" + "<a href=" + MnParentLink + ">" + MnParentText + "</a>");
    $("a.sitemap_ChildClass").html("&nbsp; → &nbsp;" + "<a href=" + MnChildLink + ">" + MnChildText + "</a>");
};