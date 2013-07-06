<!DOCTYPE html>
<html>
    <head>
        <title>DeeStore Dashboard</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../Media/Lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="Media/Css/Layer.css" rel="stylesheet" />
        <script src="../Media/JavaScript/jquery/jquery.min.js"></script>
        <script src="../Media/Lib/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        // put your code here
        require '../Model/Connect.php';
        ?>
        <?php
        require './Share/Header.php';
        ?>
        <div class="container">
            <?php
            require './Share/LeftMenu.php';
            ?>
            <div class="main">
                <?php
                require './Share/TopMenu.php';
                ?>
                <div class="contents">
                    
                </div>
            </div>
        </div>
        <?php
        require './Share/Footer.php';
        ?>
    </body>
</html>
