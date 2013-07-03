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

    function FetchCategoriesParent() {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM categories WHERE CategoriesParentID = 0");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo "feFetchCategoriesParent" . $e;
        }
    }

    function FetchtchCategoriesChildByParent($idParent) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM 
                categories WHERE CategoriesParentID = '" . $idParent . "'");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo "feFetchtchCategoriesChildByParent" . $e;
        }
    }

    function FetchCategoriesByCateId($cateId) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM 
                categories WHERE CategoriesID = '" . $cateId . "'");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo "feFetchCategoriesByCateId" . $e;
        }
    }
}

?>
