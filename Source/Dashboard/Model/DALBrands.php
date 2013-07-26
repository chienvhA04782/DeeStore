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
    public function DALBrands(){
        
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
}

?>
