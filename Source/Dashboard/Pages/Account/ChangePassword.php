<!DOCTYPE html>
<html>
    <head>
        <title>THAY ĐỔI MẬT KHẨU CHO TÀI KHOẢN</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../../Media/Css/Layer.css" type="text/css" rel="stylesheet" />
        <link href="../../Media/Css/contents.css" type="text/css" rel="stylesheet" />
        <script src="../../Media/JavaScript/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            $(window).ready(function() {
                $("#txtPasswordOld").val("");
                $("#txtPasswordOld").focus();
                $("#txtPasswordNew").val("");
                $("#txtPasswordReNew").val("");
                $("#txtPasswordReNew").keyup(function() {
                    if ($("#txtPasswordReNew").val() === $("#txtPasswordNew").val()) {
                        $("#txtPasswordReNew").css({"border": "1px solid #11F00A", "width": "204px", "height": "18px"});
                    } else {
                        $("#txtPasswordReNew").css({"border": "1px solid #FA0000", "width": "204px", "height": "18px"});
                    }
                });
                $("#txtPasswordNew").keyup(function() {
                    if ($("#txtPasswordNew").val() !== "") {
                        $("#txtPasswordNew").css({"border": "1px solid #11F00A", "width": "204px", "height": "18px"});
                    } else {
                        $("#txtPasswordNew").css({"border": "1px solid #FA0000", "width": "204px", "height": "18px"});
                    }
                });
                $("#txtPasswordOld").keyup(function() {
                    if ($("#txtPasswordOld").val() !== "") {
                        $("#txtPasswordOld").css({"border": "1px solid #11F00A", "width": "204px", "height": "18px"});
                    } else {
                        $("#txtPasswordOld").css({"border": "1px solid #FA0000", "width": "204px", "height": "18px"});
                    }
                });
                
                if(getURLParameter("result") === "errorPasswordCurrent"){
                    $('#lblMessage').html("Mật khẩu nhập vào không đúng.");
                    $('#lblMessage').css({"color": "red", "text-align": "center"});
                }
                if(getURLParameter("result") === "error"){
                    $('#lblMessage').html("Cập nhật mật khẩu không thành công xin hãy thử lại.");
                    $('#lblMessage').css({"color": "red", "text-align": "center"});
                }
                if(getURLParameter("result") === "success"){
                    $('#lblMessage').html("Cập nhật mật khẩu thành công.");
                    $('#lblMessage').css({"color": "#11F00A", "text-align": "center"});
                }
            });
            function getURLParameter(name) {
                return decodeURI(
                        (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search) || [, null])[1]
                        );
            }
            function validateForm() {
                var result = true;
                if ($("#txtPasswordReNew").val() === "") {
                    $("#txtPasswordReNew").css({"border": "1px solid red", "width": "204px", "height": "18px"});
                    $("#txtPasswordReNew").focus();
                    result = false;
                }
                if ($("#txtPasswordNew").val() === "") {
                    $("#txtPasswordNew").css({"border": "1px solid red", "width": "204px", "height": "18px"});
                    $("#txtPasswordNew").focus();
                    result = false;
                } else {
                    $("#txtPasswordNew").css({"border": "1px solid #11F00A", "width": "204px", "height": "18px"});
                }
                if ($("#txtPasswordOld").val() === "") {
                    $("#txtPasswordOld").css({"border": "1px solid red", "width": "204px", "height": "18px"});
                    $("#txtPasswordOld").focus();
                    result = false;
                } else {
                    $("#txtPasswordOld").css({"border": "1px solid #11F00A", "width": "204px", "height": "18px"});
                }

                if ($("#txtPasswordReNew").val() === $("#txtPasswordNew").val()) {
                    $("#txtPasswordReNew").css({"border": "1px solid #11F00A", "width": "204px", "height": "18px"});
                } else {
                    $("#txtPasswordReNew").css({"border": "1px solid #FA0000", "width": "204px", "height": "18px"});
                    $("#txtPasswordReNew").focus();
                    result = false;
                }
                return result;
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
                        <h1 class="titleChangePassword">Thay đổi mật khẩu</h1>
                        <div class="AddAndEditContent">
                            <form action="../../Model/BLLAccountManager.php" method="POST" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td>Tài Khoản:</td>
                                        <td>
                                            <span style="color: #004159; font-family: Times New Roman; font-size: 20px; text-shadow: 0 0 30px #000000;">Administrator</span>
                                            <input id="txtId" name="txtId" type="hidden" value="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mật khẩu cũ:</td>
                                        <td>
                                            <input id="txtPasswordOld" name="txtPasswordOld" type="password" style="width: 200px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mật khẩu mới:</td>
                                        <td>
                                            <input id="txtPasswordNew" name="txtPasswordNew" type="password" style="width: 200px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Xác nhận lại mật khẩu:</td>
                                        <td>
                                            <input id="txtPasswordReNew" name="txtPasswordReNew" type="password" style="width: 200px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: center;"><label id="lblMessage"></label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input class="btnSubmit" onclick="return validateForm();" type="submit" value="Thay đổi" />
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
