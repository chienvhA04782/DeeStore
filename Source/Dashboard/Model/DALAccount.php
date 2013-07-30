<?php

class DALAccount{
    function DALAccount(){
        
    }
    function login($userName, $password){
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.admin WHERE AdminAccount = '$userName' AND AdminPassword = '$password'");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'login:' . $e;
        }
    }
    
    function checkValidatorPass($Id, $Pass){
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "SELECT * FROM deestore.admin WHERE AdminID = '$Id' AND AdminPassword = '$Pass'");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'checkValidatorPass:' . $e;
        }
    }
    
    function UpdatePassword($Id, $Pass){
        try {
            $connect = new Connect();
            $result = mysqli_query($connect->ConnectDb(), "UPDATE deestore.admin SET AdminPassword='$Pass' WHERE AdminID='$Id';");
            $connect->CloseDB();
            return $result;
        } catch (Exception $e) {
            echo 'UpdatePassword:' . $e;
        }
    }
}
?>
