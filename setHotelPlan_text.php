<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $setHotelPlan_text["choosetitle"] = "Choose Your Hotel";
            $setHotelPlan_text["search"] = "search";
            $setHotelPlan_text["changeall"] = "Choose this hotel for all day(s).";
            $setHotelPlan_text["choosehotel"] = "Choose this hotel";
            $setHotelPlan_text["loadmore"] = "load more";
            $setHotelPlan_text["type"] = "Type: Hotel";
            $setHotelPlan_text["remove"] = "remove";
            $setHotelPlan_text["sethotel"] = "Set Hotel";
        } else if ($_SESSION["lang"] == "ZH") {
            $setHotelPlan_text["choosetitle"] = "住宿";
            $setHotelPlan_text["search"] = "搜尋";
            $setHotelPlan_text["changeall"] = "改變每一天的住宿";
            $setHotelPlan_text["choosehotel"] = "選擇此住宿";
            $setHotelPlan_text["loadmore"] = "載入更多";
            $setHotelPlan_text["type"] = "類型: 住宿";
            $setHotelPlan_text["remove"] = "移除";
            $setHotelPlan_text["sethotel"] = "選擇住宿";
        }
        
    }
?>