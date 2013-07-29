<?php
include 'Connect.php';
include 'DALSizes.php';

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    if(!empty($_POST['typeRequest'])){
        LoadAllDataSizes();
    }
    
    if(!empty($_POST['removeId'])){
        echo 'ok';
        $size = new DALSizes();
        $size->removeSizeForBySizeId($_POST['removeId']);
        $result = $size->removeSizeById($_POST['removeId']);
        if (!$result) {
            echo '<span id="errorMessages">Xóa sản phẩm với Id = "<font style="text-decoration: underline">' . $_POST['removeId'] . '</font>" lỗi</span>';
            echo '<script type="text/javascript">$(document).ready(function (){$("#errorMessages").show();setTimeout(function(){$("#errorMessages").hide(1000);}, 3000);});</script>';
        }
    }
}

function LoadAllDataSizes() {
    $ssno = 0;
    echo '<h1  class="titleSize">Quản Lý Kích  Cỡ</h1>';
    echo '<div id="container">';
    echo '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">';
    echo '<thead><tr>';
    echo '<th>STT</th>';
    echo '<th>Mã</th>';
    echo '<th>Kích thước - Kích cỡ - Size</th>';
    echo '<th></th>';
    echo '</tr></thead>';
    echo '<tbody>';
    $size = new DALSizes();
    $result = $size->GetAllSize();
    while ($rs = mysqli_fetch_array($result)) {
        $ssno++;
        echo '<tr>';
        echo '<td>' . $ssno . '</td>';
        echo '<td>' . $rs['ProductSizeID'] . '</td>';
        echo '<td>' . $rs['ProductSizeNumber'] . '</td>';
        echo '<td>
                <a href="javascript:void(0);" onclick="return removeSizeById(' . $rs['ProductSizeID'] . ', \'' . $rs['ProductSizeNumber'] . '\');" title="Xóa kích cỡ: ' . $rs['ProductSizeNumber'] . '"><img class="dataTableEditRemove" src="../../Media/Images/Icons/Recycle.png"></a>
                <a href="javascript:void(0);" onclick="return editSizeById(' . $rs['ProductSizeID'] . ');" title="Sửa kích cỡ: ' . $rs['ProductSizeNumber'] . '"><img class="dataTableEditRemove" src="../../Media/Images/Icons/edit_Pencil.png"></a>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody></table></div>';
}

?>
