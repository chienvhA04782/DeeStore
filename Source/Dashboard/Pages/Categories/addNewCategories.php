<html>
    <head>
        <title>CATEGORIES</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../../Media/Css/Layer.css" type="text/css" rel="stylesheet" />
        <link href="../../Media/Css/Categories.css" type="text/css" rel="stylesheet" />
        <link href="../../Media/Css/jquery.dataTables.css" type="text/css" rel="stylesheet" />
        <link href="../../Media/Javascript/themes/jquery-ui-1.8.4.custom.css" type="text/css" rel="stylesheet" />
        <link href="../../Media/Lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../../Media/Css/table_jui.css" type="text/css" rel="stylesheet" />
        <script src="../../Media/JavaScript/jquery.min.js"></script>
        <script src="../../Media/Lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../Media/Javascript/jquery.dataTables.js"></script>
        <script src="../../Media/Javascript/Upload/ajaxupload.3.5.js"></script>
        <script src="../../Media/Javascript/Upload/scriptCropImage.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#liCategoriesManager').addClass('leftMenuActive');
                marginLeftMyModal();
                marginLeftUploadFileImage();
                $('.backgroundPopup').click(function() {
                    $('#divPopup').hide(500);
                });
                $('#fileIcon').change(function() {
                    $('#lblErrorFileIconEditCate').text("");
                    var filename = $('#fileIcon').val();
                    filename = filename.toLowerCase();
                    if ((!/\.jpg$/.test(filename)) && (!/\.png$/.test(filename))
                            && (!/\.jpeg$/.test(filename)) && (!/\.gif$/.test(filename))) {
                        $('#fileIcon').val("");
                        $('#lblErrorFileIconEditCate').text("Chọn ảnh có định dạng (*.jpg, *.jpeg, *.png, *.gif)");
                    }
                });

                $('#fileBanner').change(function() {
                    $('#lblErrorFileBannerEditCate').text("");
                    var filename = $('#fileBanner').val();
                    filename = filename.toLowerCase();
                    if ((!/\.jpg$/.test(filename)) && (!/\.png$/.test(filename))
                            && (!/\.jpeg$/.test(filename)) && (!/\.gif$/.test(filename))) {
                        $('#fileBanner').val("");
                        $('#lblErrorFileBannerEditCate').text("Chọn ảnh có định dạng (*.jpg, *.jpeg, *.png, *.gif)");
                    }
                });

                $('#btnSubmitNewCate').click(function() {
                    var prId = $("#cbxParrent").val();
                    var name = $("#txtName").val();
                    var order = $("#txtOrder").val();
                    $.ajax({url: '../../Model/BLLAddCategories.php',
                        data: {'prId': prId, 'txtName': name, 'txtOrder': order},
                        type: 'POST',
                        success: function(data) {
                            $('body').append(data);
                            loadAllData();
                        }, error: function(err) {
                            alert(err.responseText);
                        }
                    });
                });
            });
            function displayDialogUpdateImage(name) {
                $('#divPopup').show();
                return false;
            }
            function marginLeftMyModal() {
                var width = ($('body').width() - $('#myModal').width()) / 2;
                if (width < 0) {
                    $('#myModal').css("left", "0");
                } else {
                    $('#myModal').css("left", width);
                }
            }

            function marginLeftUploadFileImage() {
                var wImage = ($('body').width() - $('#divUploadFileImage').width()) / 2;
                if (wImage < 0) {
                    $('#divUploadFileImage').css("left", "0");
                } else {
                    $('#divUploadFileImage').css("left", wImage);
                }
            }
            $(window).resize(function() {
                marginLeftMyModal();
                marginLeftUploadFileImage();
            });
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
                    <!-- Modal -->
                    <div id="divEditCate">
                        <div class="divMainEditCate">
                            <div class="editCateContent">
                                <h1 class="titleEditCategories">Thêm danh mục sản phẩm</h1>
                                <table>
                                    <tr>
                                        <td>Chọn danh mục cha:</td>
                                        <td>
                                            <select id="cbxParrent" name="cbxParrent">
                                                <?php
                                                ?>
                                                <option value="0" title="Danh Mục Gốc">Danh Mục Gốc</option>
                                                <option value="0" title="Danh Mục Gốc">Danh Mục Gốc</option>
                                                <option value="0" title="Danh Mục Gốc">Danh Mục Gốc</option>
                                            </select>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tên danh mục:</td>
                                        <td><input id="txtName" type="text" style="width: 250px;" placeholder="Nhập tên danh mục" name="cateName" /></td>
                                        <td><label id="lblErrorNameEditCate" class="error"></label></td>
                                    </tr>
                                    <tr>
                                        <td>Vị trí hiển thị:</td>
                                        <td><input id="txtOrder" type="text" style="width: 250px;" title="Số càng nhỏ vị trí xuất hiện càng cao" placeholder="Nhập vị trí hiển thị" name="cateName" /></td>
                                        <td><label id="lblErrorOrderEditCate" class="error"></label></td>
                                    </tr>
                                    <tr>
                                        <td>Logo danh mục:</td>
                                        <td><input id="fileIcon" onclick="return displayDialogUpdateImage('fileIcon');" type="file" name="fileIcon"></td>
                                        <td><label id="lblErrorFileIconEditCate" class="error"></label></td>
                                    </tr>
                                    <tr>
                                        <td>Banner danh mục:</td>
                                        <td><input id="fileBanner" onclick="return displayDialogUpdateImage('fileBanner');" type="file" name="fileBanner"></td>
                                        <td><label id="lblErrorFileBannerEditCate" class="error"></label></td>
                                    </tr>
                                    <tr>
                                        <td>Trạng thái banner:</td>
                                        <td><input id="cbBannerStatus" type="checkbox" /></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">

                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                            <button id="btnSubmitNewCate" class="btn btn-primary">Thêm mới danh mục</button>
                        </div>
                    </div>
                    <div id="divPopup">
                        <div class="backgroundPopup"></div>
                        <div id="divUploadFileImage">
                            <div class="divContent">
                                <div class="maindivs">
                                    <div class="innerbgs">
                                        <div id="pUpload" class="styleall" style=" cursor:pointer;">
                                            <span style=" cursor:pointer; font-family:Verdana, Geneva, sans-serif; font-size:9px;">
                                                <span class="lblSelectUpload" >Chọn ảnh từ máy tính cá nhân
                                                </span>
                                            </span>
                                        </div>
                                        <span id="mestatus" ></span>
                                        <div id="profile_pic">
                                            <li class="success">
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            require '../Share/Footer.php';
            ?>
    </body>
</html>