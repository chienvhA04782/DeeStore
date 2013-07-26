<?php

include 'Connect.php';
include 'DALCategories.php';
include 'DALProducts.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['removeId'])) {
        $pro = new DALProducts();
        $result = $pro->RemoveProduct($_POST['removeId']);
        if (!$result) {
            echo '<span id="errorMessages">Xóa sản phẩm với Id = "<font style="text-decoration: underline">' . $_POST['removeId'] . '</font>" lỗi</span>';
            echo '<script type="text/javascript">$(document).ready(function (){$("#errorMessages").show();setTimeout(function(){$("#errorMessages").hide(1000);}, 3000);});</script>';
        }
    }

    if (!empty($_POST['typeRequest'])) {
        LoadAllDataProducts();
    }

    if (!empty($_POST['lockId'])) {
        $pro = new DALProducts();
        $result = $pro->LockProductById($_POST['lockId'], $_POST['lockValue']);
    }
}

function LoadAllDataProducts() {
    $ssno = 0;
    echo '<h1  class="titleProducts">Quản lý sản phẩm</h1>';
    echo '<div id="container">';
    echo '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">';
    echo '<thead><tr>';
    echo '<th>STT</th>';
    echo '<th>Tên sản phẩm</th>';
    echo '<th>Tên Danh Mục</th>';
    echo '<th>Giá Gốc</th>';
    echo '<th>Giá K/M</th>';
    echo '<th></th>';
    echo '</tr></thead>';
    echo '<tbody>';
    $pro = new DALProducts();
    $result = $pro->FetchAllProducts();
    while ($rs = mysqli_fetch_array($result)) {
        $ssno++;
        echo '<tr>';
        echo '<td>' . $ssno . '</td>';
        echo '<td>' . $rs['ProductName'] . '</td>';
        echo '<td>' . FetchNameCategories($rs['ProductID']) . '</td>';
        echo '<td>' . $rs['ProductPriceOld'] . '</td>';
        echo '<td>' . $rs['ProductPriceCurrent'] . '</td>';
        echo '<td>
                <a href="javascript:void(0);" onclick="return removeCateById(' . $rs['ProductID'] . ', \'' . $rs['ProductName'] . '\');" title="Xóa sản phẩm: ' . $rs['ProductName'] . '"><img class="dataTableEditRemove" src="../../Media/Images/Icons/Recycle.png"></a>
                <a href="javascript:void(0);" onclick="return editProductById(' . $rs['ProductID'] . ');" title="Sửa sản phẩm: ' . $rs['ProductName'] . '"><img class="dataTableEditRemove" src="../../Media/Images/Icons/edit_Pencil.png"></a>';
        if ($rs['ProductStatus'] == 1) {
            echo '<a href="javascript:void(0);" onclick="return lockProductById(' . $rs['ProductID'] . ', \'' . $rs['ProductName'] . '\', 0);" title="Khóa sản phẩm: ' . $rs['ProductName'] . '"><img class="dataTableEditRemove" src="../../Media/Images/Icons/unlockBackground.png"></a>';
        } else {
            echo '<a href="javascript:void(0);" onclick="return lockProductById(' . $rs['ProductID'] . ', \'' . $rs['ProductName'] . '\', 1);" title="Khóa sản phẩm: ' . $rs['ProductName'] . '"><img class="dataTableEditRemove" src="../../Media/Images/Icons/LockBackground.png"></a>';
        }
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody></table></div>';
}

function FetchNameCategories($Id) {
    $cate = new DalCategories();
    $result = $cate->FetchCategoriesById($Id);
    if (mysqli_num_rows($result)) {
        while ($rs = mysqli_fetch_array($result)) {
            return $rs['CategoriesName'];
        }
    }
    return "Danh mục gốc";
}

?>
