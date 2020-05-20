<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!(isset($_SESSION["userid"]) && isset($_POST["commentid"]))) {
        require("404.php");
    } else {
        $required = true;
        require("database.php");
        if (isset($_SESSION["admin"])) {
            $sql = "DELETE FROM attraction_comment where commentid = ".$_POST["commentid"];
        } else {
            $sql = "DELETE FROM attraction_comment where commentid = ".$_POST["commentid"]." and userid = ".$_SESSION["userid"];
        }
        if ($conn->query($sql) === TRUE) {
            echo "
                <script>
                    location.reload();
                </script>
            ";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        $conn->close();
    }
?>