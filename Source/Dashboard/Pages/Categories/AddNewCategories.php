<html>
    <head>
        <title>THÊM MỚI DANH MỤC</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../../Media/Css/Layer.css" type="text/css" rel="stylesheet" />
        <link href="../../Media/Css/contents.css" type="text/css" rel="stylesheet" />
        <link href="../../Media/Lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="../../Media/JavaScript/jquery.min.js"></script>
        <script src="../../Media/Lib/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#liCategoriesManager').addClass('leftMenuActive');
                $('#fileIcon').change(function() {
                    $('#lblErrorFileIconEditCate').text("");
                    var filename = $('#fileIcon').val();
                    filename = filename.toLowerCase();
                    if ((!/\.jpg$/.test(filename)) && (!/\.png$/.test(filename))
                            && (!/\.jpeg$/.test(filename)) && (!/\.gif$/.test(filename))) {
                        $('#fileIcon').val("");
                        $('#lblErrorFileIconEditCate').text("(*)");
                    }
                });

                $('#fileBanner').change(function() {
                    $('#lblErrorFileBannerEditCate').text("");
                    var filename = $('#fileBanner').val();
                    filename = filename.toLowerCase();
                    if ((!/\.jpg$/.test(filename)) && (!/\.png$/.test(filename))
                            && (!/\.jpeg$/.test(filename)) && (!/\.gif$/.test(filename))) {
                        $('#fileBanner').val("");
                        $('#lblErrorFileBannerEditCate').text("(*)");
                    }
                });
            });
            function checkForm(){
                if($('#txtName').val() === ""){
                    $('#lblErrorNameEditCate').text("(*)");
                    return false;
                }
                return true;
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
                    <!-- Modal -->
                    <div id="divEditCate">
                        <div class="divMainEditCate">
                            <h1 class="titleAddCategories">Thêm danh mục sản phẩm</h1>
                            <div class="addEditCateContent">
                                <form action="../../Model/BLLAddCategories.php" method="POST" enctype="multipart/form-data">
                                    <table>
                                        <tr>
                                            <td>Chọn danh mục cha:</td>
                                            <td>
                                                <select id="cbxParrent" name="cbxParrent" style="width: 200px">
                                                    <?php
                                                    include '../../Model/BLLAddCategories.php';
                                                    GetAllParent();
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tên danh mục:</td>
                                            <td>
                                                <input id="txtName" type="text" style="width: 200px;" placeholder="Nhập tên danh mục" name="txtName" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Vị trí hiển thị:</td>
                                            <td>
                                                <input id="txtOrder" type="text" style="width: 200px;" title="Số càng nhỏ vị trí xuất hiện càng cao" placeholder="Nhập vị trí hiển thị" name="txtOrder" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Logo danh mục:</td>
                                            <td>
                                                <input id="fileIcon" name="fileIcon" type="file" style="width: 200px">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Banner danh mục:</td>
                                            <td>
                                                <input id="fileBanner" name="fileBanner" type="file" style="width: 200px">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Trạng thái banner:</td>
                                            <td><input class="checkboxCss" id="cbBannerStatus" name="cbBannerStatus" type="checkbox" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input class="btnSubmit" onclick="return checkForm();" type="submit" value="Thêm mới" />
                                            </td>
                                        </tr>
                                    </table>
                                </form>
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