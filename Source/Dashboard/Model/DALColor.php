<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DALColor
 *
 * @author vanthuc5433
 */
class DALColor {

    //put your code here
    function LoadAllColor() {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.productcolor");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'LoadAllColor:' . $e;
        }
    }

    function ProductJoinColor($proId, $colorId) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "INSERT INTO deestore.joinproductcolor (ProductColorID, ProductID) VALUES ('$colorId', '$proId');");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'ProductJoinColor:' . $e;
        }
    }

    function RemoveColorByProductId($proId) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "DELETE FROM deestore.joinproductcolor WHERE ProductID='$proId';");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'RemoveColorByProductId:' . $e;
        }
    }
    
    function GetAllColorByProductId($proId){
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.joinproductcolor WHERE ProductID='$proId';");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'GetAllColorByProductId:' . $e;
        }
    }

}

?>
