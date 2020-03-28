<?php if (!isset($required)) {
    require("404.php");
} else { SESSION_START();?>
<html>
    <head>
    <link rel="shortcut icon" type="image/png" href="imgs/icon.png"/>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="/fyp/js/jquery.js"></script>
    <script src="/fyp/js/script.js"></script>
    <script src="/fyp/js/sortable.js"></script>
    <script src="/fyp/js/mouse.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <title>HoChillTrip</title>
    </head>
    <body>
        <div id="popout">
            <div id="popout_content">
                <span id="popout_close">&times;</span>
                <p></p>
            </div>
        </div>
        <div id="menu">
            <a href="/fyp/"><img id="icon" src="imgs/hochilltrip_logo.svg" height="75px"></a>
            <!-- <a class="menu_item">Plan</a> -->
            <a class="menu_item" href="blog">Blog</a>
            <?php if (isset($_SESSION["userid"])) {?>
                <div class="menu_item menu_ac">Account
                    <div class="dropdown">
                        <a class="dropdown_item">My Plan</a>
                        <a class="dropdown_item">Setting</a>
                        <span class="dropdown_item logout">Logout</span>
                        <div style="background-color: white; width: 8px;height:8px;position:absolute;top:-3; left:71 ; transform: rotateZ(45deg);"></div>
                    </div>
                </div>
            <?php } else {?>
                <a href="login" class="menu_item">Login</a>
            <?php } ?>
        </div>
        <center><div id="main">
<?php }?>