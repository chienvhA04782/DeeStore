<?php
include 'Connect.php';
include 'DALBrands.php';


if($_SERVER["REQUEST_METHOD"] == 'POST'){
    if(!empty($_POST['typeRequest'])){
        LoadAllDataBrand();
    }
    
    if(!empty($_POST['removeId'])){
        $pro = new DALBrands();
        $result = $pro->removeBrandById($_POST['removeId']);
        if (!$result) {
            echo '<span id="errorMessages">Xóa thương hiệu với Id = "<font style="text-decoration: underline">' . $_POST['removeId'] . '</font>" lỗi</span>';
            echo '<script type="text/javascript">$(document).ready(function (){$("#errorMessages").show();setTimeout(function(){$("#errorMessages").hide(1000);}, 3000);});</script>';
        }
    }
}

function LoadAllDataBrand() {
    $ssno = 0;
    echo '<h1  class="titleBrand">Quản Lý Thương Hiệu</h1>';
    echo '<div id="container">';
    echo '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">';
    echo '<thead><tr>';
    echo '<th>STT</th>';
    echo '<th>Mã Thương Hiệu</th>';
    echo '<th>Tên Thương Hiệu</th>';
    echo '<th></th>';
    echo '</tr></thead>';
    echo '<tbody>';
    $pro = new DALBrands();
    $result = $pro->FetchAllBrands();
    while ($rs = mysqli_fetch_array($result)) {
        $ssno++;
        echo '<tr>';
        echo '<td>' . $ssno . '</td>';
        echo '<td>' . $rs['ProductBrandID'] . '</td>';
        echo '<td>' . $rs['ProductBrandName'] . '</td>';
        echo '<td>
                <a href="javascript:void(0);" onclick="return removeBrandById(' . $rs['ProductBrandID'] . ', \'' . $rs['ProductBrandName'] . '\');" title="Xóa thương hiệu: ' . $rs['ProductBrandName'] . '"><img class="dataTableEditRemove" src="../../Media/Images/Icons/Recycle.png"></a>
                <a href="javascript:void(0);" onclick="return editBrandById(' . $rs['ProductBrandID'] . ');" title="Sửa thương hiệu: ' . $rs['ProductBrandName'] . '"><img class="dataTableEditRemove" src="../../Media/Images/Icons/edit_Pencil.png"></a>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody></table></div>';
}

?>
