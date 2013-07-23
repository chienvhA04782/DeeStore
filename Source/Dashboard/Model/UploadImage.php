<?php

$uploaddir = '../Media/Images/Categories/';

$file_name = "imageCategories_Demo." . pathinfo($_FILES['uploadfile']['name'], PATHINFO_EXTENSION);

$file = $uploaddir . $file_name;

if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
    echo $file_name;
} else {
    echo "error";
}

?>