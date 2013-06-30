<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductBrand
 *
 * @author chien
 */
class ProductBrand {

    //put your code here
    function ProductBrand() {
        
    }

    function feFetchAllProductBrand() {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM productbrand");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo "feFetchTop20Product" + $e;
        }
    }

}

?>
