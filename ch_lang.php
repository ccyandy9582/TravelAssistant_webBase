<?php 
    if (!isset($_POST["lang"])) {
        require("404.php");
    } else {
        SESSION_START();
        if (isset($_SESSION["userid"])) {
            $required = 1;
            require("database.php");
            $sql = "UPDATE user set Lang = '".$_POST["lang"]."' WHERE userID = ".$_SESSION["userid"];
            $conn->query($sql);
            $conn->close();
        }
        if ($_POST["lang"] == "EN") {
            $_SESSION["lang"] = "EN";
        } else if ($_POST["lang"] == "ZH") {
            $_SESSION["lang"] = "ZH";
        }
        echo <<<EOF
        <script>
            location.reload();
        </script>
EOF;
    }
?>