<?php

include 'Connect.php';
include 'DALCategories.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('SimpleImage.php');
    $Parent = $_POST['cbxParrent'];
    $Name = $_POST['txtName'];
    $Order = $_POST['txtOrder'];
    if ($Order == "") {
        $Order = 0;
    }
    $IconPath = "";
    $BannerPath = "";
    $BannerStatus = $_POST['cbBannerStatus'] == "on" ? true : false;

    $cate = new DalCategories();
    $Id = $_POST['CatgoriesId'];
    if ($_FILES['fileIcon']['size'] > 0) {
        $rs = $cate->FetchCategoriesById($Id);
        while ($r = mysqli_fetch_array($rs)) {
            if(file_exists("../Media/Images/Categories/" . $r['CategoriesIcon'])){
                unlink("../Media/Images/Categories/" . $r['CategoriesIcon']);
            }
        }
        $IconPath = "Icon_" . time() . "." . pathinfo($_FILES['fileIcon']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['fileIcon']['tmp_name'], "../Media/Images/Categories/" . $IconPath);
        $image = new SimpleImage();
        $image->load("../Media/Images/Categories/" . $IconPath);
        $image->resize(250, 400);
        $image->save("../Media/Images/Categories/" . $IconPath);
    }
    if ($_FILES['fileBanner']['size'] > 0) {
        $rs = $cate->FetchCategoriesById($Id);
        while ($r = mysqli_fetch_array($rs)) {
            if(file_exists("../Media/Images/Categories/" . $r['CategoriesBanner'])){
                unlink("../Media/Images/Categories/" . $r['CategoriesBanner']);
            }
        }
        $BannerPath = "Banner_" . time() . "." . pathinfo($_FILES['fileBanner']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['fileBanner']['tmp_name'], "../Media/Images/Categories/" . $BannerPath);
        $image = new SimpleImage();
        $image->load("../Media/Images/Categories/" . $BannerPath);
        $image->resize(250, 400);
        $image->save("../Media/Images/Categories/" . $BannerPath);
    }

    $result = $cate->EditCategoriesById($Id, $Name, $IconPath, $Parent, $BannerPath, $BannerStatus, $Order);
    if ($result) {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Categories/CategoriesManager.php">';
    } else {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Categories/EditCategories.php?error=true">';
    }
}

function GetAndFillDataIntoForm() {
    if (!empty($_GET['edId'])) {
        $cate = new DalCategories();
        $result = $cate->FetchCategoriesById($_GET['edId']);
        while ($rs = mysqli_fetch_array($result)) {
            echo '<h1 class="titleEditCategories">Chỉnh sửa danh mục sản phẩm</h1>';
            echo '<div class="addEditCateContent">';
            echo '<form action="../../Model/BLLEditCategories.php" method="POST" enctype="multipart/form-data">';
            echo '<input name="CatgoriesId" type="hidden" value="' . $rs['CategoriesID'] . '">';
            echo '<table><tr><td>Chọn danh mục cha:</td>';
            echo '<td><select id="cbxParrent" name="cbxParrent" style="width: 200px">';
            GetAllParent($rs['CategoriesParentID']);
            echo '</select></td></tr><tr><td>Tên danh mục:</td>';
            echo '<td><input id="txtName" type="text" style="width: 200px;" placeholder="Nhập tên danh mục" value="' . $rs['CategoriesName'] . '" name="txtName" />';
            echo '<label id="lblErrorNameEditCate" class="error"></label></td></tr>';
            echo '<tr><td>Vị trí hiển thị:</td>';
            echo '<td><input id="txtOrder" type="text" style="width: 200px;" title="Số càng nhỏ vị trí xuất hiện càng cao" placeholder="Nhập vị trí hiển thị" value="' . $rs['CategoriesOrders'] . '" name="txtOrder" />';
            echo '<label id="lblErrorOrderEditCate" class="error"></label></td></tr>';
            echo '<tr><td>Logo danh mục:</td>';
            echo '<td><input id="fileIcon" name="fileIcon" type="file" style="width: 200px"><label id="lblErrorFileIconEditCate" class="error"></label></td></tr>';
            echo '<tr><td>Banner danh mục:</td><td><input id="fileBanner" name="fileBanner" type="file" style="width: 200px"><label id="lblErrorFileBannerEditCate" class="error"></label></td></tr>';
            if($rs['CategoriesBannerStatus'] === "true"){
                echo '<tr><td>Trạng thái banner:</td><td><input class="checkboxCss" checked="true" id="cbBannerStatus" name="cbBannerStatus" type="checkbox" /></td></tr>';
            }else{
                echo '<tr><td>Trạng thái banner:</td><td><input class="checkboxCss" id="cbBannerStatus" name="cbBannerStatus" type="checkbox" /></td></tr>';
            }
            echo '<tr><td colspan="2"><input class="btnSubmit" onclick="return checkForm();" type="submit" value="Lưu lại" /></td></tr>';
            echo '</table></form></div>';
            break;
        }
    }
}

function GetAllParent($parentId) {
    echo '<option value="0" title="Danh Mục Gốc">Danh Mục Gốc</option>';
    BuilderListParrentForDropdownlist(0, 0, $parentId);
}

function BuilderListParrentForDropdownlist($cateParrentId, $level, $parentId) {
    try {
        $cate = new DalCategories();
        $result = $cate->FetchCategoriesFollowParent($cateParrentId);
        while ($rs = mysqli_fetch_array($result)) {
            $lv = "";
            for ($i = 0; $i < $level; $i++) {
                $lv = $lv . "--";
            }
            if ($rs['CategoriesID'] == $parentId) {
                echo '<option value="' . $rs['CategoriesID'] . '" selected="true" title="' . $rs['CategoriesName'] . '">' . $lv . ' ' . $rs['CategoriesName'] . '</option>';
            } else {
                echo '<option value="' . $rs['CategoriesID'] . '" title="' . $rs['CategoriesName'] . '">' . $lv . ' ' . $rs['CategoriesName'] . '</option>';
            }
            $level++;
            BuilderListParrentForDropdownlist($rs['CategoriesID'], $level);
            $level--;
        }
    } catch (Exception $e) {
        echo $e;
    }
}

?>
