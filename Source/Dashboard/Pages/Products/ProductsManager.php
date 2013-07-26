<!DOCTYPE html>
<html>
    <head>
        <title>QUẢN LÝ SẢN PHẨM</title>
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
                $('#liProductManager').addClass('leftMenuActive');
                $('#example').dataTable({
                    "sScrollY": "700px",
                    "bPaginate": true,
                    "bScrollCollapse": true,
                    "bS": true,
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers"
                });
                $('.btnAddCate').click(function() {
                    window.location = "AddNewProduct.php";
                });
            });

            function removeCateById(reId, reName) {
                if (confirm('Bạn muốn xóa sản phẩm: ' + reName)) {
                    deleteCateById(reId);
                } else {
                    return false;
                }
            }

            function editProductById(edId) {
                window.location = "EditProduct.php?edId=" + edId;
            }

            function loadAllData() {
                $.ajax({url: '../../Model/BLLProductsManager.php',
                    data: {'typeRequest': 'ProductByCate'},
                    type: 'POST',
                    success: function(output) {
                        $('#contentManager').html(output);
                        $('#example').dataTable({
                            "sScrollY": "700px",
                            "bPaginate": true,
                            "bScrollCollapse": true,
                            "bS": true,
                            "bJQueryUI": true,
                            "sPaginationType": "full_numbers"
                        });
                    }, error: function(err) {
                        alert(err.responseText);
                    }
                });
            }
            function deleteCateById(reId) {
                $.ajax({url: '../../Model/BLLProductsManager.php',
                    data: {'removeId': reId},
                    type: 'POST',
                    success: function(output) {
                        loadAllData();
                    }, error: function(err) {
                        alert(err.responseText);
                    }
                });
            }

            function lockProductById(lockId, lockName, lockValue) {
                var l_ul = lockValue === 0 ? "Khóa" : "Mở Khóa";
                if (confirm('Bạn muốn ' + l_ul + ' sản phẩm: ' + lockName)) {
                    $.ajax({url: '../../Model/BLLProductsManager.php',
                        data: {'lockId': lockId, 'lockValue': lockValue},
                        type: 'POST',
                        success: function(output) {
                            loadAllData();
                        }, error: function(err) {
                            alert(err.responseText);
                        }
                    });
                } else {
                    return false;
                }
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
                    <div id="contentManager" style="overflow: hidden">
                        <?php
                        include '../../Model/BLLProductsManager.php';
                        LoadAllDataProducts();
                        ?>
                    </div>
                    <!-- Button to trigger modal -->
                    <a id="btnAddCate" href="#myModal" role="button" class="btnAddCate" data-toggle="modal">Thêm một sản phẩm mới</a>
                </div>
            </div>
            <?php
            require '../Share/Footer.php';
            ?>
    </body>
</html>
