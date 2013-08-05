<!doctype html>
<html lang="en" data-ng-app="App">
    <head>
        <title>Bản đồ - Map Shop</title>
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
                        <div class="titleCate" title="Bản đồ - Chỉ dẫn" style="margin-top: 20px">
                            <?php
                            include './About.php';
                            ?>
                        </div>
                    </div>
                    <div class="right">
                        <div class="boundDetails">
                            <h2 title="deestore shop" style="   background-color: #EFEF17;
                                color: #000000;
                                display: block;
                                font-family: sans-serif;
                                font-size: 16px;
                                font-weight: bold;
                                margin-bottom: 10px;
                                padding-left: 10px;">
                                Deestore Shop!</h2>
                            <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>                          
                            <script>
                                $(document).ready(function() {
                                    // Define the latitude and longitude positions
                                    var latitude = parseFloat('21.009843');
                                    var longitude = parseFloat('105.851659');
                                    var latlngPos = new google.maps.LatLng(latitude, longitude);
                                    // Set up options for the Google map
                                    var myOptions = {
                                        zoom: 16,
                                        center: latlngPos,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    };
                                    // Define the map
                                    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

                                    // Add the marker
                                    var marker = new google.maps.Marker({
                                        position: latlngPos,
                                        map: map,
                                        title: "DEESTORE SHOP"
                                    });
                                });

                            </script>
                            <div id="map_canvas" style="width: 100%;height: 400px"></div>        
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
