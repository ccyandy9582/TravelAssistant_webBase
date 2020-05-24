<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!(isset($_POST["planid"]) && isset($_SESSION["userid"]))) {
        require("404.php");
    } else {
        $required = true;
        require("database.php");
        if (isset($_SESSION["admin"])) {
            $sql = "DELETE FROM user_plan WHERE userid = {$_POST["userid"]} and planid = {$_POST["planid"]}";
        } else {
            $sql = "DELETE FROM user_plan WHERE userid = {$_SESSION["userid"]} and planid = {$_POST["planid"]}";
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