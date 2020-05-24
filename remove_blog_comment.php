<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!(isset($_SESSION["userid"]) && isset($_POST["commentid"]) && isset($_POST["blogid"]))) {
        require("404.php");
    } else {
        $required = true;
        require("database.php");
        if (isset($_SESSION["admin"])) {
            $sql = "DELETE FROM blog_comment where commentid = ".$_POST["commentid"];
        } else {
            $sql = "DELETE FROM blog_comment where commentid = ".$_POST["commentid"]." and userid = ".$_SESSION["userid"];
        }
        if ($conn->query($sql) === TRUE) {
            echo "
                <script>
                    $('#blog_commentSection_list').load('blog_commentSection',{blogid:".$_POST["blogid"].", page: $('#page').val()});
                </script>
            ";
        } else {
            echo "<script>alert('Error');</script>";
        }
        $conn->close();
    }
?>