<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $myplan_text["myplan"] = "My Plan";
            $myplan_text["start"] = "Start date";
            $myplan_text["end"] = "End date";
            $myplan_text["Location"] = "Location";
            $myplan_text["view"] = "View";
            $myplan_text["remove"] = "Remove";
            $myplan_text["myblog"] = "My blog";
            $myplan_text["title"] = "Title";
            $myplan_text["edit"] = "Edit";
            $myplan_text["public"] = "Public";
            $myplan_text["private"] = "Private";
            $myplan_text["removebyadmin"] = "removed by admin";
        } else if ($_SESSION["lang"] == "ZH") {
            $myplan_text["myplan"] = "我的行程";
            $myplan_text["start"] = "開始日期";
            $myplan_text["end"] = "結束日期";
            $myplan_text["Location"] = "地點";
            $myplan_text["view"] = "檢視";
            $myplan_text["remove"] = "移除";
            $myplan_text["myblog"] = "分享";
            $myplan_text["title"] = "標題";
            $myplan_text["edit"] = "編輯";
            $myplan_text["public"] = "公開";
            $myplan_text["private"] = "私人";
            $myplan_text["removebyadmin"] = "已被管理員移除";
        }
    }
?>