<!DOCTYPE html>
<html>
    <head>
        <title>CHỈNH SỬA KHOẢNG GIÁ</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../../Media/Css/Layer.css" type="text/css" rel="stylesheet" />
        <link href="../../Media/Css/contents.css" type="text/css" rel="stylesheet" />
        <script src="../../Media/JavaScript/jquery.min.js" type="text/javascript"></script>
        <script src="../../Media/Lib/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#liRangesManager').addClass('leftMenuActive');
            });

            function validateForm() {
                if ($("#txtRangeName").val() === "") {
                    $("#txtRangeName").css({"border": "1px solid red", "width": "203px"});
                    $("#txtRangeName").focus();
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
                        include '../../Model/BLLEditRange.php';
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
