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
    public function DALRangePrice(){
        
    }
    
    public function FetchAllRangePrice(){
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.productrangeprice");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'GetAllRangePrice:' . $e;
        }
    }
}

?>
