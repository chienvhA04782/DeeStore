<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DALGallery
 *
 * @author vanthuc5433
 */
class DALGallery {
    //put your code here
    function DALGallery(){
        
    }
    
    function AddNewGallery($proId, $Path, $Title, $Link){
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), 
                    "INSERT INTO deestore.productgallery (`ProductID`, `ProductGalleryPath`, 
                        `ProductGalleryTitle`, `ProductGalleryLink`) VALUES ($proId, '$Path', '$Title', '$Link');");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'AddNewGallery:' . $e;
        }
    }
    
    function FetchAllSlideByProductId($proId){
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.productgallery WHERE ProductID = $proId");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'FetchAllSlideByProductId:' . $e;
        }
    }
    
    function FetchSlideById($Id){
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.productgallery WHERE ProductGalleryID = $Id");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'FetchSlideById:' . $e;
        }
    }
    
    function RemoveSlideById($SlideId){
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "DELETE FROM deestore.productgallery WHERE ProductGalleryID = $SlideId");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'RemoveSlideById:' . $e;
        }
    }
    
}

?>
