<?php

include 'Connect.php';
include 'DALAccount.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userName = $_POST['txtUserName'];
    $pass = $_POST['txtPassword'];
    $password = sha1($pass);
    $account = new DALAccount();
    $result = $account->login($userName, $password);
    while ($rs = mysqli_fetch_array($result)) {
        if ($rs['AdminStatus'] == 0) {
            echo '<META http-equiv="refresh" content="0;URL=../index.html?lock=true">';
            return;
        } else {
            session_start();
            $_SESSION['userName'] = $rs['AdminAccount'];
            session_start();
            $_SESSION['userId'] = $rs['AdminId'];
            echo '<META http-equiv="refresh" content="0;URL=../Pages/Home.php">';
            return;
        }
        return;
    }
    echo '<META http-equiv="refresh" content="0;URL=../index.html?error=true">';
} else {
    echo '<META http-equiv="refresh" content="0;URL=../index.html">';
}
?>
