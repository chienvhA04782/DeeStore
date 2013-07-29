<?php

include 'Connect.php';
include 'DALColor.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['removeId'])) {
        $color = new DALColor();
        $result = $color->RemoveColorById($_POST['removeId']);
        if (!$result) {
            echo '<span id="errorMessages">Xóa mẫu màu với Id = "<font style="text-decoration: underline">' . $_POST['removeId'] . '</font>" lỗi</span>';
            echo '<script type="text/javascript">$(document).ready(function (){$("#errorMessages").show();setTimeout(function(){$("#errorMessages").hide(1000);}, 3000);});</script>';
        }
    }
    if(!empty($_POST['typeRequest'])){
        LoadAllDataColor();
    }
}

function LoadAllDataColor() {
    $ssno = 0;
    echo '<h1  class="titleColor">Quản Lý Màu cho sản phẩm</h1>';
    echo '<div id="container">';
    echo '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">';
    echo '<thead><tr>';
    echo '<th>STT</th>';
    echo '<th>Mã Màu</th>';
    echo '<th>Màu mô tả</th>';
    echo '<th></th>';
    echo '</tr></thead>';
    echo '<tbody>';
    $color = new DALColor();
    $result = $color->LoadAllColor();
    while ($rs = mysqli_fetch_array($result)) {
        $ssno++;
        echo '<tr>';
        echo '<td>' . $ssno . '</td>';
        echo '<td>' . $rs['ProductColorCode'] . '</td>';
        echo '<td><div style="width: 100%; height: 20px; border: 1px solid #000000; background:' . $rs['ProductColorCode'] . '"></div></td>';
        echo '<td>
                <a href="javascript:void(0);" onclick="return removeColorById(' . $rs['ProductColorID'] . ', \'' . $rs['ProductColorCode'] . '\');" title="Xóa màu: ' . $rs['ProductColorCode'] . '"><img class="dataTableEditRemove" src="../../Media/Images/Icons/Recycle.png"></a>
                <a href="javascript:void(0);" onclick="return editColorById(' . $rs['ProductColorID'] . ');" title="Chỉnh sửa màu: ' . $rs['ProductColorCode'] . '"><img class="dataTableEditRemove" src="../../Media/Images/Icons/edit_Pencil.png"></a>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody></table></div>';
}

?>
