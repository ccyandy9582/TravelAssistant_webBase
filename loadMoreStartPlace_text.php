<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $loadMoreStartPlace_text["setPoint"] = "Set as starting point";
            $loadMoreStartPlace_text["loadmore"] = "load more";
            $loadMoreStartPlace_text["starttime"] = "starting time (optional) (hh:mm)";
            $loadMoreStartPlace_text["timespend"] = "spend time: (in min)";
            $loadMoreStartPlace_text["remove"] = "remove";
            $loadMoreStartPlace_text["startpoint"] = "Set Starting Point";
            $loadMoreStartPlace_text["type"] = "Type: starting point";
        } else if ($_SESSION["lang"] == "ZH") {
            $loadMoreStartPlace_text["setPoint"] = "設定為開始地點";
            $loadMoreStartPlace_text["loadmore"] = "載入更多";
            $loadMoreStartPlace_text["starttime"] = "開始時間 (可填寫) (時時:分分)";
            $loadMoreStartPlace_text["timespend"] = "逗留時間: (請以分鐘輸入)";
            $loadMoreStartPlace_text["remove"] = "移除";
            $loadMoreStartPlace_text["startpoint"] = "選擇開始地點";
            $loadMoreStartPlace_text["type"] = "類型: 開始地點";
        }
        
    }
?>