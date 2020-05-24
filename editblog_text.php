<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $editblog_text["editblog"] = "Edit Blog";
            $editblog_text["title"] = "Title";
            $editblog_text["viewplan"] = "View Plan";
            $editblog_text["post"] = "Post";
        } else if ($_SESSION["lang"] == "ZH") {
            $editblog_text["editblog"] = "分享行程";
            $editblog_text["title"] = "標題";
            $editblog_text["viewplan"] = "檢視行程";
            $editblog_text["post"] = "發佈";
        }
    }
?>