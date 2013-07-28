<?php

include 'Connect.php';
include 'DALBrands.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $BrandId = $_POST['txtBrandId'];
    $BrandName = $_POST['txtBrandName'];
    $brand = new DALBrands();
    $result = $brand->editBrandById($BrandId, $BrandName);
    if ($result) {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Brands/BrandManager.php">';
    } else {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Brands/EditBrand.php?edId=' . $_POST['txtBrandName'] . '&&error=true">';
    }
}

function LoadDataForEdit() {
    $IsResult = false;
    $brand = new DALBrands();
    $result = $brand->FetchBrandById($_GET['edId']);
    while ($rs = mysqli_fetch_array($result)) {
        $IsResult = true;
        echo '<h1 class="titleEditCategories">Chỉnh sửa thương hiệu</h1>';
        echo '<div class="AddAndEditContent"><form action="../../Model/BLLEditBrand.php" method="POST" enctype="multipart/form-data">';
        echo '<table><tr><td>Tên thương hiệu:</td><td>';
        echo '<input type="hidden" id="txtBrandId" name="txtBrandId" value="' . $rs['ProductBrandID'] . '" />';
        echo '<input id="txtBrandName" name="txtBrandName" placeholder="Nhập tên thương hiệu" type="text" value="' . $rs['ProductBrandName'] . '" style="width: 200px" />';
        echo '</td></tr><tr><td colspan="2">';
        echo '<input class="btnSubmit" onclick="return validateForm();" type="submit" value="Cập nhật" /></td></tr></table></form></div>';
        break;
    }
    if (!$IsResult) {
        echo '<h1 class="titleEditCategories">Không có thương hiệu được chỉnh sửa </h1>';
    }
}

?>
