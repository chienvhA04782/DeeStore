<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categories
 *
 * @author chien
 */
class Categories {

    //put your code here
    var $connect;
    var $result;

    function Categories() {
        
    }

    function feFetchCategoriesParent() {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM categories WHERE CategoriesParentID = 0");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo "feFetchCategoriesParent" + $e;
        }
    }

    function feFetchtchCategoriesChildByParent($idParent) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM 
                categories WHERE CategoriesParentID = '" . $idParent . "'");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo "feFetchtchCategoriesChildByParent" + $e;
        }
    }

}

?>
