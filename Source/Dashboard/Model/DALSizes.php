<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DALSize
 *
 * @author vanthuc5433
 */
class DALSizes {

//put your code here
    public function DALSizes() {
        
    }

    function GetAllSize() {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.productsize");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'GetAllSize:' . $e;
        }
    }

    function GetAllSizeByProductId($proId) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.joinproductsize WHERE ProductID='$proId'");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'GetAllSizeByProductId:' . $e;
        }
    }

    function ProductJoinSize($proId, $sizeId) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "INSERT INTO deestore.joinproductsize (ProductSizeID, ProductID)  VALUES($sizeId,$proId);");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'GetAllSize:' . $e;
        }
    }

    function removeSizeForByProductId($proId) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "DELETE FROM deestore.joinproductsize WHERE ProductId='$proId';");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'GetAllSize:' . $e;
        }
    }

}

?>
