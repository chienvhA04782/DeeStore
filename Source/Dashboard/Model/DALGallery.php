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
}

?>
