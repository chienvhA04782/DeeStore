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
            if ($BrandId == 0) {
                $BrandId = 'null';
            }
            if ($RangePriceId == 0) {
                $RangePriceId = 'null';
            }
            if ($CateId == 0) {
                $CateId = 'null';
            }
            if ($Admin == 0) {
                $Admin = 'null';
            }
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

    function FetchProductById($id) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.products WHERE ProductID = $id");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'LockProductById:' . $e;
        }
    }

    function EditProductById($Id, $BrandId, $RangeId, $CateId, $AdminId, $Name, $PriceCurrent, $PriceOld, $KeyWord, $Descript, $Icon) {
        try {
            $connect = new Connect();
            $query = "UPDATE deestore.products SET";
            if ($BrandId != "" && $BrandId != 0) {
                $query = $query . " ProductBrandID = $BrandId";
            } else {
                $query = $query . " ProductBrandID = null";
            }
            if ($RangeId != "" && $RangeId != 0) {
                $query = $query . ", ProductRangePriceID = $RangeId";
            } else {
                $query = $query . ", ProductRangePriceID = null";
            }
            if ($CateId != "" && $CateId != 0) {
                $query = $query . ", CategoriesID = $CateId";
            } else {
                $query = $query . ", CategoriesID = null";
            }
            if ($AdminId != "" && $AdminId != 0) {
                $query = $query . ", AdminID = $AdminId";
            } else {
                $query = $query . ", AdminID = null";
            }
            if ($Name != "") {
                $query = $query . ", ProductName = '$Name'";
            }
            if ($PriceCurrent != "") {
                $query = $query . ", ProductPriceCurrent = '$PriceCurrent'";
            }
            if ($PriceOld != "") {
                $query = $query . ", ProductPriceOld = '$PriceOld'";
            }
            if ($KeyWord != "") {
                $query = $query . ", ProductKeyMeta = '$KeyWord'";
            }
            if ($Descript != "") {
                $query = $query . ", ProductDescription = '$Descript'";
            }
            if ($Icon != "") {
                $query = $query . ", ProductPathImage = '$Icon'";
            }
            $query = $query . " WHERE ProductID = $Id";
            $result = mysqli_query($connect->ConnectDb(), $query);
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'EditProductById:' . $e;
        }
    }

}

?>
