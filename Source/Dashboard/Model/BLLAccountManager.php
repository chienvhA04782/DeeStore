<?php
include 'Connect.php';
include 'DALAccount.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Id = $_POST['txtId'];
    $PassOld = $_POST['txtPasswordOld'];
    $PassNew = $_POST['txtPasswordNew'];
    $PasswordNew = sha1($PassNew);
    $PasswordOld = sha1($PassOld);
    if($Id != ""){
        $IsCurrent = false;
        $account = new DALAccount();
        $resultCurr = $account->checkValidatorPass($Id, $PasswordOld);
        while ($rsc = mysqli_fetch_array($resultCurr)){
            $IsCurrent = true;
            $result = $account->UpdatePassword($Id, $PasswordNew);
            if($result == 1){
                header( 'Location: ../Pages/Account/ChangePassword.php?result=success' );
            }else{
                header( 'Location: ../Pages/Account/ChangePassword.php?result=error' );
            }
        }
        if(!$IsCurrent){
            header( 'Location: ../Pages/Account/ChangePassword.php?result=errorPasswordCurrent' );
        }
    }
}
?>
