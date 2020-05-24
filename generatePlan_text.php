<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $generatePlan_text["placetogo"] = "Place to go";
            $generatePlan_text["add"] = "Add";
            $generatePlan_text["startpoint"] = "Set Starting Point";
            $generatePlan_text["endingpoint"] = "Set Ending Point";
            $generatePlan_text["hotel"] = "Set Lodging";
            $generatePlan_text["generate"] = "generate";
            $generatePlan_text["day"] = "day %u";
            $generatePlan_text["starttime"] = "starting time (optional) (hh:mm)";
            $generatePlan_text["arrivingtime"] = "arriving time (optional) (hh:mm)";
            $generatePlan_text["timespend1"] = "spend time: (in min)";
            $generatePlan_text["type1"] = "Type: starting point";
            $generatePlan_text["type2"] = "Type: attraction";
            $generatePlan_text["type3"] = "Type: ending point";
            $generatePlan_text["type4"] = "Type: Hotel";
            $generatePlan_text["remove"] = "remove";
        } else if ($_SESSION["lang"] == "ZH") {
            $generatePlan_text["placetogo"] = "希望去的景點";
            $generatePlan_text["add"] = " 添加";
            $generatePlan_text["startpoint"] = "選擇開始地點";
            $generatePlan_text["endingpoint"] = "選擇結束地點";
            $generatePlan_text["hotel"] = "選擇住宿";
            $generatePlan_text["generate"] = "生成";
            $generatePlan_text["day"] = "第%u日";
            $generatePlan_text["starttime"] = "開始時間 (可填寫) (時時:分分)";
            $generatePlan_text["arrivingtime"] = "到達時間 (可填寫) (時時:分分)";
            $generatePlan_text["timespend1"] = "逗留時間: (請以分鐘輸入)";
            $generatePlan_text["type1"] = "類型: 開始地點";
            $generatePlan_text["type2"] = "類型: 景點";
            $generatePlan_text["type3"] = "類型: 結束地點";
            $generatePlan_text["type4"] = "類型: 住宿";
            $generatePlan_text["remove"] = "移除";
        }
        
    }
?>