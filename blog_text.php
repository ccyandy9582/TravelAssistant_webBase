<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $blog_text["post"] = "post";
            $blog_text["comments"] = "Comments";
            $blog_text["rating"] = "Rating";
            $blog_text["myrating"] = "My rating";
            $blog_text["viewplan"] = "view plan";
            $blog_text["Search"] = "Search";
        } else if ($_SESSION["lang"] == "ZH") {
            $blog_text["comments"] = "留言";
            $blog_text["post"] = "發布";
            $blog_text["rating"] = "評分";
            $blog_text["myrating"] = "我的評分";
            $blog_text["viewplan"] = "檢視行程";
            $blog_text["Search"] = "搜尋";
        }
        
    }
?>