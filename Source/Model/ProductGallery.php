<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Productgallery
 *
 * @author chien
 */
class ProductGallery {

    //put your code here
    function ProductGallery() {
        
    }

    function FetchProductGalleryByProductId($productId) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM productgallery WHERE ProductID = $productId");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo "feFetchProductGalleryByProductId" . $e;
        }
    }
}

?>
