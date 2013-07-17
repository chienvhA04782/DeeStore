<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DalCategories
 *
 * @author vanthuc5433
 */
class DalCategories {

    //put your code here
    function DalCategories() {
        
    }

    var $connect;
    var $result;

    function FetchCategoriesFollowParent($parentId) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM categories WHERE CategoriesParentID = $parentId AND CategoriesStatus = true");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo "FetchCategoriesFollowParent:" . $e;
        }
    }

    function FetchCategoriesById($Id) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM categories WHERE CategoriesID = $Id");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'FetchCategoriesById:' . $e;
        }
    }
    
    function RemoveCategoriesById($Id){
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "UPDATE categories SET CategoriesStatus = false WHERE CategoriesID = $Id");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'FetchCategoriesById:' . $e;
        }
    }

}

?>
