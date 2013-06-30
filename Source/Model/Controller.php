<?php

require './Product.php';
require './Categories.php';
require './Connect.php';

$product = null;
$result = null;

function khongdauController($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|� �|ặ|ẳ|ẵ|ắ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|� �|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|� �|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|� �|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = preg_replace("/ /", '_', $str);
    return $str;
}

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'AllProduct' :
            $product = new Product();
            $result = $product->feFetchTop20Product();
            break;
        case 'ProductByCate' :
            $product = new Product();
            $result = null;

            if (isset($_POST['cateId']) && !empty($_POST['cateId'])) {
                if ($_POST['parentId'] == 0) {
                    $result = $product->feFetchProductByParentId($_POST['cateId']);
                } else {
                    $result = $product->feFetchProductByCategoriesId($_POST['cateId']);
                }
            }
            break;
    }
    if ($result != null) {
        echo "<script type='text/javascript'>";
        $cate = new Categories();
        $resultCate = $cate->feFetchCategoriesByCateId($_POST['cateId']);
        while ($rowCate = mysqli_fetch_array($resultCate)) {
            // Bin title SEO
            echo '$("head title").html("' . $rowCate['CategoriesName'] . ' - Deestore");';

            // Bin meta tag SEO
            echo '$("meta[name=\'Keywords\']").attr("content","' . $rowCate['CategoriesName'] . '");';

            echo '$("h2#titleProductForm").html(\'' . $rowCate['CategoriesName'] . '\');';
            echo '$("h2#titleProductForm").attr("title","' . $rowCate['CategoriesName'] . '");';
            break;
        }
        $count = 0;
        while ($row = mysqli_fetch_array($result)) {
            echo '$(".productContent").append(\'<a href="#!/Product/Details/' . $row['ProductID'] . '/' . $row['CategoriesID'] . "/" . khongdauController($row['ProductName']) . '" title="' . $row['ProductName'] . '"><div class="items">';
            echo '<div class="sizeH"><label><span style="color:#000">SIZE:</span>';
            echo '<span>X | XL | 1 | 2A</span></label>';
            echo '</div><div class="opImage">';
            if (isset($row['ProductPriceOld']) && !empty($row['ProductPriceOld']) && isset($row['ProductPriceCurrent']) && !empty($row['ProductPriceCurrent'])) {
                $percent = ((intval($row['ProductPriceCurrent']) - intval($row['ProductPriceOld'])) / intval($row['ProductPriceOld'])) * 100;
                echo '<div class="salepercent"><span>' . round($percent) . '</span></div>';
            }
            echo '<img title="' . $row['ProductName'] . '" src="' . $row['ProductPathImage'] . '"></div>';
            echo '<div><label class="opnameProduct" title="' . $row['ProductName'] . '">' . $row['ProductName'] . '</label>';
            echo '<label class="opDescription">' . $row['ProductDescription'] . '</label>';
            // PRICE OLD
            if (isset($row['ProductPriceOld']) && !empty($row['ProductPriceOld'])) {
                echo '<label class="opOldPrice">' . number_format($row['ProductPriceOld'], 0, '.', '.') . ' VNĐ</label>';
            }
            // PRICE CURRENT
            if (isset($row['ProductPriceCurrent']) && !empty($row['ProductPriceCurrent'])) {
                echo '<label class="opCurrentPrice">' . number_format($row['ProductPriceCurrent'], 0, '.', '.') . ' VNĐ</label>';
            }
            echo '<label class="deestoreKy">DEESTORE</label></div></div></a>\');';
            $count++;
        }
        // Total Number Items
        echo '$("span#totalNumberProduct").html(\'( ' . $count . ' Items)\');';
        echo "</script>";
    }
}
?>
