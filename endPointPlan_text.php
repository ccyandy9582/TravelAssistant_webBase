<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $endPointPlan_text["choosetitle"] = "Choose Ending Location";
            $endPointPlan_text["setPoint"] = "Set as ending point";
            $endPointPlan_text["loadmore"] = "load more";
            $endPointPlan_text["arrivingtime"] = "arriving time (optional) (hh:mm)";
            $endPointPlan_text["remove"] = "remove";
            $endPointPlan_text["endpoint"] = "Set Ending Point";
            $endPointPlan_text["search"] = "search";
            $endPointPlan_text["type"] = "Type: ending point";
        } else if ($_SESSION["lang"] == "ZH") {
            $endPointPlan_text["choosetitle"] = "結束地點";
            $endPointPlan_text["setPoint"] = "設定為結束地點";
            $endPointPlan_text["loadmore"] = "載入更多";
            $endPointPlan_text["arrivingtime"] = "到達時間 (可填寫) (時時:分分)";
            $endPointPlan_text["remove"] = "移除";
            $endPointPlan_text["endpoint"] = "選擇結束地點";
            $endPointPlan_text["search"] = "搜尋";
            $endPointPlan_text["type"] = "類型: 結束地點";
        }
        
    }
?>