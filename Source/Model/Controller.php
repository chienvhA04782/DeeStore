<?php

require './Product.php';
require './Categories.php';
require './Connect.php';

$product = null;
$result = null;

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
            echo '$("h2#titleProductForm").html(\'' . $rowCate['CategoriesName'] . '\');';
            break;
        }
        $count = 0; 
        while ($row = mysqli_fetch_array($result)) {
            echo '$(".productContent").append(\'<div class="items"><div class="sizeH"><label><span style="color:#000">SIZE:</span>';
            echo '<span>X | XL | 1 | 2A</span></label>';
            echo '</div><div class="opImage">';
            if (isset($row['ProductPriceOld']) && !empty($row['ProductPriceOld']) && isset($row['ProductPriceCurrent']) && !empty($row['ProductPriceCurrent'])) {
                $percent = ((intval($row['ProductPriceCurrent']) - intval($row['ProductPriceOld'])) / intval($row['ProductPriceOld'])) * 100;
                echo '<div class="salepercent"><span>' . round($percent) . '</span></div>';
            }
            echo '<img src="' . $row['ProductPathImage'] . '"></div>';
            echo '<div><label class="opnameProduct">' . $row['ProductName'] . '</label>';
            echo '<label class="opDescription">' . $row['ProductDescription'] . '</label>';
            // PRICE OLD
            if (isset($row['ProductPriceOld']) && !empty($row['ProductPriceOld'])) {
                echo '<label class="opOldPrice">' . number_format($row['ProductPriceOld'], 0, '.', '.') . ' VNĐ</label>';
            }
            // PRICE CURRENT
            if (isset($row['ProductPriceCurrent']) && !empty($row['ProductPriceCurrent'])) {
                echo '<label class="opCurrentPrice">' . number_format($row['ProductPriceCurrent'], 0, '.', '.') . ' VNĐ</label>';
            }
            echo '<label class="deestoreKy">DEESTORE</label></div></div>\');';
            $count ++;
        }
        // Total Number Items
        echo '$("span#totalNumberProduct").html(\'( ' . $count . ' Items)\');';
        echo "</script>";
    }
}
?>
