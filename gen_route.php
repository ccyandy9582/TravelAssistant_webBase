<?php //require("html_start.php");?>
    
<?php //require("html_end.php");?>
<html>
<head>
    <link rel="shortcut icon" type="image/png" href="imgs/icon.png"/>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="/fyp/js/jquery.js"></script>
    <script src="/fyp/js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
</head>
<body onload="loading()" style="margin:0;">
    <div id="menu">
        <a href="/fyp/"><img id="icon" src="/fyp/imgs/hochilltrip_logo.svg" height="75px"></a>
        <a class="menu_item">Plan</a>
        <a class="menu_item">Blog</a>
        <a href="login" class="menu_item">Login</a>
    </div>
    <div id="loader"></div>
    <div style="display:none;" id="recommendedRoute" class="animate-bottom">
        this is the generate result.
        <!-- this block hold on the left-top conner -->
    </div>
    <script>
    var myVar;

    function loading() {
        myVar = setTimeout(showPage, 2000);
    }

    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("recommendedRoute").style.display = "block";
    }
    </script>

</body>
</html>
