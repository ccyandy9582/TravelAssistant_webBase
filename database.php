<?php
    if (!isset($required)) {
        require("404.php");
    } else {
        // $login = array("localhost", "root", "", "hochilltrip");
        $login = array("58.152.180.221", "chilladmin", 'ChillPa$$w0rd', "hochilltrip");
        $conn = new mysqli($login[0],$login[1],$login[2],$login[3]);
        $conn -> set_charset("utf8");
        if ($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }
    }
?>