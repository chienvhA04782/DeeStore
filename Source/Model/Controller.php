<?php

require './ProductGallery.php';
require './Product.php';
require './Categories.php';
require './Connect.php';
require './JoinProductSize.php';

$product = null;
$result = null;
$companyNameSEO = "Deestore";

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
    $str = preg_replace("/ /", '-', $str);
    return $str;
}

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $productBasicShow = 0;
    try {
        switch ($action) {
            case 'AllProduct' :
                $productBasicShow = 1;
                $product = new Product();
                $result = $product->FetchTop20Product();
                break;
            case 'ProductByCate' :
                $productBasicShow = 1;
                $product = new Product();

                if (isset($_POST['cateId']) && !empty($_POST['cateId'])) {
                    if ($_POST['parentId'] == 0) {
                        $result = $product->FetchProductByParentId($_POST['cateId']);
                    } else {
                        $result = $product->FetchProductByCategoriesId($_POST['cateId']);
                    }
                }
                break;
            case "DetailsProduct":
                $productBasicShow = 2;
                $product = new Product();
                $result = $product->FetchProductByProductId($_POST['productId']);
                break;
        }
    } catch (Exception $e) {
        echo "Controller Switch action" . $e;
    }
    switch ($productBasicShow) {
        // product show basic
        case 1:
            try {
                if ($result != null) {
                    echo "<script type='text/javascript'>";
                    $cate = new Categories();
                    $resultCate = $cate->FetchCategoriesByCateId($_POST['cateId']);
                    while ($rowCate = mysqli_fetch_array($resultCate)) {
                        // Bin title SEO
                        echo '$("head title").html("' . $rowCate['CategoriesName'] . ' - ' . $companyNameSEO . '");';
                        // Bin meta tag SEO
                        echo '$("meta[name=\'Keywords\']").attr("content","' . $rowCate['CategoriesName'] . '");';

                        echo '$("h2#titleProductForm").html(\'' . $rowCate['CategoriesName'] . '\');';
                        echo '$("h2#titleProductForm").attr("title","' . $rowCate['CategoriesName'] . '");';
                        break;
                    }
                    $count = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        echo '$(".productContent").append(\'<a href="ProductDetails.php?_id=' . $row['ProductID'] . '&cateId=' . $row['CategoriesID'] . "&name=" . khongdauController($row['ProductName']) . '" title="' . $row['ProductName'] . '"><div class="items">';
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
            } catch (Exception $e) {
                echo "switch productBasicShow case 1" . $e;
            }
            break;
        // product details
        case 2:
            try {
                if ($result != null) {
                    echo "<script type='text/javascript'>";
                    while ($rowDetails = mysqli_fetch_array($result)) {
                        // set title for page
                        echo '$("head title").html("' . $rowDetails["ProductName"] . ' - ' . $companyNameSEO . '");';
                        // Bin meta tag SEO
                        echo '$("meta[name=\'Keywords\']").attr("content","' . $rowDetails['ProductName'] . '");';

                        echo '$("h2.titleDetails").html("' . $rowDetails["ProductName"] . '");';
                        echo '$("h2.titleDetails").attr("title","' . $rowDetails['ProductName'] . '");';
                        echo '$(".description").html("' . $rowDetails["ProductDetails"] . '");';
                        echo '$(".mainImgSlide img").attr("src","' . $rowDetails["ProductPathImage"] . '");';
                        if (isset($rowDetails["ProductPriceOld"]) && !empty($rowDetails["ProductPriceOld"])) {
                            echo '$(".leftDetails .price label.oldPrice").html(" ' . number_format($rowDetails['ProductPriceOld'], 0, '.', '.') . ' VNĐ");';
                        }
                        if (isset($rowDetails["ProductPriceCurrent"]) && !empty($rowDetails["ProductPriceCurrent"])) {
                            echo '$(".leftDetails .price label.currentPrice").html(" Giá: ' . number_format($rowDetails['ProductPriceCurrent'], 0, '.', '.') . ' VNĐ");';
                        }
                        // feth product gallery
                        $ProductGallery = new ProductGallery();
                        $resultGallery = $ProductGallery->FetchProductGalleryByProductId($_POST['productId']);
                        while ($rowGallery = mysqli_fetch_array($resultGallery)) {
                            echo '$(".rightDetails .contentImageSLide .slideSmalIcon .smallImg").append(\' <img src="' . $rowGallery["ProductGalleryPath"] . '"/> \');';
                        }
                        break;
                    }
                    echo "</script>";
                }
            } catch (Exception $e) {
                echo "switch productBasicShow case 2" . $e;
            }
            break;
    }
}
?>
