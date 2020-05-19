<?php 
    $required=1;
    require("html_start.php");
    require("setting_text.php");
    if (!isset($_SESSION["userid"])) {
?>
        <script>
            window.location.replace('home');
        </script>
<?php
    } else {
?>
        <div id="content_bar">
            <a href="setting?type=password"><?php echo $setting_text["pw"];?></a> | 
            <a href="setting?type=name"><?php echo $setting_text["name"];?></a>
        </div>
        <div id="content"></div>
        <script>
<?php 
            if (!isset($_GET["type"])) {
                echo "$('#content').load('setting_pw', {load : true})";
            } else if ($_GET["type"] == "password") {
                echo "$('#content').load('setting_pw', {load : true})";
            } else if ($_GET["type"] == "name") {
                echo "$('#content').load('setting_name', {load : true})";
            } 
?>
        </script>
<?php
    }
    require("html_end.php");
?>