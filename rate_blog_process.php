<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!(isset($_POST["rating"]) && $_SESSION["userid"] && $_POST["blogid"])) {
        require("404.php");
    } else {
        $required = 1;
        require("database.php");
        $sql = "INSERT INTO userrate_blog (blogID,userID,rating) values ({$_POST["blogid"]},{$_SESSION["userid"]},{$_POST["rating"]})";
        if ($conn->query($sql) === TRUE) {
            echo "<script>location.reload();</script>";
        } else {
            $sql = "UPDATE userrate_blog SET rating = {$_POST["rating"]} WHERE userid = {$_SESSION["userid"]} and blogid = {$_POST["blogid"]}";
            if ($conn->query($sql) === TRUE) {
                echo "<script>location.reload();</script>";
            }
        }
        $conn->close();
    }
?>