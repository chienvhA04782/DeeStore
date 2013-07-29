<!DOCTYPE html>
<html>
    <head>
        <title>QUẢN LÝ SIZE</title>
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
                $('#liSizeManager').addClass('leftMenuActive');
                $('#example').dataTable({
                    "sScrollY": "700px",
                    "bPaginate": true,
                    "bScrollCollapse": true,
                    "bS": true,
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers"
                });
                $('#btnAddSize').click(function() {
                    window.location = "AddNewSize.php";
                });
            });

            function removeSizeById(reId, reName) {
                if (confirm('Bạn muốn xóa size: ' + reName)) {
                    deleteSizeById(reId);
                } else {
                    return false;
                }
            }

            function editSizeById(edId) {
                window.location = "EditSize.php?edId=" + edId;
            }

            function loadAllData() {
                $.ajax({url: '../../Model/BLLSizeManager.php',
                    data: {'typeRequest': 'Ranges'},
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
            function deleteSizeById(reId) {
                $.ajax({url: '../../Model/BLLSizeManager.php',
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
                        include '../../Model/BLLSizeManager.php';
                        LoadAllDataSizes();
                        ?>
                    </div>
                    <!-- Button to trigger modal -->
                    <a id="btnAddSize" class="btnAddNew">Thêm mới</a>
                </div>
            </div>
            <?php
            require '../Share/Footer.php';
            ?>
    </body>
</html>
