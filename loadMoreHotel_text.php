<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $loadMoreHotel_text["choosehotel"] = "Choose this hotel";
            $loadMoreHotel_text["type"] = "Type: Hotel";
            $loadMoreHotel_text["remove"] = "remove";
            $loadMoreHotel_text["sethotel"] = "Set Hotel";
        } else if ($_SESSION["lang"] == "ZH") {
            $loadMoreHotel_text["choosetitle"] = "選擇此酒店";
            $loadMoreHotel_text["type"] = "類型: 酒店";
            $loadMoreHotel_text["remove"] = "移除";
            $loadMoreHotel_text["sethotel"] = "選擇酒店";
        }
        
    }
?>