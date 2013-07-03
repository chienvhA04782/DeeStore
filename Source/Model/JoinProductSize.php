<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JoinProductSize
 *
 * @author chien
 */
class JoinProductSize {

    //put your code here
    function JoinProductSize() {
        
    }

    function FetchJoinProductSizeByProductID($productID) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM joinproductsize WHERE ProductID = $productID");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo "feFetchCategoriesParent" . $e;
        }
    }
}

?>
