<?php
    if (isset($required)) {
        $login = array("localhost", "root", "", "travel");
        $conn = new mysqli($login[0],$login[1],$login[2],$login[3]);
        if ($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }
    }
?>