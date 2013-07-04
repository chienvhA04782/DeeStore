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
    public function ProductSize() {
        
    }

    public function FetchAllProductSize() {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM productsize");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo "feFetchTop20Product" . $e;
        }
    }

    public function FetchProductSizeByProductId($productId) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM productsize WHERE ProductSizeID = $productId");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo "FetchProductSizeByProductId" . $e;
        }
    }

    public function FetchProductSizeByProductSizeId($productSizeId) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM productsize WHERE ProductSizeID = $productSizeId");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo "FetchProductSizeByProductId" . $e;
        }
    }

}

?>
