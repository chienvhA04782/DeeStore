<?php
include 'Connect.php';
include 'DALRangePrice.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nameRange = $_POST['txtRangeName'];
    $range = new DALRangePrice();
    $result = $range->AddNewRange($nameRange);
    if ($result) {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/PriceRanges/PriceRangesManager.php">';
    } else {
        echo '<META http-equiv="refresh" content="0;URL=../Pages/PriceRanges/AddNewRange.php?error=true">';
    }
}
?>
