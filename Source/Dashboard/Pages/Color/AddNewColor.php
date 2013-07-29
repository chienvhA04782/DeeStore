<!DOCTYPE html>
<html>
    <head>
        <title>THÊM MỚI MẪU MÀU CHO CÁC SẢN PHẨM</title>
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
                        <h1 class="titleAddAndEdit">Thêm mới một mẫu màu cho các sản phẩm</h1>
                        <div class="AddAndEditContent">
                            <form action="../../Model/BLLAddColor.php" method="POST" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td style="padding-left: 90px;">Mã màu:</td>
                                        <td>
                                            <input id="txtColor" class="color" name="txtColor" placeholder="Click để chọn màu" type="text" style="width: 200px">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input class="btnSubmit" onclick="return validateForm();" type="submit" value="Thêm mới" />
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            require '../Share/Footer.php';
            ?>
    </body>
</html>
