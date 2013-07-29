<!DOCTYPE html>
<html>
    <head>
        <title>THÊM MỚI KHOẢNG GIÁ</title>
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
                        <h1 class="titleAddAndEdit">Thêm mới khoảng giá</h1>
                        <div class="AddAndEditContent">
                            <form action="../../Model/BLLAddRange.php" method="POST" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td>Khoảng giá:</td>
                                        <td>
                                            <input id="txtRangeName" name="txtRangeName" placeholder="Nhập khoảng giá" type="text" style="width: 200px">
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
