<?php

include 'Connect.php';
include 'DALCategories.php';
include 'DALProducts.php';
include 'SimpleXml.php';
include 'DALBrands.php';
include 'DALRangePrice.php';
include 'DALGallery.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'SimpleImage.php';
    $prod = new DALProducts();
    $Id = $prod->GetProductCurrentIdBigest() + 1;
    $CateId = $_POST['cbxCategories'];
    $prodName = $_POST['txtName'];
    $BrandId = $_POST['cbxBrand'];
    $RangePriceId = $_POST['cbxRangePrice'];
    $PriceOld = $_POST['txtPriceOld'];
    $PriceSale = $_POST['txtPriceSale'];
    $KeyWord = $_POST['txtKeyWord'];
    $Descript = $_POST['txtEditor'];
    $IconPath = "";

    if ($_FILES['fileIcon']['size'] > 0) {
//Create path save file and name file
        $IconPath = "Icon_" . time() . "." . pathinfo($_FILES['fileIcon']['name'], PATHINFO_EXTENSION);
//save file
        move_uploaded_file($_FILES['fileIcon']['tmp_name'], "../Media/Images/Products/" . $IconPath);
//Get size image from file properties.xml
        $simpleXml = new SimpleXml();
        $input = array("widthIconProduct", "heightIconProduct");
        $rs = $simpleXml->getAttribute($input);
//resize image
        $image = new SimpleImage();
        $image->load("../Media/Images/Products/" . $IconPath);
        $image->resize($rs[0], $rs[1]);
        $image->save("../Media/Images/Products/" . $IconPath);
    }
    $result = $prod->AddNewProduct($Id, $BrandId, $RangePriceId, $CateId, 1, $prodName, $PriceOld, $PriceSale, $KeyWord, $Descript, 1, $IconPath, '');
    if ($result) {
        uploadImageSlide($Id);
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Products/ProductsManager.php">';
    } else {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Products/AddNewProduct.php?error=true">';
    }
}

function uploadImageSlide($Id) {
    $nuber_Upload = count($_FILES["fileSlide"]["name"]);
    $imagePath = "../Media/Images/Products/Slide_" . time();
    for ($i = 0; $i < $nuber_Upload; $i++) {
        if ($_FILES["fileSlide"]["size"][$i] > 0) {
            $fullPath = $imagePath . "_" . $i . "." . pathinfo($_FILES['fileSlide']['name'][$i], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["fileSlide"]["tmp_name"][$i], $fullPath);

            $simpleXml = new SimpleXml();
            $input = array("widthSlideProduct", "heightSlideProduct");
            $rs = $simpleXml->getAttribute($input);
            //resize image
            $image = new SimpleImage();
            $image->load($fullPath);
            $image->resize($rs[0], $rs[1]);
            $image->save($fullPath);
            
            $gall = new DALGallery();
            $gall->AddNewGallery($Id, $fullPath, 'Image slide', '');
        }
    }
}

function GetAllRangePrice() {
    $rangePrice = new DALRangePrice();
    $result = $rangePrice->FetchAllRangePrice();
    while ($rs = mysqli_fetch_array($result)) {
        echo '<option value="' . $rs['ProductRangePriceID'] . '" title="' . $rs['ProductRangePriceData'] . '">' . $rs['ProductRangePriceData'] . '</option>';
    }
    echo '<option value="0" title="Khoảng Giá Khác">--Khoảng Giá Khác--</option>';
}

function GetAllCategories() {
    BuilderListParrentForDropdownlist(0, 1);
    echo '<option value="0" title="Danh Mục Gốc">--Danh Mục Sản Phẩm Khác--</option>';
}

function GetAllBrands() {
    $brand = new DALBrands();
    $result = $brand->FetchAllBrands();
    while ($rs = mysqli_fetch_array($result)) {
        echo '<option value="' . $rs['ProductBrandID'] . '" title="' . $rs['ProductBrandName'] . '">' . $rs['ProductBrandName'] . '</option>';
    }
    echo '<option value="0" title="Thương Hiệu Khác">--Thương Hiệu Khác--</option>';
}

function BuilderListParrentForDropdownlist($cateParrentId, $level) {
    try {
        $cate = new DalCategories();
        $result = $cate->FetchCategoriesFollowParent($cateParrentId);
        while ($rs = mysqli_fetch_array($result)) {
            $lv = "";
            for ($i = 0; $i < $level; $i++) {
                $lv = $lv . "--";
            }
            echo '<option value="' . $rs['CategoriesID'] . '" title="' . $rs['CategoriesName'] . '">' . $lv . ' ' . $rs['CategoriesName'] . '</option>';
            $level++;
            BuilderListParrentForDropdownlist($rs['CategoriesID'], $level);
            $level--;
        }
    } catch (Exception $e) {
        echo $e;
    }
}

?>
