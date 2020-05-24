<?php if (!isset($required)) {
    require("404.php");
} else { 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require("html_start_text.php");
?>
<html>
    <head>
    <link rel="shortcut icon" type="image/png" href="imgs/icon.png"/>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="/fyp/js/jquery.js"></script>
    <script src="/fyp/js/script.js"></script>
    <script src="/fyp/js/sortable.js"></script>
    <script src="/fyp/js/mouse.js"></script>
    <script src="/fyp/js/jquery.dragscroll.min.js"></script>
    <script src="/fyp/js/quill.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/quillsnow.css">
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
        <div id="popout1">
            <div id="popout1_content">
                <span id="popout1_close">&times;</span>
                <p></p>
            </div>
        </div>
        <div id="popoutmap">
            <span id="popoutmap_close">&times;</span>
            <div id="popoutmap_content">
            </div>
        </div>
        <div id="menu">
            <a href="/fyp/"><img id="icon" src="imgs/hochilltrip_logo.svg" height="75px"></a>
            <!-- <a class="menu_item">Plan</a> -->
            <div class="menu_item ch_lang"><?php echo $html_start_text["language"]?>
                <div class="ch_lang_dropdown">
                    <span class="dropdown_item" data="EN">ENGLISH</span>
                    <span class="dropdown_item" data="ZH">繁體中文</span>
                    <div style="background-color: white; width: 8px;height:8px;position:absolute;top:-3; left:71 ; transform: rotateZ(45deg);"></div>
                </div>
            </div>
            <a class="menu_item" href="blog"><?php echo $html_start_text["blog"]?></a>
            <?php if (isset($_SESSION["userid"])) {?>
                <div class="menu_item menu_ac"><?php echo $html_start_text["myaccount"]?>
                    <div class="menu_ac_dropdown">
                        <a class="dropdown_item" href="myplan"><?php echo $html_start_text["myplan"]?></a>
                        <a class="dropdown_item" href="setting"><?php echo $html_start_text["setting"]?></a>
                        <?php if(isset($_SESSION["admin"])) {?>
                            <a class="dropdown_item" href="unbanuser"><?php echo $html_start_text["unban"]?></a>
                        <?php }?>
                        <span class="dropdown_item logout"><?php echo $html_start_text["logout"]?></span>
                        <div style="background-color: white; width: 8px;height:8px;position:absolute;top:-3; left:71 ; transform: rotateZ(45deg);"></div>
                    </div>
                </div>
            <?php } else {?>
                <a href="login" class="menu_item"><?php echo $html_start_text["login"]?></a>
            <?php } ?>
        </div>
        <center><div id="main">
<?php }?>