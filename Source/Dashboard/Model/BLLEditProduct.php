<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BLLEditProduct
 *
 * @author vanthuc5433
 */
include 'Connect.php';
include 'DALCategories.php';
include 'DALProducts.php';
include 'SimpleXml.php';
include 'DALBrands.php';
include 'DALRangePrice.php';
include 'DALGallery.php';
include 'DALSizes.php';
include 'DALColor.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'SimpleImage.php';
    $prod = new DALProducts();
    $Id = $_POST['txtId'];
    $CateId = $_POST['cbxCategories'];
    $prodName = $_POST['txtName'];
    $BrandId = $_POST['cbxBrand'];
    $RangePriceId = $_POST['cbxRangePrice'];
    $PriceOld = $_POST['txtPriceOld'];
    $PriceSale = $_POST['txtPriceSale'];
    $KeyWord = $_POST['txtKeyWord'];
    $Descript = $_POST['txtDescript'];
    $Details = $_POST['txtEditor'];
    $IconPath = "";
    if ($_FILES['fileIcon']['size'] > 0) {
//Create path save file and name file
        $IconPath = "Icon_" . time() . "." . pathinfo($_FILES['fileIcon']['name'], PATHINFO_EXTENSION);
        //Remove image old in database
        $rsIcon = $prod->FetchProductById($Id);
        while ($r = mysqli_fetch_array($rsIcon)) {
            if (file_exists('../Media/Images/Products/' . $r['ProductPathImage'])) {
                unlink("../Media/Images/Products/" . $r['ProductPathImage']);
            }
        }
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
    $result = $prod->EditProductById($Id, $BrandId, $RangePriceId, $CateId, 1, $prodName, $PriceSale, $PriceOld, $KeyWord, $Descript, $IconPath, $Details);
    saveSizeForProduct($Id);
    saveColorForProduct($Id);
    if ($result) {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Products/ProductsManager.php">';
    } else {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Products/EditProduct.php?edId=' . $Id . '&&Error=true">';
    }
}

function saveSizeForProduct($proId) {
    $size = new DALSizes();
    $size->removeSizeForByProductId($proId);
    $number_Size = count($_POST['cbxSize']);
    for ($i = 0; $i < $number_Size; $i++) {
        if (isset($_POST['cbxSize'][$i])) {
            $size->ProductJoinSize($proId, $_POST['cbxSize'][$i]);
        }
    }
}

function saveColorForProduct($proId) {
    $number_Size = count($_POST['cbxColor']);
    $color = new DALColor();
    $color->RemoveColorByProductId($proId);
    for ($i = 0; $i < $number_Size; $i++) {
        if (isset($_POST['cbxColor'][$i])) {
            $color->ProductJoinColor($proId, $_POST['cbxColor'][$i]);
        }
    }
}

function LoadDataForEditProduct() {
    if (!empty($_GET['edId'])) {
        $pro = new DALProducts();
        $result = $pro->FetchProductById($_GET['edId']);
        $IsResult = false;
        while ($rs = mysqli_fetch_array($result)) {
            $IsResult = true;
            echo '<h1 class="titleEditCategories">Chỉnh sửa sản phẩm: ' . $rs['ProductName'] . '</h1>';
            echo '<div class="AddAndEditContent">';
            echo '<form action="../../Model/BLLEditProduct.php" method="POST" enctype="multipart/form-data">';
            echo '<input name="txtId" type="hidden" value="' . $_GET['edId'] . '" />';
            echo '<table><tr><td>Chọn danh mục:</td><td><select id="cbxParrent" name="cbxCategories" style="width: 205px">';
            GetAllCategories($rs['CategoriesID']);
            echo '</select></td></tr>';
            echo '<tr><td>Tên sản phẩm:</td>';
            echo '<td><input id="txtName" type="text" style="width: 200px;" placeholder="Nhập tên sản phẩm" name="txtName" value="' . $rs['ProductName'] . '" /></td></tr>';
            echo '<tr><td>Thương hiệu:</td>';
            echo '<td><select id="cbxBrand" name="cbxBrand" style="width: 205px" title="Chọn thương hiệu">';
            GetAllBrands($rs['ProductBrandID']);
            echo '</select></td></tr>';
            echo '<tr><td>Khoảng giá:</td><td><select id="cbxRangePrice" name="cbxRangePrice" style="width: 205px" title="Chọn khoảng giá">';
            GetAllRangePrice($rs['ProductRangePriceID']);
            echo '</select></td></tr>';
            echo '<tr><td>Giá gốc:</td><td><input id="txtPriceOld" name="txtPriceOld" placeholder="Nhập giá gốc cho sản phẩm" value="' . $rs['ProductPriceOld'] . '" type="text" style="width: 200px"></td></tr>';
            echo '<tr><td>Giá bán:</td><td><input id="txtPriceSale" name="txtPriceSale" placeholder="Nhập giá bán đã giảm giá" value="' . $rs['ProductPriceCurrent'] . '" type="text" style="width: 200px"></td></tr>';
            echo '<tr><td>Kích cỡ:</td><td><div style="width: 207px">';
            LoadAllSize($_GET['edId']);
            echo '</div></td></tr>';
            echo '<tr><td>Màu sắc:</td><td><div style="width: 208px">';
            LoadAllColor($_GET['edId']);
            echo '</div></td></tr>';
            echo '<tr><td>Hình ảnh đại diện:</td><td><input id="fileIcon" name="fileIcon" type="file" style="width: 200px"></label></td></tr>';
            echo '<tr><td>Hình ảnh cho slide:</td><td><div style="overflow: hidden; width: 205px; height: 24px; padding-top: 5px;"><a href="../Gallery/settingsGallery.php?edId=' . $_GET['edId'] . '" style="background: -moz-linear-gradient(center top , #DDE7FA, #9AB8F3);color: #000000;padding: 5px 15px;text-decoration: underline;">Cập nhật tại quản lý slide</a></div></td></tr>';
            echo '<tr><td>Từ khóa sell:</td><td><input type="text" id="txtKeyWord" name="txtKeyWord" value="' . $rs['ProductKeyMeta'] . '" style="width: 200px;" placeholder="Từ khóa 1, Từ khóa 2,..." /></td></tr>';
            echo '<tr><td>Mô tả ngắn:</td><td><textarea id="txtDescript" name="txtDescript" style="width: 200px; height: 20px" placeholder="Mô tả ngắn">' . $rs['ProductDescription'] . '</textarea></td></tr>';
            echo '<tr><td>Mô tả chi tiết:</td><td></td></tr>';
            echo '<tr><td colspan="2"><textarea name="txtEditor" class="ckeditor" rows="20" cols="70" >' . $rs['ProductDetails'] . '</textarea></td></tr>';
            echo '<tr><td colspan="2"><input class="btnSubmit" onclick="return validateForm();" type="submit" value="Lưu lại" /></td></tr>';
            echo '</table></form></div>';
            break;
        }
        if (!$IsResult) {
            echo '<h1 class="titleEditCategories">Không có sản phẩm được chỉnh sửa </h1>';
        }
    } else {
        echo '<h1 class="titleEditCategories">Không có sản phẩm được chỉnh sửa </h1>';
    }
}

function LoadAllSize($proId) {
    $Size = new DALSizes();
    $result = $Size->GetAllSize();
    $currentSize = $Size->GetAllSizeByProductId($proId);
    $arrCurSize = array();
    while ($r = mysqli_fetch_array($currentSize)) {
        $arrCurSize[] = $r['ProductSizeID'];
    }
    while ($rs = mysqli_fetch_array($result)) {
        $isCheck = false;
        for ($i = 0; $i < count($arrCurSize); $i++) {
            if ($rs['ProductSizeID'] == $arrCurSize[$i]) {
                $isCheck = true;
                break;
            }
        }
        echo '<span style="padding-right: 10px; float: left; width: 59px">';
        if ($isCheck) {
            echo '<input checked="true" name="cbxSize[]" title="' . $rs['ProductSizeNumber'] . '" type="checkbox" value="' . $rs['ProductSizeID'] . '">' . $rs['ProductSizeNumber'];
        } else {
            echo '<input name="cbxSize[]" title="' . $rs['ProductSizeNumber'] . '" type="checkbox" value="' . $rs['ProductSizeID'] . '">' . $rs['ProductSizeNumber'];
        }
        echo '</span>';
    }
}

function LoadAllColor($proId) {
    $color = new DALColor();
    $curentColor = $color->GetAllColorByProductId($proId);
    $arrCurColor = array();
    while ($r = mysqli_fetch_array($curentColor)) {
        $arrCurColor[] = $r['ProductColorID'];
    }
    $result = $color->LoadAllColor();
    while ($rs = mysqli_fetch_array($result)) {
        $isCheck = false;
        for ($i = 0; $i < count($arrCurColor); $i++) {
            if ($rs['ProductColorID'] == $arrCurColor[$i]) {
                $isCheck = true;
                break;
            }
        }
        echo '<span style="padding-right: 10px; float: left; width: 42px">';
        if ($isCheck) {
            echo '<input checked="true" name="cbxColor[]" value="' . $rs['ProductColorID'] . '" type="checkbox" style="float: left;">';
        } else {
            echo '<input name="cbxColor[]" value="' . $rs['ProductColorID'] . '" type="checkbox" style="float: left;">';
        }
        echo '<div style="width: 20px; height: 15px; background: ' . $rs['ProductColorCode'] . '; border: 1px solid #000; float: left;"></div>';
        echo '</span>';
    }
}

function GetAllRangePrice($rangeId) {
    $boolResult = false;
    $rangePrice = new DALRangePrice();
    $result = $rangePrice->FetchAllRangePrice();
    while ($rs = mysqli_fetch_array($result)) {
        if ($rs['ProductRangePriceID'] == $rangeId) {
            echo '<option selected="true" value="' . $rs['ProductRangePriceID'] . '" title="' . $rs['ProductRangePriceData'] . '">' . $rs['ProductRangePriceData'] . '</option>';
            $boolResult = true;
        } else {
            echo '<option value="' . $rs['ProductRangePriceID'] . '" title="' . $rs['ProductRangePriceData'] . '">' . $rs['ProductRangePriceData'] . '</option>';
        }
    }
    if ($boolResult) {
        echo '<option value="0" title="Khoảng Giá Khác">--Khoảng Giá Khác--</option>';
    } else {
        echo '<option selected="true" value="0" title="Khoảng Giá Khác">--Khoảng Giá Khác--</option>';
    }
}

function GetAllBrands($brandId) {
    $boolResult = false;
    $brand = new DALBrands();
    $result = $brand->FetchAllBrands();
    while ($rs = mysqli_fetch_array($result)) {
        if ($rs['ProductBrandID'] == $brandId) {
            echo '<option selected="true" value="' . $rs['ProductBrandID'] . '" title="' . $rs['ProductBrandName'] . '">' . $rs['ProductBrandName'] . '</option>';
            $boolResult = true;
        } else {
            echo '<option value="' . $rs['ProductBrandID'] . '" title="' . $rs['ProductBrandName'] . '">' . $rs['ProductBrandName'] . '</option>';
        }
    }
    if ($boolResult) {
        echo '<option value="0" title="Thương Hiệu Khác">--Thương Hiệu Khác--</option>';
    } else {
        echo '<option selected="true" value="0" title="Thương Hiệu Khác">--Thương Hiệu Khác--</option>';
    }
}

$boolResult = false;

function GetAllCategories($curId) {
    global $boolResult;
    $boolResult = false;
    BuilderListParrentForDropdownlist(0, 1, $curId);
    if ($boolResult) {
        echo '<option value="0" title="Danh Mục Gốc">--Danh Mục Sản Phẩm Khác--</option>';
    } else {
        echo '<option selected="true" value="0" title="Danh Mục Gốc">--Danh Mục Sản Phẩm Khác--</option>';
    }
}

function BuilderListParrentForDropdownlist($cateParrentId, $level, $curId) {
    try {
        global $boolResult;
        $cate = new DalCategories();
        $result = $cate->FetchCategoriesFollowParent($cateParrentId);
        while ($rs = mysqli_fetch_array($result)) {
            $lv = "";
            for ($i = 0; $i < $level; $i++) {
                $lv = $lv . "--";
            }
            if ($curId == $rs['CategoriesID']) {
                echo '<option selected="true" value="' . $rs['CategoriesID'] . '" title="' . $rs['CategoriesName'] . '">' . $lv . ' ' . $rs['CategoriesName'] . '</option>';
                $boolResult = true;
            } else {
                echo '<option value="' . $rs['CategoriesID'] . '" title="' . $rs['CategoriesName'] . '">' . $lv . ' ' . $rs['CategoriesName'] . '</option>';
            }
            $level++;
            BuilderListParrentForDropdownlist($rs['CategoriesID'], $level, $curId);
            $level--;
        }
    } catch (Exception $e) {
        echo $e;
    }
}

?>
