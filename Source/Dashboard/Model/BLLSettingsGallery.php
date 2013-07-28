<?php

include 'Connect.php';
include 'DALGallery.php';

function LoadAllDataWithProductId($proId) {
    $gallery = new DALGallery();
    $result = $gallery->FetchAllSlideByProductId($proId);
    while ($rs = mysqli_fetch_array($result)) {
        echo '<div id="itemSlide_' . $rs['ProductGalleryID'] . '" class="divItemSlide">';
        echo '<img class="imageSlide" src="../../Media/Images/Products/' . $rs['ProductGalleryPath'] . '"/>';
        echo '<a class="iconCloseImageSlideProduct" onclick="removeImageInSlideProduct(' . $rs['ProductGalleryID'] . ');" href="javascript:void(0);">×</a>';
        echo '<a class="iconSettingsImageSlideProduct" onclick="editImageSlideProduct(' . $rs['ProductGalleryID'] . ');" href="javascript:void(0);"><img width="14px" height="14px" src="../../Media/Images/Icons/advancedsettings.png" /></a>';
        echo '<label class="titleImageSlide">' . $rs['ProductGalleryTitle'] . '</label></div>';
    }
}

function LoadFormAddNewGallery($proId) {
    echo '<h2 id="h2AddnewImage">Thêm mới ảnh cho bộ sưu tập</h2>';
    echo '<form action="../../Model/BLLAddGallery.php" method="POST" enctype="multipart/form-data">';
    echo '<input type="hidden" name="txtProductId" value="' . $proId . '" />';
    echo '<table id="tableContents"><tr>';
    echo '<td><input name="fileSlide[]" type="file" style="width: 200px"></td>';
    echo '<td><input name="txtBrandName[]" placeholder="Nhập tên thương hiệu" type="text" style="width: 200px"></td>';
    echo '<td><input name="txtGalleryLink[]" placeholder="Nhập đường link cho ảnh" type="text" style="width: 200px"></td></tr></table>';
    echo '<table><tr><td colspan="3"><div id="divMore">Thêm</div></td></tr>';
    echo '<tr><td colspan="3"><input class="btnSubmit" type="submit" value="Thêm mới" /></td></tr> </table></form>';
}

function addNewGalleryLocation($proId) {
    echo '<input id="btnAddNewGallery" onclick="addNewGalleryByProductId(' . $proId . ');" class="btnSubmit" type="submit" value="Thêm mới hình ảnh cho sản phẩm" />';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    if (!empty($_POST['loadSlideId'])) {
        $IsEdit = false;
        $gallery = new DALGallery();
        $result = $gallery->FetchSlideById($_POST['loadSlideId']);
        while ($rs = mysqli_fetch_array($result)) {
            $IsEdit = true;
            echo '<h2 id="h2AddnewImage">Chỉnh sửa</h2>';
            echo '<form action="../../Model/BLLEditGallery.php" method="POST" enctype="multipart/form-data">';
            echo '<input type="hidden" name="txtGalleryId" id="txtGalleryId" value="' . $rs['ProductGalleryID'] . '" />';
            echo '<input type="hidden" name="txtProductId" id="txtProductId" value="' . $rs['ProductID'] . '" />';
            echo '<table><tr><td><div class="divItemSlide">';
            echo '<img class="imageSlide" src="../../Media/Images/Products/' . $rs['ProductGalleryPath'] . '"/>';
            echo '<label class="titleImageSlide">' . $rs['ProductGalleryTitle'] . '</label>';
            echo '</div></td><td><table>';
            echo '<tr><td>Ảnh mới:</td><td><input id="newFileImage" name="newFileImage" type="file" /></td></tr>';
            echo '<tr><td>Tiêu đề:</td>';
            echo '<td><input id="txtGalleryName" name="txtGalleryName" placeholder="Nhập tiêu đề của hình ảnh" type="text" style="width: 200px" value="' . $rs['ProductGalleryTitle'] . '"></td>';
            echo '</tr><tr><td>Liên kết:</td>';
            echo '<td><input id="txtGalleryLink" name="txtGalleryLink" placeholder="Nhập đường link cho ảnh" type="text" style="width: 200px" value="' . $rs['ProductGalleryLink'] . '"></td>';
            echo '</tr></table></td></tr><tr><td colspan="2">';
            echo '<input class="btnSubmit" onclick="return validateFormEdit();" type="submit" value="Lưu lại" /></td></tr></table></form>';
            break;
        }
        if (!$IsEdit) {
            echo '<h2 id="h2AddnewImage">Không tìm thấy hình ảnh trong cơ sở dữ liệu</h2>';
        }
    }
    
    if(!empty($_POST['newSlideId'])){
        LoadFormAddNewGallery($_POST['newSlideId']);
    }
}
?>
