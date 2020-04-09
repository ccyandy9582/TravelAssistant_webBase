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
            $generatePlan_text["hotel"] = "Set Hotel";
            $generatePlan_text["generate"] = "generate";
            $generatePlan_text["day"] = "day %u";
        } else if ($_SESSION["lang"] == "ZH") {
            $generatePlan_text["placetogo"] = "希望去的景點";
            $generatePlan_text["add"] = " 添加";
            $generatePlan_text["startpoint"] = "選擇開始地點";
            $generatePlan_text["endingpoint"] = "選擇結束地點";
            $generatePlan_text["hotel"] = "選擇酒店";
            $generatePlan_text["generate"] = "生成";
            $generatePlan_text["day"] = "第%u日";
        }
        
    }
?>