<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $resultPage_text["regen"] = "Regenerate";
            $resultPage_text["save"] = "save";
            $resultPage_text["spendtime"] = "Spend time";
            $resultPage_text["type"] = "Type";
            $resultPage_text["start"] = "Starting point";
            $resultPage_text["Attraction"] = "Attraction";
            $resultPage_text["end"] = "Ending point";
            $resultPage_text["startTime"] = "starting time";
            $resultPage_text["viewRoute"] = "View route";
        } else if ($_SESSION["lang"] == "ZH") {
            $resultPage_text["regen"] = "再來一遍";
            $resultPage_text["save"] = "儲存";
            $resultPage_text["spendtime"] = " 時間";
            $resultPage_text["type"] = "類型";
            $resultPage_text["start"] = "開始地點";
            $resultPage_text["Attraction"] = "景點";
            $resultPage_text["end"] = "結束地點";
            $resultPage_text["startTime"] = "開始時間";
            $resultPage_text["viewRoute"] = "檢視路線";
        }
    }
?>