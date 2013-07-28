<!DOCTYPE html>
<html>
    <head>
        <title>THÊM MỚI THƯƠNG HIỆU</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../../Media/Css/Layer.css" type="text/css" rel="stylesheet" />
        <link href="../../Media/Css/contents.css" type="text/css" rel="stylesheet" />
        <script src="../../Media/JavaScript/jquery.min.js" type="text/javascript"></script>
        <script src="../../Media/Lib/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#liBrandManager').addClass('leftMenuActive');
            });
            
            function validateForm() {
                if ($("#txtBrandName").val() === "") {
                    $("#txtBrandName").css({"border": "1px solid red", "width": "203px"});
                    $("#txtBrandName").focus();
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
                        <h1 class="titleAddAndEdit">Thêm mới một thương hiệu</h1>
                        <div class="AddAndEditContent">
                            <form action="../../Model/BLLAddBrand.php" method="POST" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td>Tên thương hiệu:</td>
                                        <td>
                                            <input id="txtBrandName" name="txtBrandName" placeholder="Nhập tên thương hiệu" type="text" style="width: 200px">
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
