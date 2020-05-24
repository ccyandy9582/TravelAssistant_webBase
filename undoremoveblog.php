<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION["admin"]) && isset($_POST["blogid"]) && isset($_POST["userid"])) {
        $required = true;
        require("database.php");
        $sql = "UPDATE blog set state = 0 WHERE blogid = {$_POST["blogid"]}";
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