<?php

include 'Connect.php';
include 'DALCategories.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('SimpleImage.php');
    $Parent = $_POST['cbxParrent'];
    $Name = $_POST['txtName'];
    $Order = $_POST['txtOrder'];
    if ($Order === "") {
        $Order = 0;
    }
    $IconPath = "";
    $BannerPath = "";
    $BannerStatus = $_POST['cbBannerStatus'] == "on" ? true : false;

    $cate = new DalCategories();
    $Id = $cate->GetCurrentIdBigest() + 1;
    if ($_FILES['fileIcon']['size'] > 0) {
        $IconPath = "Icon_" . time() . "." . pathinfo($_FILES['fileIcon']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['fileIcon']['tmp_name'], "../Media/Images/Categories/" . $IconPath);
        $image = new SimpleImage();
        $image->load("../Media/Images/Categories/" . $IconPath);
        $image->resize(250, 400);
        $image->save("../Media/Images/Categories/" . $IconPath);
    }
    if ($_FILES['fileBanner']['size'] > 0) {
        $BannerPath = "Banner_" . time() . "." . pathinfo($_FILES['fileBanner']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['fileBanner']['tmp_name'], "../Media/Images/Categories/" . $BannerPath);
        $image = new SimpleImage();
        $image->load("../Media/Images/Categories/" . $BannerPath);
        $image->resize(250, 400);
        $image->save("../Media/Images/Categories/" . $BannerPath);
    }

    $result = $cate->AddNewCategories($Id, $Name, $IconPath, $Parent, $BannerPath, $BannerStatus, $Order);
    if ($result) {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Categories/CategoriesManager.php">';
    } else {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Categories/AddNewCategories.php?error=true">';
    }
}

function GetAllParent() {
    echo '<option value="0" title="Danh Mục Gốc">Danh Mục Gốc</option>';
    BuilderListParrentForDropdownlist(0, 1);
}

function BuilderListParrentForDropdownlist($cateParrentId, $level) {
    try {
        $cate = new DalCategories();
        $result = $cate->FetchCategoriesFollowParent($cateParrentId);
        while ($rs = mysqli_fetch_array($result)) {
            $lv = "";
            for ($i = 0; $i < $level; $i++) {
                $lv = $lv . "--";
            }
            echo '<option value="' . $rs['CategoriesID'] . '" title="' . $rs['CategoriesName'] . '">' . $lv . ' ' . $rs['CategoriesName'] . '</option>';
            $level++;
            BuilderListParrentForDropdownlist($rs['CategoriesID'], $level);
            $level--;
        }
    } catch (Exception $e) {
        echo $e;
    }
}

?>
