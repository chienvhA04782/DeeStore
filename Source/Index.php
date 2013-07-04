<!doctype html>
<html lang="en" data-ng-app="App">
    <head>
        <title>Wellcome to DeeShop</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php
        include './Share/MetaSEO_Lib.php';
        ?>
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
                        <div class="titleCate" title="giới thiệu" style="margin-top: 20px">
                            <?php
                            include './About.php';
                            ?>
                        </div>
                    </div>
                    <div class="right">
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
