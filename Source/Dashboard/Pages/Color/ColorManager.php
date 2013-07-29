<!DOCTYPE html>
<html>
    <head>
        <title>QUẢN LÝ MÀU CHO SẢN PHẨM</title>
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
                $('#liColorManager').addClass('leftMenuActive');
                $('#example').dataTable({
                    "sScrollY": "700px",
                    "bPaginate": true,
                    "bScrollCollapse": true,
                    "bS": true,
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers"
                });
                $('#btnAddColor').click(function() {
                    window.location = "AddNewColor.php";
                });
            });

            function removeColorById(reId, reName) {
                if (confirm('Bạn muốn xóa mẫu màu: ' + reName)) {
                    deleteColorById(reId);
                } else {
                    return false;
                }
            }

            function editColorById(edId) {
                window.location = "EditColor.php?edId=" + edId;
            }

            function loadAllData() {
                $.ajax({url: '../../Model/BLLColorManager.php',
                    data: {'typeRequest': 'Color'},
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
            function deleteColorById(reId) {
                $.ajax({url: '../../Model/BLLColorManager.php',
                    data: {'removeId': reId},
                    type: 'POST',
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
                    <div id="contentManager" style="overflow: hidden">
                        <?php
                        include '../../Model/BLLColorManager.php';
                        LoadAllDataColor();
                        ?>
                    </div>
                    <!-- Button to trigger modal -->
                    <a id="btnAddColor" class="btnAddNew">Thêm một mẫu màu mới</a>
                </div>
            </div>
            <?php
            require '../Share/Footer.php';
            ?>
    </body>
</html>
