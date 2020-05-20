<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!(isset($_POST["rating"]) && $_SESSION["userid"] && $_POST["attractionid"])) {
        require("404.php");
    } else {
        $required = 1;
        require("database.php");
        $sql = "INSERT INTO userrate_attraction (attractionID,userID,rating) values ({$_POST["attractionid"]},{$_SESSION["userid"]},{$_POST["rating"]})";
        if ($conn->query($sql) === TRUE) {
            echo "<script>location.reload();</script>";
        } else {
            $sql = "UPDATE userrate_attraction SET rating = {$_POST["rating"]} WHERE userid = {$_SESSION["userid"]} and attractionid = {$_POST["attractionid"]}";
            if ($conn->query($sql) === TRUE) {
                echo "<script>location.reload();</script>";
            }
        }
        $conn->close();
    }
?>