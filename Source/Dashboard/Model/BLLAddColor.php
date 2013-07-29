<?php
include 'Connect.php';
include 'DALColor.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Name = $_POST['txtColor'];
    $color = new DALColor();
    $result = $color->AddNewColor($Name);
    if ($result) {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Color/ColorManager.php">';
    } else {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Color/AddNewColor.php?error=true">';
    }
}
?>
