<html>
    <head>
        <title>CATEGORIES</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../../Media/Css/Layer.css" type="text/css" rel="stylesheet" />
        <link href="../../Media/Css/Categories.css" type="text/css" rel="stylesheet" />
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
            function checkForm() {
                if ($('#txtName').val() === "") {
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
                            <?php
                            include '../../Model/BLLEditCategories.php';
                            GetAndFillDataIntoForm();
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