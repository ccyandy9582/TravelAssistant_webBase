<?php 
    if (!isset($_POST["a"])) {
        require("404.php");
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION["userid"])) {
            unset($_SESSION["userid"]);
            echo <<<EOF
            <script>
                location.reload();
            </script>
EOF;
        } else {
            echo '<script>window.location.replace("home");</script>';
        }
    }
?>