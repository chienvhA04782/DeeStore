<?php

include 'Connect.php';
include 'DALBrands.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $BrandName = $_POST['txtBrandName'];
    $brand = new DALBrands();
    $result = $brand->addNewBrand($BrandName);
    if ($result) {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Brands/BrandManager.php">';
    } else {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Brands/AddNewBrand.php?error=true">';
    }
}

?>
