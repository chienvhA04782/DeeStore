<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DALProductsManager
 *
 * @author vanthuc5433
 */
class DALProducts {

    //put your code here
    function DALProducts() {
        
    }

    function FetchAllProducts() {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.products");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo "FetchCategoriesFollowParent:" . $e;
        }
    }

    function GetProductCurrentIdBigest() {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT ProductID FROM deestore.products ORDER BY ProductID DESC");
            $connect->CloseDB();
            while ($rs = mysqli_fetch_array($result)) {
                return $rs['ProductID'];
            }
            return 1;
        } catch (Exception $e) {
            echo 'FetchCategoriesById:' . $e;
            return 1;
        }
    }

    function AddNewProduct($Id, $BrandId, $RangePriceId, $CateId, $Admin, $Name, $PriceCurrent, $PriceSale, $KeyWord, $Descript, $Status, $PathIcon, $Details) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "INSERT INTO deestore.products VALUES ($Id, $BrandId, 
                    $RangePriceId, $CateId, $Admin, '$Name', '$PriceSale', '$PriceCurrent',
                        '$KeyWord', '$Descript', $Status, '$PathIcon', '$Details');");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'AddNewProduct:' . $e;
        }
    }

    function RemoveProduct($proId) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "DELETE FROM `deestore`.`products` WHERE `ProductID`='$proId';");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'RemoveProduct:' . $e;
        }
    }

    function LockProductById($proId, $value) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "UPDATE deestore.products SET ProductStatus = " . $value . " WHERE ProductID = $proId");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'LockProductById:' . $e;
        }
    }

}

?>
