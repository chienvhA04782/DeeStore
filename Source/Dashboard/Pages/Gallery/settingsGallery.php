<!DOCTYPE html>
<html>
    <head>
        <title>CHỈNH SỬA BỘ SƯU TẬP CHO SẢN PHẨM</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../../Media/Css/Layer.css" type="text/css" rel="stylesheet" />
        <link href="../../Media/Css/contents.css" type="text/css" rel="stylesheet" />
        <script src="../../Media/JavaScript/jquery.min.js" type="text/javascript"></script>
        <script src="../../Media/Lib/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#liGalleryManager').addClass('leftMenuActive');
                $("#divMore").click(function() {
                    if (checkUsingAllFile()) {
                        $("#tableContents").append("<tr><td><input name=\"fileSlide[]\" type=\"file\" style=\"width: 200px\"></td><td><input name=\"txtBrandName[]\" placeholder=\"Nhập tên thương hiệu\" type=\"text\" style=\"width: 200px\"></td><td><input name=\"txtGalleryLink[]\" placeholder=\"Nhập đường link cho ảnh\" type=\"text\" style=\"width: 200px\"></td></tr>");
                    }
                });
                $('#tableContents').on('change', 'input[type=file]', function(e) {
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

            });
            function checkUsingAllFile() {
                var result = true;
                $("#tableContents tr td input[type=file]").each(function() {
                    if ($(this).val().length <= 0) {
                        $(this).css({"border": "1px solid red", "width": "99%"});
                        result = false;
                    }
                });
                return result;
            }
            function removeImageInSlideProduct($SlideId) {
                if (confirm("Bạn chắc chắn rằng bạn muốn xóa hình ảnh này?")) {
                    $.ajax({url: '../../Model/BLLSettingsGallery.php',
                        data: {'removeSlideId': $SlideId},
                        type: 'POST',
                        success: function(output) {
                            $("#itemSlide_" + $SlideId).hide(500);
                        }, error: function(err) {
                            alert(err.responseText);
                        }
                    });
                }
            }

            function editImageSlideProduct($SlideId) {
                $.ajax({url: '../../Model/BLLSettingsGallery.php',
                    data: {'loadSlideId': $SlideId},
                    type: 'POST',
                    success: function(output) {
                        $("#divAddGallery").html(output);
                        window.location = "#divAddGallery";
                    }, error: function(err) {
                        alert(err.responseText);
                    }
                });
            }

            function validateFormEdit() {
                if ($("#txtGalleryName").val() === "") {
                    $("#txtGalleryName").css({"border": "1px solid red", "width": "203px"});
                    $("#txtGalleryName").focus();
                    return false;
                }
                return true;
            }

            function addNewGalleryByProductId($ProId) {
                $.ajax({url: '../../Model/BLLSettingsGallery.php',
                    data: {'newSlideId': $ProId},
                    type: 'POST',
                    success: function(output) {
                        $("#divAddGallery").html(output);
                        window.location = "#divAddGallery";
                    }, error: function(err) {
                        alert(err.responseText);
                    }
                });
            }
        </script>
    </head>
    <body>
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
                        <h1 class="titleSettings">Chỉnh sửa bộ sưu tập cho</h1>
                        <div class="divShowImageSlideContent">
                            <div style="float: left; width: 100%;">
                                <?php
                                include '../../Model/BLLSettingsGallery.php';
                                LoadAllDataWithProductId($_GET['edId']);
                                ?>
                            </div>
                            <?php
                            addNewGalleryLocation($_GET['edId']);
                            ?>
                        </div>
                        <br>
                        <div id="divAddGallery" class="AddAndEditContent">
                            <?php
                            LoadFormAddNewGallery($_GET['edId'])
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            require '../Share/Footer.php';
            ?>
    </body>
</html>
