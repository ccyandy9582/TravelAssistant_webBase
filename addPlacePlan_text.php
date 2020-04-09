<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $addPlacePlan_text["choosetitle"] = "Add a location";
            $addPlacePlan_text["touristattraction"] = "tourist attraction";
            $addPlacePlan_text["amusementpark"] = "amusement park";
            $addPlacePlan_text["museum"] = "museum";
            $addPlacePlan_text["aquarium"] = "aquarium";
            $addPlacePlan_text["naturalfeature"] = "natural feature";
            $addPlacePlan_text["zoo"] = "zoo";
            $addPlacePlan_text["anytype"] = "any type";
            $addPlacePlan_text["search"] = "search";
            $addPlacePlan_text["add"] = "Add";
            $addPlacePlan_text["loadmore"] = "load more";
            $addPlacePlan_text["starttime"] = "starting time (optional) (hh:mm)";
            $addPlacePlan_text["timespend"] = "spend time: (in min)";
            $addPlacePlan_text["type"] = "Type: attraction";
            $addPlacePlan_text["remove"] = "remove";
        } else if ($_SESSION["lang"] == "ZH") {
            $addPlacePlan_text["choosetitle"] = "景點";
            $addPlacePlan_text["touristattraction"] = "旅遊景點";
            $addPlacePlan_text["amusementpark"] = "遊樂園";
            $addPlacePlan_text["museum"] = "博物館";
            $addPlacePlan_text["aquarium"] = "水族館";
            $addPlacePlan_text["naturalfeature"] = "自然景觀";
            $addPlacePlan_text["zoo"] = "動物園";
            $addPlacePlan_text["anytype"] = "任何類型";
            $addPlacePlan_text["search"] = "搜尋";
            $addPlacePlan_text["add"] = "加入";
            $addPlacePlan_text["loadmore"] = "載入更多";
            $addPlacePlan_text["starttime"] = "開始時間 (可填寫) (時時:分分)";
            $addPlacePlan_text["timespend"] = "逗留時間: (請以分鐘輸入)";
            $addPlacePlan_text["type"] = "類型: 景點";
            $addPlacePlan_text["remove"] = "移除";
        }
        
    }
?>