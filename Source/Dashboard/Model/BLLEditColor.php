<?php
include 'Connect.php';
include 'DALColor.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Id = $_POST['txtColorId'];
    $Name = $_POST['txtColor'];
    $color = new DALColor();
    $result = $color->EditColorById($Id, $Name);
    if ($result) {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Color/ColorManager.php">';
    } else {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Color/EditColor.php?error=true">';
    }
}

function LoadDataForEdit(){
    $IsResult = false;
    $color = new DALColor();
    $result = $color->GetColorById($_GET['edId']);
    while ($rs = mysqli_fetch_array($result)) {
        $IsResult = true;
        echo '<h1 class="titleEditCategories">Chỉnh sửa mẫu màu cho các sản phẩm</h1>';
        echo '<div class="AddAndEditContent"><form action="../../Model/BLLEditColor.php" method="POST" enctype="multipart/form-data">';
        echo '<table><tr><td style="padding-left: 90px;">Mã Màu:</td><td>';
        echo '<input type="hidden" id="txtColorId" name="txtColorId" value="' . $rs['ProductColorID'] . '" />';
        echo '<input id="txtColor" name="txtColor" class="color" placeholder="Click để chọn màu" type="text" value="' . $rs['ProductColorCode'] . '" style="width: 200px" />';
        echo '</td></tr><tr><td colspan="2">';
        echo '<input class="btnSubmit" onclick="return validateForm();" type="submit" value="Cập nhật" /></td></tr></table></form></div>';
        break;
    }
    if (!$IsResult) {
        echo '<h1 class="titleEditCategories">Không có mẫu màu được chỉnh sửa </h1>';
    }
}
?>
