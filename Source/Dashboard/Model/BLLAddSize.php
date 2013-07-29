<?php
include 'Connect.php';
include 'DALSizes.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $NameSize = $_POST['txtSizeName'];
    $size = new DALSizes();
    $result = $size->AddNewSize($NameSize);
    if ($result) {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Size/SizeManager.php">';
    } else {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/Size/AddNewSize.php?error=true">';
    }
}
?>
