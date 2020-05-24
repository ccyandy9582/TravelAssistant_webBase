<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $blog_commentSection_text["remove"]="remove";
            $blog_commentSection_text["ban"]="ban";
            $blog_commentSection_text["unban"]="unban";
            $blog_commentSection_text["page"]="page";
            $blog_commentSection_text["noComment"]="No comment avaliable";
        } else if ($_SESSION["lang"] == "ZH") {
            $blog_commentSection_text["remove"]="移除";
            $blog_commentSection_text["ban"]="封鎖";
            $blog_commentSection_text["unban"]="解除封鎖";
            $blog_commentSection_text["page"]="頁數";
            $blog_commentSection_text["noComment"]="尚未有人評論";
        }
        
    }
?>