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

    function removeSizeForBySizeId($proId) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "DELETE FROM deestore.joinproductsize WHERE ProductSizeID='$proId';");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'removeSizeForBySizeId:' . $e;
        }
    }

    function removeSizeById($proId) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "DELETE FROM deestore.productsize WHERE ProductSizeID='$proId';");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'removeSizeById:' . $e;
        }
    }

    function AddNewSize($NameSize) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "INSERT INTO deestore.productsize (ProductSizeNumber) VALUES ('$NameSize');");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'AddNewSize:' . $e;
        }
    }

    function EditSizeById($Id, $NameSize) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "UPDATE deestore.productsize SET ProductSizeNumber='$NameSize' WHERE ProductSizeID='$Id';");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'AddNewSize:' . $e;
        }
    }

    function GetSizeById($Id){
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.productsize WHERE ProductSizeID='$Id'");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'GetSizeById:' . $e;
        }
    }
}

?>
