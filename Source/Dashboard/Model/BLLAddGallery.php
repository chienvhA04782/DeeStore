<?php

include 'Connect.php';
include 'DALGallery.php';
include 'SimpleImage.php';
include 'SimpleXml.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    uploadImageSlide($_POST['txtProductId']);
    echo '<META http-equiv="refresh" content="0;URL=../Pages/Gallery/settingsGallery.php?edId=' . $_POST['txtProductId'] . '">';
}

function uploadImageSlide($Id) {
    $nuber_Upload = count($_FILES["fileSlide"]["name"]);
    $imagePath = "Slide_" . time();
    for ($i = 0; $i < $nuber_Upload; $i++) {
        if ($_FILES["fileSlide"]["size"][$i] > 0) {
            $Title = $_POST['txtBrandName'][$i];
            $Link = $_POST['txtGalleryLink'][$i];

            $imagePathSql = $imagePath . "_" . $i . "." . pathinfo($_FILES['fileSlide']['name'][$i], PATHINFO_EXTENSION);
            $fullPath = "../Media/Images/Products/" . $imagePathSql;
            move_uploaded_file($_FILES["fileSlide"]["tmp_name"][$i], $fullPath);

            $simpleXml = new SimpleXml();
            $input = array("widthSlideProduct", "heightSlideProduct");
            $rs = $simpleXml->getAttribute($input);
            //resize image
            $image = new SimpleImage();
            $image->load($fullPath);
            $image->resize($rs[0], $rs[1]);
            $image->save($fullPath);

            $gall = new DALGallery();
            $gall->AddNewGallery($Id, $imagePathSql, $Title, $Link);
        }
    }
}

?>
