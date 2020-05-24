<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!(isset($_POST["planid"]) && isset($_SESSION["userid"]))) {
        require("404.php");
    } else {
        $required = true;
        require("database.php");
        $sql = "INSERT into user_plan (userid,planid) VALUES ({$_SESSION["userid"]},{$_POST["planid"]})";
        if ($conn->query($sql) === TRUE) {
            echo "
                <script>
                window.location.replace('myplan');
                </script>
            ";
        } else {
            echo "<script>alert('Error');</script>";
        }
        $conn->close();
    }
?>