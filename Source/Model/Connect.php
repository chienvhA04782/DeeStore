<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connect
 *
 * @author chien
 */
class Connect {

    //put your code here
    function FetchName() {
        return "HELLO I'M FetchName Method";
    }
    
    function ConnectDb() {
        try {
            // Create connection
            $this->con = mysqli_connect("localhost", "root", "root", "deestore");
            if (!$this->con) {
                die('Could not connect: ' . mysql_error());
                echo 'Could not connect';
                return null;
            } else {
                return $this->con;
            }
        } catch (Exception $e) {
            echo "connect open failure" . $e;
        }
    }

    function CloseDB() {
        try {
            // close connect
            mysql_close($this->con);
        } catch (Exception $e) {
            echo "Close connect failure" . $e;
        }
    }

}

?>
