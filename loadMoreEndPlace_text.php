<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $loadMoreEndPlace_text["setPoint"] = "Set as ending point";
            $loadMoreEndPlace_text["loadmore"] = "load more";
            $loadMoreEndPlace_text["arrivingtime"] = "arriving time (optional) (hh:mm)";
            $loadMoreEndPlace_text["remove"] = "remove";
            $loadMoreEndPlace_text["endpoint"] = "Set Ending Point";
            $loadMoreEndPlace_text["type"] = "Type: ending point";
        } else if ($_SESSION["lang"] == "ZH") {
            $loadMoreEndPlace_text["setPoint"] = "設定為結束地點";
            $loadMoreEndPlace_text["loadmore"] = "載入更多";
            $loadMoreEndPlace_text["arrivingtime"] = "到達時間 (可填寫) (時時:分分)";
            $loadMoreEndPlace_text["remove"] = "移除";
            $loadMoreEndPlace_text["endpoint"] = "選擇結束地點";
            $loadMoreEndPlace_text["type"] = "類型: 結束地點";
        }
        
    }
?>