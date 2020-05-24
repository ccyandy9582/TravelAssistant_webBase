<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!(isset($_POST["title"]) && isset($_SESSION["userid"]) && isset($_POST["content"]) && isset($_POST["blogid"]))) {
        require("404.php");
    } else {
        $required = 1;
        if (empty(trim($_POST["title"]))) {
            echo  "<script>alert('Please enter a title')</script>";
        } else {
            $required = true;
            require("database.php");
            $sql = "UPDATE blog set title"." = '".addslashes($_POST["title"])."', content = '".addslashes($_POST["content"])."' where userid = ".$_SESSION["userid"]." and blogid = ".$_POST["blogid"];
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
    }
?>