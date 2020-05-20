<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $place_commentSection_text["remove"]="remove";
            $place_commentSection_text["ban"]="ban";
            $place_commentSection_text["unban"]="unban";
            $place_commentSection_text["page"]="page";
            $place_commentSection_text["noComment"]="No comment avaliable";
        } else if ($_SESSION["lang"] == "ZH") {
            $place_commentSection_text["remove"]="移除";
            $place_commentSection_text["ban"]="封鎖";
            $place_commentSection_text["unban"]="解除封鎖";
            $place_commentSection_text["page"]="頁數";
            $place_commentSection_text["noComment"]="尚未有人評論此地方";
        }
        
    }
?>