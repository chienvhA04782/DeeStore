<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductSize
 *
 * @author chien
 */
class ProductSize {

    //put your code here
    function ProductSize() {
        
    }

    function feFetchAllProductSize() {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM productsize");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo "feFetchTop20Product" + $e;
        }
    }
}
?>
