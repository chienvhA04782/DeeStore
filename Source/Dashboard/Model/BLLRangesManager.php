<?php
include 'Connect.php';
include 'DALRangePrice.php';

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    if(!empty($_POST['typeRequest'])){
        LoadAllDataRanges();
    }
    
    if(!empty($_POST['removeId'])){
        $pro = new DALRangePrice();
        $result = $pro->HiddenRangePriceById($_POST['removeId']);
        if (!$result) {
            echo '<span id="errorMessages">Xóa sản phẩm với Id = "<font style="text-decoration: underline">' . $_POST['removeId'] . '</font>" lỗi</span>';
            echo '<script type="text/javascript">$(document).ready(function (){$("#errorMessages").show();setTimeout(function(){$("#errorMessages").hide(1000);}, 3000);});</script>';
        }
    }
}

function LoadAllDataRanges(){
    $ssno = 0;
    echo '<h1  class="titleRanges">Quản Lý Khoảng Giá</h1>';
    echo '<div id="container">';
    echo '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">';
    echo '<thead><tr>';
    echo '<th>STT</th>';
    echo '<th>Mã</th>';
    echo '<th>Khoảng Giá</th>';
    echo '<th></th>';
    echo '</tr></thead>';
    echo '<tbody>';
    $pro = new DALRangePrice();
    $result = $pro->FetchAllRangePrice();
    while ($rs = mysqli_fetch_array($result)) {
        $ssno++;
        echo '<tr>';
        echo '<td>' . $ssno . '</td>';
        echo '<td>' . $rs['ProductRangePriceID'] . '</td>';
        echo '<td>' . $rs['ProductRangePriceData'] . '</td>';
        echo '<td>
                <a href="javascript:void(0);" onclick="return removeRangeById(' . $rs['ProductRangePriceID'] . ', \'' . $rs['ProductRangePriceData'] . '\');" title="Xóa khoảng giá: ' . $rs['ProductRangePriceData'] . '"><img class="dataTableEditRemove" src="../../Media/Images/Icons/Recycle.png"></a>
                <a href="javascript:void(0);" onclick="return editRangeById(' . $rs['ProductRangePriceID'] . ');" title="Sửa khoảng giá: ' . $rs['ProductRangePriceData'] . '"><img class="dataTableEditRemove" src="../../Media/Images/Icons/edit_Pencil.png"></a>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody></table></div>';
}

?>
