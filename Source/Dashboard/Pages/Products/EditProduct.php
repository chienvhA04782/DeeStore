<!DOCTYPE html>
<html>
    <head>
        <title>QUẢN LÝ SẢN PHẨM</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../../Media/Css/Layer.css" type="text/css" rel="stylesheet" />
        <link href="../../Media/Css/contents.css" type="text/css" rel="stylesheet" />
        <script src="../../Media/JavaScript/jquery.min.js" type="text/javascript"></script>
        <script src="../../Media/Lib/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#liProductManager').addClass('leftMenuActive');
                $('#divListFileSlide').on('change', 'input[type=file]', function(e) {
                    var filename = $(this).val();
                    filename = filename.toLowerCase();
                    if ((!/\.jpg$/.test(filename)) && (!/\.png$/.test(filename))
                            && (!/\.jpeg$/.test(filename)) && (!/\.gif$/.test(filename)))
                    {
                        $(this).css({"background": "#F67C7C", "width": "100%"});
                        $(this).val("");
                    } else {
                        $(this).css({"background": "#4385F4", "width": "100%", "border": "none"});
                    }
                });

                $("#btnAddNewFile").click(function() {
                    if (checkUsingAllFile()) {
                        $("#divListFileSlide").append("<span><input name=\"fileSlide[]\" type=\"file\" style=\"width: 200px\"></span>");
                    }
                });

                CKEDITOR.replace('txtEditor', {
                    uiColor: '#9AB8F3'
                });
            });

            function checkUsingAllFile() {
                var result = true;
                $("#divListFileSlide span input").each(function() {
                    if ($(this).val().length <= 0) {
                        $(this).css({"border": "1px solid red", "width": "99%"});
                        result = false;
                    }
                });
                return result;
            }

            function validateForm() {
                var decimal = /^[-+]?[0-9]+\.?[0-9]+$/;
                var result = true;
                if ($("#txtKeyWord").val() === "") {
                    $("#txtKeyWord").css({"border": "1px solid red", "width": "203px"});
                    $("#txtKeyWord").focus();
                    result = false;
                } else {
                    $("#txtKeyWord").css({"border": "1px solid #B3B3B3"});
                }

                if ($("#txtPriceSale").val() === "") {
                    $("#txtPriceSale").css({"border": "1px solid red", "width": "203px"});
                    $("#txtPriceSale").focus();
                    result = false;
                } else {
                    var PriceOldValue = $("#txtPriceSale").val();
                    if (!decimal.test(PriceOldValue)) {
                        $("#txtPriceSale").css({"border": "1px solid red", "width": "203px"});
                        $("#txtPriceSale").focus();
                        result = false;
                    } else {
                        $("#txtPriceSale").css({"border": "1px solid #B3B3B3"});
                    }
                }

                if ($("#txtPriceOld").val() === "") {
                    $("#txtPriceOld").css({"border": "1px solid red", "width": "203px"});
                    $("#txtPriceOld").focus();
                    result = false;
                } else {
                    var PriceOldValue = $("#txtPriceOld").val();
                    if (!decimal.test(PriceOldValue)) {
                        $("#txtPriceOld").css({"border": "1px solid red", "width": "203px"});
                        $("#txtPriceOld").focus();
                        result = false;
                    } else {
                        $("#txtPriceOld").css({"border": "1px solid #B3B3B3"});
                    }
                }

                if ($("#txtName").val() === "") {
                    $("#txtName").css({"border": "1px solid red", "width": "203px"});
                    $("#txtName").focus();
                    result = false;
                } else {
                    $("#txtName").css({"border": "1px solid #B3B3B3"});
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
                        <?php
                        include '../../Model/BLLEditProduct.php';
                        LoadDataForEditProduct();
                        ?>
                    </div>
                </div>
            </div>
            <?php
            require '../Share/Footer.php';
            ?>
    </body>
</html>
