<!DOCTYPE html>
<html>
    <head>
        <title>CATEGORIES MANAGERS</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../../Media/Css/Layer.css" type="text/css" rel="stylesheet" />
        <link href="../../Media/Css/contents.css" type="text/css" rel="stylesheet" />
        <link href="../../Media/Css/jquery.dataTables.css" type="text/css" rel="stylesheet" />
        <link href="../../Media/Javascript/themes/jquery-ui-1.8.4.custom.css" type="text/css" rel="stylesheet" />
        <link href="../../Media/Css/table_jui.css" type="text/css" rel="stylesheet" />
        <script src="../../Media/JavaScript/jquery.min.js"></script>
        <script src="../../Media/Javascript/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#liCategoriesManager').addClass('leftMenuActive');
                $('#example').dataTable({
                    "sScrollY": "700px",
                    "bPaginate": true,
                    "bScrollCollapse": true,
                    "bS": true,
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers"
                });
                $('.btnAddCate').click(function() {
                    window.location = "AddNewCategories.php";
                });
            });

            function removeCateById(reId) {
                if (confirm('Bạn muốn xóa sản phẩm có Id = ' + reId)) {
                    deleteCateById(reId);
                } else {
                    return false;
                }
            }

            function editCateById(edId) {
                window.location = "editCategories.php?edId=" + edId;
            }

            function loadAllData() {
                $.ajax({url: '../../Model/BLLCategoriesManager.php',
                    data: {'typeRequest': 'ProductByCate'},
                    type: 'POST',
                    success: function(output) {
                        $('#contentCategoriesManager').html(output);
                    }, error: function(err) {
                        alert(err.responseText);
                    }
                });
            }
            function deleteCateById(reId) {
                $.ajax({url: '../../Model/BLLCategoriesManager.php',
                    data: {'reId': reId},
                    type: 'GET',
                    success: function(output) {
                        loadAllData();
                    }, error: function(err) {
                        alert(err.responseText);
                    }
                });
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
                    <?php
                    require '../../Model/BLLCategoriesManager.php';
                    ?>
                    <!-- Button to trigger modal -->
                    <a id="btnAddCate" href="#myModal" role="button" class="btnAddCate" data-toggle="modal">Thêm một danh mục mới</a>
                </div>
            </div>
            <?php
            require '../Share/Footer.php';
            ?>
    </body>
</html>
