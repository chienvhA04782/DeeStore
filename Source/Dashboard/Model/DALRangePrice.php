<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DALRangePrice
 *
 * @author vanthuc5433
 */
class DALRangePrice {

    //put your code here
    public function DALRangePrice() {
        
    }

    public function FetchAllRangePrice() {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.productrangeprice WHERE Status=1");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'GetAllRangePrice:' . $e;
        }
    }

    public function FetchRangePriceById($rangeId) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.productrangeprice WHERE ProductRangePriceID = $rangeId");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'FetchRangePriceById:' . $e;
        }
    }

    public function HiddenRangePriceById($Id) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "UPDATE deestore.productrangeprice SET Status=0 WHERE ProductRangePriceID='$Id';");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'HiddenRangePriceById:' . $e;
        }
    }
    
    public function UpdateRangePriceById($Id, $nameRange) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "UPDATE deestore.productrangeprice SET ProductRangePriceData='$nameRange' WHERE ProductRangePriceID='$Id';");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'UpdateRangePriceById:' . $e;
        }
    }
    
    function AddNewRange($nameRange){
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "INSERT INTO deestore.productrangeprice (ProductRangePriceData, Status) VALUES ('$nameRange', 1);");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'FetchRangePriceById:' . $e;
        }
    }

}

?>
