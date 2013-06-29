<?php

require './Product.php';
require './Connect.php';

$product = null;
$result = null;

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'AllProduct' :
            $product = new Product();
            $result = $product->feFetchTop20Product();
            break;
        case 'ProductByCate' :
            $product = new Product();
            $result = null;

            if (isset($_POST['cateId']) && !empty($_POST['cateId'])) {
                if ($_POST['parentId'] == 0) {
                    $result = $product->feFetchProductByParentId($_POST['cateId']);
                } else {
                    $result = $product->feFetchProductByCategoriesId($_POST['cateId']);
                }
            }
            break;
    }
    if ($result != null) {
        echo "<script type='text/javascript'>";
        while ($row = mysqli_fetch_array($result)) {
            echo '$(".productContent").append();';
            echo '$(".productContent").append(\'<div class="items"><div class="sizeH"><label>SIZE: X | XL | 1 | 2A</label>';
            echo '</div><div class="opImage"><div class="salepercent"><span>-12</span></div>';
            echo '<img src="Media/Upload/Product/natural-project-7386-01857-1-catalog.jpg"></div>';
            echo '<div><label class="opnameProduct">' . $row['ProductName'] . '</label><label class="opDescription">Description</label>';
            echo '<label class="opOldPrice">600.000 VNĐ</label>';
            echo '<label class="opCurrentPrice">450.000 VNĐ</label><label class="deestoreKy">DEESTORE</label></div></div>\');';
        }
        echo "</script>";
    }
}
?>
