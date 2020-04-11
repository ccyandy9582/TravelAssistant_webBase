<?php 
    $required=1;
    require("html_start.php");
    if (!isset($_SESSION["userid"])) {
?>
        <script>
            window.location.replace('home');
        </script>
<?php
    } else {
?>
        <div id="content_bar">
            <span data="email">email</span> | 
            <span data="password">password</span> | 
            <span data="name">name</span>
        </div>
        <div id="content"></div>
        <script>
<?php 
            if (!isset($_GET["type"])) {
                echo "$('#content').load('setting_name', {load : true})";
            } else {
            }
?>
        </script>
<?php
    }
    require("html_end.php");
?>