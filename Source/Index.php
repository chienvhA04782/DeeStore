<!doctype html>
<html lang="en" data-ng-app="App">
    <head>
        <title>DeeStore Shopping Online</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="fragment" content="!" /> 

        <meta name="robots" content="INDEX,FOLLOW,ALL" />
        <meta name="language" content="Vietnamese,English" />
        <meta name="author" content="Deestore.vn" />
        <meta name="Keywords" content="áo sơ mi, áo phông, quần jean, áo khoác, deestore">
        <meta name="copyright" content="Copyright (C) 2010-2013 Deestore.com" />
        <meta name="revisit-after" content="1 day" />
        <meta name="document-rating" content="General" />
        <meta name="document-distribution" content="Global" />
        <meta name="distribution" content="Global" />
        <meta name="area" content="Shop Online" />
        <meta name="placename" content="vietnam" />
        <meta name="resource-type" content="Document" />
        <meta name="owner" content="Deestore.vn" />
        <meta name="classification" content="quan ao, ao somi, ao khoac, ao phong,
              quan soc, quan jean, quan nam, deestore,quần áo, áo sơmi, áo khoác,áo phông,quần sooc, quần jean, quần bò,quần nam , Vietnam" />
        <meta name="rating" content="All" />

        <link href="/Media/Css/Layer.css" rel="stylesheet" />
        <script src="/Media/JavaScript/jquery/jquery.min.js"></script>

        <!--Share this-->
        <script type="text/javascript">var switchTo5x = true;</script>
        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script type="text/javascript">stLight.options({publisher: "30414ba1-6d1c-4993-b683-2654b7e5b3d6", doNotHash: true, doNotCopy: false, hashAddressBar: false});</script>
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
                            <h2 style="color: #dc2606">DEESTORE SHOP</h2>
                            <ul class="menuLeft">
                            </ul>
                        </div>
                        <div class="titleCate" style="margin-top: 20px">
                            <h2>GIỚI THIỆU</h2>
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
            <script src="/Media/JavaScript/angulartics.js"></script>
            <script src="/Media/JavaScript/angulartics-ga.js"></script>
            <script>
                (function(i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function() {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                            m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m)
                })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                ga('create', 'UA-10255892-8', 'luisfarzati.github.io');
                ga('send', 'pageview'); // <-- DELETE THIS LINE!
            </script>

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
            echo "$('ul.parent').append('<li><a title=\'" . $row['CategoriesName'] . "\' href=\'#!/Product/" .
            $row['CategoriesID'] . "/" . $row['CategoriesParentID'] . "/" . khongdau($row['CategoriesName']) . "\'>" .
            $row['CategoriesName'] . "</a></li>');";
        }
        echo "</script>";

        $menuLeftParent = $cate->feFetchCategoriesParent();
        // Bin Menu Left
        echo "<script type='text/javascript'>";
        while ($row = mysqli_fetch_array($menuLeftParent)) {
            echo "$('ul.menuLeft').append('<li class=\'prl" . $row['CategoriesID'] . "\'><a title=\'" . $row['CategoriesName'] . "\' href=\'#!/Product/" .
            $row['CategoriesID'] . "/" . $row['CategoriesParentID'] . "/" . khongdau($row['CategoriesName']) . "\'>" .
            $row['CategoriesName'] . "</a></li>');";
            // Bin Menu Left child grade I only
            $resultChild = $cate->feFetchtchCategoriesChildByParent($row['CategoriesID']);

            echo "var ul = document.createElement('ul');";
            echo "$(ul).appendTo('ul.menuLeft li.prl" . $row['CategoriesID'] . "');";
            while ($rows = mysqli_fetch_array($resultChild)) {
                echo "$(ul).append('<li class=\'prl" . $rows['CategoriesID'] . "\'><a title=\'" . $rows['CategoriesName'] . "\' href=\'#!/Product/" .
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
