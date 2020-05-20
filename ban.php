<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION["admin"]) && isset($_POST["banned"]) && isset($_POST["user"])) {
        $required = true;
        require("database.php");
        if ($_POST["banned"] == 0) {
            $sql = "UPDATE user set banned = 1 WHERE userid = ".$_POST["user"];
        } else {
            $sql = "UPDATE user set banned = 0 WHERE userid = ".$_POST["user"];
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