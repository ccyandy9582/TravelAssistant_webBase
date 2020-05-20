<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $place_commentSection_text["remove"]="remove";
            $place_commentSection_text["ban"]="ban";
            $place_commentSection_text["unban"]="unban";
        } else if ($_SESSION["lang"] == "ZH") {
            $place_commentSection_text["remove"]="移除";
            $place_commentSection_text["ban"]="封鎖";
            $place_commentSection_text["unban"]="解除封鎖";
        }
        
    }
?>