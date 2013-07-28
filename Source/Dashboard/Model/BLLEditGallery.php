<?php

include 'Connect.php';
include 'DALGallery.php';
include 'SimpleImage.php';
include 'SimpleXml.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Id = $_POST['txtGalleryId'];
    $proId = $_POST['txtProductId'];
    $Title = $_POST['txtGalleryName'];
    $Link = $_POST['txtGalleryLink'];
    $NewFile = "";
    if ($_FILES['newFileImage']['size'] > 0) {
        $NewFile = "Slide_" . time() . "." . pathinfo($_FILES['newFileImage']['name'], PATHINFO_EXTENSION);
//save file
        move_uploaded_file($_FILES['newFileImage']['tmp_name'], "../Media/Images/Products/" . $NewFile);
//Get size image from file properties.xml
        $simpleXml = new SimpleXml();
        $input = array("widthSlideProduct", "heightSlideProduct");
        $rs = $simpleXml->getAttribute($input);
//resize image
        $image = new SimpleImage();
        $image->load("../Media/Images/Products/" . $NewFile);
        $image->resize($rs[0], $rs[1]);
        $image->save("../Media/Images/Products/" . $NewFile);
    }
    $gallery = new DALGallery();
    $gallery->UpdateSlideById($Id, $NewFile, $Title, $Link);
    echo '<META http-equiv="refresh" content="0;URL=../Pages/Gallery/settingsGallery.php?edId=' . $proId . '">';
}
?>
