<?php
include 'Connect.php';
include 'DALRangePrice.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $RangeId = $_POST['txtRangeId'];
    $RangeName = $_POST['txtRangeName'];
    $range = new DALRangePrice();
    $result = $range->UpdateRangePriceById($RangeId, $RangeName);
    if ($result) {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/PriceRanges/PriceRangesManager.php">';
    } else {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/PriceRanges/EditRange.php?edId=' . $_POST['txtBrandName'] . '&&error=true">';
    }
}

function LoadDataForEdit() {
    $IsResult = false;
    $range = new DALRangePrice();
    $result = $range->FetchRangePriceById($_GET['edId']);
    while ($rs = mysqli_fetch_array($result)) {
        $IsResult = true;
        echo '<h1 class="titleEditCategories">Chỉnh sửa khoảng giá</h1>';
        echo '<div class="AddAndEditContent"><form action="../../Model/BLLEditRange.php" method="POST" enctype="multipart/form-data">';
        echo '<table><tr><td>Tên thương hiệu:</td><td>';
        echo '<input type="hidden" id="txtRangeId" name="txtRangeId" value="' . $rs['ProductRangePriceID'] . '" />';
        echo '<input id="txtRangeName" name="txtRangeName" placeholder="Nhập khoảng giá" type="text" value="' . $rs['ProductRangePriceData'] . '" style="width: 200px" />';
        echo '</td></tr><tr><td colspan="2">';
        echo '<input class="btnSubmit" onclick="return validateForm();" type="submit" value="Cập nhật" /></td></tr></table></form></div>';
        break;
    }
    if (!$IsResult) {
        echo '<h1 class="titleEditCategories">Không có khoảng giá được chỉnh sửa </h1>';
    }
}
?>
