<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $plan_text["notFound"] = "Plan not found";
            $plan_text["duplicate"] = "Edit and save as new plan";
            $plan_text["toblog"] = "Create blog with this plan";
            $plan_text["save"] = "save";
            $plan_text["spendtime"] = "Spend time";
            $plan_text["type"] = "Type";
            $plan_text["start"] = "Starting point";
            $plan_text["Attraction"] = "Attraction";
            $plan_text["end"] = "Ending point";
            $plan_text["startTime"] = "starting time";
            $plan_text["viewRoute"] = "View route";
        } else if ($_SESSION["lang"] == "ZH") {
            $plan_text["notFound"]="此行程不存在";
            $plan_text["duplicate"] = "編輯並儲存為新行程";
            $plan_text["toblog"] = "分享此行程";
            $plan_text["save"] = "儲存";
            $plan_text["spendtime"] = " 時間";
            $plan_text["type"] = "類型";
            $plan_text["start"] = "開始地點";
            $plan_text["Attraction"] = "景點";
            $plan_text["end"] = "結束地點";
            $plan_text["startTime"] = "開始時間";
            $plan_text["viewRoute"] = "檢視路線";
        }
    }
?>