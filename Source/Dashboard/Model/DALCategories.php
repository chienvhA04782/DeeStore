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

    function FetchCategoriesFollowParent($parentId) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.categories WHERE CategoriesParentID = $parentId AND CategoriesStatus = true");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo "FetchCategoriesFollowParent:" . $e;
        }
    }

    function FetchCategoriesById($Id) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.categories WHERE CategoriesID = $Id");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'FetchCategoriesById:' . $e;
        }
    }

    function AddNewCategories($Id, $Name, $Icon, $Parent, $Banner, $BannerStatus, $Order) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "INSERT INTO deestore.categories VALUES ($Id, '$Name', '$Icon', '$Parent', '$Banner', '$BannerStatus', $Order, true);");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'FetchCategoriesById:' . $e;
        }
    }

    function EditCategoriesById($Id, $Name, $Icon, $Parent, $Banner, $BannerStatus, $Order) {
        try {
            $connect = new Connect();
            $query = "UPDATE deestore.categories SET";
            if($Name != ""){$query = $query . " CategoriesName = '$Name'";}
            if($Icon != ""){$query = $query . ", CategoriesIcon = '$Icon'";}
            if($Parent != ""){$query = $query . ", CategoriesParentID = '$Parent'";}
            if($Banner != ""){$query = $query . ", CategoriesBanner = '$Banner'";}
            if($BannerStatus != ""){$query = $query . ", CategoriesBannerStatus = '$BannerStatus'";}
            if($Order != ""){$query = $query . ", CategoriesOrders = '$Order'";}
            $query = $query . ", CategoriesStatus = 1 WHERE CategoriesID = '$Id'";
            $result = mysqli_query($connect->ConnectDb(), $query);
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'FetchCategoriesById:' . $e;
        }
    }

    function RemoveCategoriesById($Id) {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "UPDATE deestore.categories SET CategoriesStatus = false WHERE CategoriesID = $Id");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'FetchCategoriesById:' . $e;
        }
    }

    function GetCurrentIdBigest() {
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT CategoriesID FROM deestore.categories ORDER BY CategoriesID DESC");
            $connect->CloseDB();
            while ($rs = mysqli_fetch_array($result)) {
                return $rs['CategoriesID'];
            }
            return 1;
        } catch (Exception $e) {
            echo 'FetchCategoriesById:' . $e;
            return 1;
        }
    }

}

?>
