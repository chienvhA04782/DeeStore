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
    
    function RemoveColorById($Id) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "DELETE FROM deestore.productcolor WHERE ProductColorID='$Id';");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'RemoveColorById:' . $e;
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
    
    function AddNewColor($Name){
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "INSERT INTO deestore.productcolor (ProductColorCode) VALUES ('#$Name');");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'AddNewColor:' . $e;
        }
    }
    
    function GetColorById($Id){
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.productcolor WHERE ProductColorID='$Id';");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'GetColorById:' . $e;
        }
    }
    
    function EditColorById($Id, $Name){
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "UPDATE deestore.productcolor SET ProductColorCode='#$Name' WHERE ProductColorID='$Id';");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'EditColorById:' . $e;
        }
    }

}

?>
