<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $startPointPlan_text["choosetitle"] = "Choose Starting Location";
            $startPointPlan_text["setPoint"] = "Set as starting point";
            $startPointPlan_text["loadmore"] = "load more";
            $startPointPlan_text["starttime"] = "starting time (optional) (hh:mm)";
            $startPointPlan_text["timespend"] = "spend time: (in min)";
            $startPointPlan_text["remove"] = "remove";
            $startPointPlan_text["startpoint"] = "Set Starting Point";
            $startPointPlan_text["search"] = "search";
            $startPointPlan_text["type"] = "Type: starting point";
        } else if ($_SESSION["lang"] == "ZH") {
            $startPointPlan_text["choosetitle"] = "開始地點";
            $startPointPlan_text["setPoint"] = "設定為開始地點";
            $startPointPlan_text["loadmore"] = "載入更多";
            $startPointPlan_text["starttime"] = "開始時間 (可填寫) (時時:分分)";
            $startPointPlan_text["timespend"] = "逗留時間: (請以分鐘輸入)";
            $startPointPlan_text["remove"] = "移除";
            $startPointPlan_text["startpoint"] = "選擇開始地點";
            $startPointPlan_text["search"] = "搜尋";
            $startPointPlan_text["type"] = "類型: 開始地點";
        }
        
    }
?>