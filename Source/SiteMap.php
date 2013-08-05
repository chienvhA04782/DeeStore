<!doctype html>
<html lang="en" data-ng-app="App">
    <head>
        <title>Bản đồ WebSite - Site Map</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php
        include './Share/MetaSEO_Lib.php';
        ?>
        <style>
            .sitemap-style {
                margin-left: 10px;
            }
            .sitemap-style ul li{
                list-style-type: none;
            }
            .sitemap-style ul li a{
                display: inline-block;
                background-color: #EFEF17;
                color: #000;
                font-size: 13px;
                font-weight: bold;
                padding-top: 2px;
                padding-bottom: 2px;
                padding-right: 5px;
                padding-left: 5px;
                margin-top: 5px;
                font-family: sans-serif;
            }
            .sitemap-style ul li a:hover{
                color: #dc2606;
            }
        </style>
    </head>
    <style> body{background-color: #FFF} </style>
    <?php
    include './Share/MasterInclude.php';
    ?>
    <body data-status="{{ status }}">
        <div id="page">
            <?php
            include './Share/Header.php';
            ?>
            <div class="bodyContent">
                <div class='Inside'>
                    <div class="left">
                        <div class="titleCate">
                            <h2 style="color: #dc2606">DEESTORE SHOP</h2>
                            <?php
                            include './Share/LeftMenu.php';
                            ?>
                        </div>
                        <div class="titleCate" title="Bản đồ - Chỉ dẫn" style="margin-top: 20px">
                            <?php
                            include './About.php';
                            ?>
                        </div>
                    </div>
                    <div class="right">
                        <div class="boundDetails">
                            <h2 style="font-size: 20px; font-weight: normal;display: block; padding-bottom: 5px; border-bottom: 1px solid #d1d0d1">DEESTORE SITEMAP</h2>
                            <div class="sitemap-style">
                                <ul>
                                    <li>
                                        <a hef="#!/Home">  →  Trang Chủ</a>
                                    </li>
                                     <li>
                                        <a hef="#search">  →  Tìm Kiếm</a>
                                    </li>
                                     <li>
                                        <a href="#!/Product">  →  Sản Phẩm</a>
                                    </li>
                                     <li>
                                        <a href="/Contact.php">  →  Liên Hệ & Đặt Hàng</a>
                                    </li>
                                     <li>
                                        <a href="/Map.php">  →  Site Map</a>
                                    </li>
                                </ul>
                            </div>                           
                        </div>
                        <div ng-view>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include './Share/Footer.php';
            ?>
        </div>
    </body>
</html>
