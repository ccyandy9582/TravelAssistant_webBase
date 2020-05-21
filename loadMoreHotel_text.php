<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $loadMoreHotel_text["choosehotel"] = "Choose this hotel";
            $loadMoreHotel_text["loadmore"] = "load more";
            $loadMoreHotel_text["type"] = "Type: Hotel";
            $loadMoreHotel_text["remove"] = "remove";
            $loadMoreHotel_text["sethotel"] = "Set Hotel";
        } else if ($_SESSION["lang"] == "ZH") {
            $loadMoreHotel_text["choosehotel"] = "選擇此住宿";
            $loadMoreHotel_text["loadmore"] = "載入更多";
            $loadMoreHotel_text["type"] = "類型: 住宿";
            $loadMoreHotel_text["remove"] = "移除";
            $loadMoreHotel_text["sethotel"] = "選擇住宿";
        }
        
    }
?>