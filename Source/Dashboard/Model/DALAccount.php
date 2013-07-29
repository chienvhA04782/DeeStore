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
}
?>
