<!DOCTYPE html>
<html>
    <head>
        <title>CHỈNH SỬA MẪU MÀU CHO CÁC SẢN PHẨM</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../../Media/Css/Layer.css" type="text/css" rel="stylesheet" />
        <link href="../../Media/Css/contents.css" type="text/css" rel="stylesheet" />
        <script src="../../Media/JavaScript/jquery.min.js" type="text/javascript"></script>
        <script src="../../Media/Lib/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="../../Media/Lib/jscolor/jscolor.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#liColorManager').addClass('leftMenuActive');
            });

            function validateForm() {
                if ($("#txtColor").val() === "") {
                    $("#txtColor").css({"border": "1px solid red", "width": "203px"});
                    $("#txtColor").focus();
                    return false;
                }
                return true;
            }

        </script>
    </head>
    <body id="bodyIdManager">
        <?php
        require '../Share/Header.php';
        ?>
        <div class="divcontainers">
            <?php
            require '../Share/LeftMenu.php';
            ?>
            <div class="main">
                <?php
                require '../Share/TopMenu.php';
                ?>
                <div class="contents">
                    <div class="divMainAddAndEdit">
                        <?php
                        include '../../Model/BLLEditColor.php';
                        LoadDataForEdit();
                        ?>
                    </div>
                </div>
            </div>
            <?php
            require '../Share/Footer.php';
            ?>
    </body>
</html>
