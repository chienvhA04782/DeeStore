<!doctype html>
<html lang="en" ng-app="App">
    <head>
        <title>DeeStore Shopping Online</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="fragment" content="!" /> 
        <link href="/Media/Css/Layer.css" rel="stylesheet" />
        <script src="/Media/JavaScript/jquery/jquery.min.js"></script>
    </head>
    <body style="background-color: #FFF" data-status="{{ status }}">
        <div id="page">
            <?php
            include './Share/Header.php';
            ?>
            <div class="bodyContent">
                <div class='Inside'>
                    <div class="left">
                        <div class="titleCate">
                            <h2>DANH MỤC</h2>
                            <ul class="menuLeft">
                            </ul>
                        </div>
                        <div class="titleCate" style="margin-top: 20px">
                            <h2 style="border-bottom: 2px solid #000">GIỚI THIỆU</h2>
                            <span style="  color: #797879;
                                  display: block;
                                  font-size: 12px;
                                  line-height: 20px;
                                  padding: 5px;">
                                Thông tin vê cửa hàng của chúng tôi 
                                các bạn có thể tham thảo tại đây: Bao gồm địa chỉ và thông tin.
                                xin lưu ý đây là dữ liệu test trong qua trình xây dựng chương trình. Deestore Store
                            </span>
                        </div>
                    </div>
                    <div class="right">
                        <div ng-view>  
                        </div>
                    </div>
                </div>
            </div>
            <script src="/Media/JavaScript/angular/angular.min.js"></script>
            <script src="/Media/JavaScript/application.js"></script>
            <?php
            include './Share/Footer.php';
            include './Share/MasterInclude.php';
            ?>
        </div>
        <?php
        $cate = new Categories();
        $result = $cate->feFetchCategoriesParent();
        // Bin Menu Top
        echo "<script type='text/javascript'>";
        while ($row = mysqli_fetch_array($result)) {
            echo "$('ul.parent').append('<li><a href=\'#/Product/" .
            $row['CategoriesID'] . "/" . $row['CategoriesParentID'] . "/" . khongdau($row['CategoriesName']) . "\'>" .
            $row['CategoriesName'] . "</a></li>');";
        }
        echo "</script>";

        $menuLeftParent = $cate->feFetchCategoriesParent();
        // Bin Menu Left
        echo "<script type='text/javascript'>";
        while ($row = mysqli_fetch_array($menuLeftParent)) {
            echo "$('ul.menuLeft').append('<li class=\'prl" . $row['CategoriesID'] . "\'><a href=\'#/Product/" .
            $row['CategoriesID'] . "/" . $row['CategoriesParentID'] . "/" . khongdau($row['CategoriesName']) . "\'>" .
            $row['CategoriesName'] . "</a></li>');";
            // Bin Menu Left child grade I only
            $resultChild = $cate->feFetchtchCategoriesChildByParent($row['CategoriesID']);

            echo "var ul = document.createElement('ul');";
            echo "$(ul).appendTo('ul.menuLeft li.prl" . $row['CategoriesID'] . "');";
            while ($rows = mysqli_fetch_array($resultChild)) {
                echo "$(ul).append('<li class=\'prl" . $rows['CategoriesID'] . "\'><a href=\'#/Product/" .
                $rows['CategoriesID'] . "/" . $rows['CategoriesParentID'] . "/" . khongdau($rows['CategoriesName']) . "\'>" .
                $rows['CategoriesName'] . "</a></li>');";
            }
        }
        echo "</script>";

        // Load product"
        $cateId = $_GET["cate"];
        if ($cateId == null) {
            // if cate null then load all product
            $product = new Product();
            $result = $product->feFetchTop20Product();

            echo "<script type='text/javascript'>";
            while ($row = mysqli_fetch_array($result)) {
                echo '$(".productContent").append(\'<div class="items"><div class="sizeH"><label>SIZE: X | XL | 1 | 2A</label></div><div class="opImage"><div class="salepercent"><span>-12</span></div><img src="Media/Upload/Product/natural-project-7386-01857-1-catalog.jpg"></div><div><label class="opnameProduct">' . $row['ProductName'] . '</label><label class="opDescription">Description</label><label class="opOldPrice">600.000 VNĐ</label><label class="opCurrentPrice">450.000 VNĐ</label><label class="deestoreKy">DEESTORE</label></div></div>\');';
            }
            echo "</script>";
        } else {
            // load product with categories
        }
        ?>
    </body>
</html>
