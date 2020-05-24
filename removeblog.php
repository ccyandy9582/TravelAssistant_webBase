<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!(isset($_POST["blogid"]) && isset($_SESSION["userid"]))) {
        require("404.php");
    } else {
        $required = true;
        require("database.php");
        if (isset($_SESSION["admin"]) && ($_POST["userid"] != $_SESSION["userid"])) {
            $sql = "UPDATE blog set state = 2 WHERE blogid = {$_POST["blogid"]}";
        } else {
            $sql = "DELETE FROM blog WHERE userid = {$_SESSION["userid"]} and blogid = {$_POST["blogid"]}";
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