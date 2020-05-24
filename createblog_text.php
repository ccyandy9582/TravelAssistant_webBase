<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $createblog_text["createblog"] = "Create Blog";
            $createblog_text["title"] = "Title";
            $createblog_text["viewplan"] = "View Plan";
            $createblog_text["post"] = "Post";
        } else if ($_SESSION["lang"] == "ZH") {
            $createblog_text["createblog"] = "分享行程";
            $createblog_text["title"] = "標題";
            $createblog_text["viewplan"] = "檢視行程";
            $createblog_text["post"] = "發佈";
        }
    }
?>