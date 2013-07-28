<?php

include 'Connect.php';
include 'DALCategories.php';
include 'DALProducts.php';
include 'DALBrands.php';
include 'DALRangePrice.php';
include 'DALGallery.php';

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

    if (!empty($_POST['viewId'])) {
        PreviewProductDetails($_POST['viewId']);
    }

    if (!empty($_POST['removeSlideId'])) {
        $gallery = new DALGallery();
        $ImageSlide = $gallery->FetchSlideById($_POST['removeSlideId']);
        $result = $gallery->RemoveSlideById($_POST['removeSlideId']);
        if ($result) {
            while ($rs = mysqli_fetch_array($ImageSlide)) {
                if (file_exists("../Media/Images/Products/" . $rs['ProductGalleryPath'])) {
                    unlink("../Media/Images/Products/" . $rs['ProductGalleryPath']);
                }
                break;
            }
        }
    }
}

function PreviewProductDetails($Id) {
    $pro = new DALProducts();
    $result = $pro->FetchProductById($Id);
    while ($rs = mysqli_fetch_array($result)) {
        echo '<div id="popupViewProduct"></div>';
        echo '<div class="ViewContents">';
        echo '<h1>' . $rs['ProductName'] . '</h1>';
        echo '<div class="ViewContentDetails"><table border="0"><tr><th>Danh mục:</th>';
        echo '<td>' . GetNameCategoriesById($rs['CategoriesID']) . '</td>';
        echo '</tr><tr><th>Thương hiệu:</th>';
        echo '<td>' . GetNameBrandById($rs['ProductBrandID']) . '</td>';
        echo '</tr><tr><th>Khoảng Giá:</th>';
        echo '<td>' . GetNameRangePriceById($rs['ProductRangePriceID']) . '</td>';
        echo '</tr><tr><th>Giá cũ:</th>';
        echo '<td>' . $rs['ProductPriceOld'] . ' VND</td>';
        echo '</tr><tr><th>Giá khuyến mại:</th>';
        echo '<td>' . $rs['ProductPriceCurrent'] . ' VND</td>';
        echo '</tr><tr><th>Từ khóa sell:</th>';
        echo '<td>' . $rs['ProductKeyMeta'] . '</td>';
        echo '</tr><tr><th colspan="2">Hình ảnh cho slide:</th></tr><tr><td colspan="2"><div class="divSlideImages">';
        GetImageSlideInProduct($rs['ProductID']);
        echo '</div></td></tr><tr><th colspan="2">Mô tả chi tiết sản phẩm:</th></tr><tr><td colspan="2">';
        echo '<span class="spanDescription">' . $rs['ProductDescription'] . '</span>';
        echo '</td></tr></table></div></div>';
    }
}

function GetImageSlideInProduct($proId) {
    $gallery = new DALGallery();
    $result = $gallery->FetchAllSlideByProductId($proId);
    while ($rs = mysqli_fetch_array($result)) {
        echo '<div id="itemSlide_' . $rs['ProductGalleryID'] . '" style="float:left;"><img src="../../Media/Images/Products/' . $rs['ProductGalleryPath'] . '" title="' . $rs['ProductGalleryTitle'] . '" class="imageSlide" />';
        echo '<a href="javascript:void(0);" onclick="removeImageInSlideProduct(' . $rs['ProductGalleryID'] . ');" class="iconCloseImageSlideProduct">×</a></div>';
    }
}

function GetNameRangePriceById($rangeId) {
    $range = new DALRangePrice();
    $result = $range->FetchRangePriceById($rangeId);
    while ($rs = mysqli_fetch_array($result)) {
        return $rs['ProductRangePriceData'];
    }
    return "Không thuộc khoảng giá nào.";
}

function GetNameCategoriesById($cateId) {
    $cate = new DalCategories();
    $result = $cate->FetchCategoriesById($cateId);
    while ($rs = mysqli_fetch_array($result)) {
        return $rs['CategoriesName'];
    }
    return "Không thuộc danh mục nào.";
}

function GetNameBrandById($brandId) {
    $brand = new DALBrands();
    $result = $brand->FetchBrandById($brandId);
    while ($rs = mysqli_fetch_array($result)) {
        return $rs['ProductBrandName'];
    }
    return "Không thuộc thương hiệu nào.";
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
        echo '<td><a href="javascript:void(0);" onclick="ViewDetail(' . $rs['ProductID'] . ');">' . $rs['ProductName'] . '</a></td>';
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
