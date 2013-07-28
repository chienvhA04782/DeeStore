<?php
include 'Connect.php';
include 'DALProducts.php';

function LoadAllProductForGallery(){
    $ssno = 0;
    echo '<h1  class="titleGallery">Quản lý bộ sưu tập của sản phẩm</h1>';
    echo '<div id="container">';
    echo '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">';
    echo '<thead><tr>';
    echo '<th>STT</th>';
    echo '<th>Mã sản phẩm</th>';
    echo '<th>Tên sản phẩm</th>';
    echo '<th></th>';
    echo '</tr></thead>';
    echo '<tbody>';
    $pro = new DALProducts();
    $result = $pro->FetchAllProducts();
    while ($rs = mysqli_fetch_array($result)) {
        $ssno++;
        echo '<tr>';
        echo '<td>' . $ssno . '</td>';
        echo '<td>' . $rs['ProductID'] . '</td>';
        echo '<td>' . $rs['ProductName'] . '</td>';
        echo '<td>
                <a href="javascript:void(0);" onclick="return settingGalleryById(' . $rs['ProductID'] . ');" title="Chỉnh sửa bộ sưu tập cho sản phẩm: ' . $rs['ProductName'] . '"><img class="dataTableEditRemove" src="../../Media/Images/Icons/advancedsettings.png"></a>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody></table></div>';
}
?>
