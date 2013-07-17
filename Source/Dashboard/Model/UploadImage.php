<?php

$uploaddir = '../Media/Images/Categories/';
session_start();
if(!assert($_SESSION['imgType'])){
    $_SESSION['imgType'] = 'icon';
}
$imgType = $_SESSION['imgType'];
if (!assert($_SESSION['imgName'])) {
    $_SESSION['imgName'] = time();
    $file_name = $imgType . "_" . $_SESSION['imgName'] . basename($_FILES['uploadfile']['name']);
}else{
    $file_name = $imgType . "_" . $_SESSION['imgName'] . basename($_FILES['uploadfile']['name']);
}
$file = $uploaddir . $file_name;

if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
    echo $_SESSION['imgName'];
} else {
    echo "error";
}
?>