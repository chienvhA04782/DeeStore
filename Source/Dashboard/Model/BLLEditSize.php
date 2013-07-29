<?php
include 'Connect.php';
include 'DALSizes.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $SizeId = $_POST['txtSizeId'];
    $SizeName = $_POST['txtSizeName'];
    $Size = new DALSizes();
    $result = $Size->EditSizeById($SizeId, $SizeName);
    if ($result) {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Size/SizeManager.php">';
    } else {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Size/EditSize.php?edId=' . $_POST['$SizeId'] . '&&error=true">';
    }
}

function LoadDataForEdit() {
    $IsResult = false;
    $size = new DALSizes();
    $result = $size->GetSizeById($_GET['edId']);
    while ($rs = mysqli_fetch_array($result)) {
        $IsResult = true;
        echo '<h1 class="titleEditCategories">Chỉnh sửa kích cỡ - size</h1>';
        echo '<div class="AddAndEditContent"><form action="../../Model/BLLEditSize.php" method="POST" enctype="multipart/form-data">';
        echo '<table><tr><td>Kích cỡ:</td><td>';
        echo '<input type="hidden" id="txtSizeId" name="txtSizeId" value="' . $rs['ProductSizeID'] . '" />';
        echo '<input id="txtSizeName" name="txtSizeName" placeholder="Nhập size" type="text" value="' . $rs['ProductSizeNumber'] . '" style="width: 200px" />';
        echo '</td></tr><tr><td colspan="2">';
        echo '<input class="btnSubmit" onclick="return validateForm();" type="submit" value="Cập nhật" /></td></tr></table></form></div>';
        break;
    }
    if (!$IsResult) {
        echo '<h1 class="titleEditCategories">Không có thương hiệu được chỉnh sửa </h1>';
    }
}
?>
