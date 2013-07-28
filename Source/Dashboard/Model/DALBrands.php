<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DALBrands
 *
 * @author vanthuc5433
 */
class DALBrands {

    //put your code here
    public function DALBrands() {
        
    }

    function FetchAllBrands() {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.productbrand");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'FetchAllBrands:' . $e;
        }
    }

    function FetchBrandById($brandId) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.productbrand  WHERE ProductBrandID = $brandId");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'FetchBrandById:' . $e;
        }
    }

    function removeBrandById($brandId) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "DELETE FROM deestore.productbrand  WHERE ProductBrandID = $brandId");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'removeBrandById:' . $e;
        }
    }

    function addNewBrand($BrandName) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "INSERT INTO `deestore`.`productbrand` (`ProductBrandName`) VALUES ('" . $BrandName . "')");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'addNewBrand:' . $e;
        }
    }

    function editBrandById($Id, $BrandName) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "UPDATE `deestore`.`productbrand` SET `ProductBrandName`='$BrandName' WHERE `ProductBrandID`='$Id';");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'editBrandById:' . $e;
        }
    }

}

?>
