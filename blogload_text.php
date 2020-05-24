<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $blogload_text["page"] = "page";
            $blogload_text["newest"] = "newest";
            $blogload_text["rating"] = "higest rating";
            $blogload_text["by"] = "By";
            $blogload_text["readmore"] = "Read More";
        } else if ($_SESSION["lang"] == "ZH") {
            $blogload_text["page"] = "頁數";
            $blogload_text["newest"] = "最新";
            $blogload_text["rating"] = "最高評價";
            $blogload_text["by"] = "作者:";
            $blogload_text["readmore"] = "查看更多";
        }
        
    }
?>