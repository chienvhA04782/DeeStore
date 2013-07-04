<!doctype html>
<html lang="en" data-ng-app="App">
    <head>
        <title>Wellcome to DeeShop</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="fragment" content="!" /> 
        <meta name="Keywords" content="Dee Shop - Chuyên bán buôn, bán lẻ hàng VNXK. Mẫu mã đa dạng phong phú, cập nhật thường xuyên">
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
    <style>
        body{
            background-color: #FFF
        }
    </style>
    <?php
    include './Share/MasterInclude.php';
    ?>
    <body data-status="{{ status }}">
        <!--        <marquee behavior="scroll" direction="left" scrollamount="10"
                         style="background-color: #dc2606;
                         font-weight: bold;position:fixed;font-size: 16px;
                         color:#fff; display: block; z-index: 90000; top: 40%">Website đang trong quá trình xây dựng bởi ACN</marquee>-->
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
                                <?php
                                $cate = new Categories();
                                $menuLeftParent = $cate->FetchCategoriesParent();
                                while ($row = mysqli_fetch_array($menuLeftParent)) {
                                    echo "<li class='prl" . $row['CategoriesID'] . "'><a class='prl" . $row['CategoriesID'] . "' title='" . $row['CategoriesName'] . "' href='#!/Product/" .
                                    $row['CategoriesID'] . "/" . $row['CategoriesParentID'] . "/" . khongdau($row['CategoriesName']) . "'>" .
                                    $row['CategoriesName'] . "</a>";
                                    // Bin Menu Left child grade I only
                                    $resultChild = $cate->FetchtchCategoriesChildByParent($row['CategoriesID']);

                                    echo "<ul>";
                                    while ($rows = mysqli_fetch_array($resultChild)) {
                                        echo "<li class='prl" . $rows['CategoriesID'] . "'><a class='prl" . $rows['CategoriesID'] . "' title='" . $rows['CategoriesName'] . "' href='#!/Product/" .
                                        $rows['CategoriesID'] . "/" . $rows['CategoriesParentID'] . "/" . khongdau($rows['CategoriesName']) . "'>" .
                                        $rows['CategoriesName'] . "</a></li>";

                                        echo "<script type='text/javascript'>";
                                        // Bin event active menu left
                                        echo '$("a.prl' . $rows['CategoriesID'] . '").click(function(){';
                                        echo '$(".menuLeft li a").css("color","#404040");';
                                        echo '$(this).css("color","#dc2606");';
                                        echo '});';

                                        echo "</script>";
                                    }
                                    echo "</ul>";
                                    echo "</li>";

                                    echo "<script type='text/javascript'>";
                                    echo '$("a.prl' . $row['CategoriesID'] . '").click(function(){';
                                    echo '$(".menuLeft li a").css("color","#404040");';
                                    echo '$(this).css("color","#dc2606");';
                                    echo '});';
                                    echo "</script>";
                                }
                                ?>
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
            <?php
            include './Share/Footer.php';
            ?>
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
    </body>
</html>
