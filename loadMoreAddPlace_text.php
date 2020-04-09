<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $loadMoreAddPlace_text["add"] = "Add";
            $loadMoreAddPlace_text["loadmore"] = "load more";
            $loadMoreAddPlace_text["starttime"] = "starting time (optional) (hh:mm)";
            $loadMoreAddPlace_text["timespend"] = "spend time: (in min)";
            $loadMoreAddPlace_text["type"] = "Type: attraction";
            $loadMoreAddPlace_text["remove"] = "remove";
        } else if ($_SESSION["lang"] == "ZH") {
            $loadMoreAddPlace_text["add"] = "加入";
            $loadMoreAddPlace_text["loadmore"] = "載入更多";
            $loadMoreAddPlace_text["starttime"] = "開始時間 (可填寫) (時時:分分)";
            $loadMoreAddPlace_text["timespend"] = "逗留時間: (請以分鐘輸入)";
            $loadMoreAddPlace_text["type"] = "類型: 景點";
            $loadMoreAddPlace_text["remove"] = "移除";
        }
        
    }
?>