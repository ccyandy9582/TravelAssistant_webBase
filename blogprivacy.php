<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!(isset($_POST["blogid"]) && isset($_SESSION["userid"]) && isset($_POST["privacy"]))) {
        require("404.php");
    } else {
        $required = true;
        require("database.php");
        if (isset($_SESSION["admin"])) {
            $sql = "UPDATE blog set state = ".$_POST["privacy"]." WHERE blogid = {$_POST["blogid"]}";
        } else {
            $sql = "UPDATE blog set state = ".$_POST["privacy"]." WHERE userid = {$_SESSION["userid"]} and blogid = {$_POST["blogid"]}";
        }
        if ($conn->query($sql) === TRUE) {
            echo "
                <script>
                location.reload();
                </script>
            ";
        } else {
            echo "<script>alert('Error');</script>";
        }
        $conn->close();
    }
?>