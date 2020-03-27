<?php 
    SESSION_START();
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
?>