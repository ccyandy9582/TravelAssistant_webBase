<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $place_text["notFound"]="Place not found";
            $place_text["phone"] = "Phone No.";
            $place_text["address"] = "Address";
            $place_text["businessHour"] = "Business Hour";
            $place_text["averagetime"] = "Average stay time";
            $place_text["post"] = "post";
            $place_text["comments"] = "Comments";
            $place_text["rating"] = "Rating";
            $place_text["page"] = "page";
            $place_text["nodisplaynamemsg"] = "page";
        } else if ($_SESSION["lang"] == "ZH") {
            $place_text["notFound"]="此地方不存在";
            $place_text["phone"] = "Phone No.";
            $place_text["address"] = "地址";
            $place_text["businessHour"] = "營業時間";
            $place_text["averagetime"] = "平均逗留時間";
            $place_text["comments"] = "留言";
            $place_text["post"] = "發布";
            $place_text["rating"] = "評分";
            $place_text["page"] = "頁";
            $place_text["nodisplaynamemsg"] = "page";
        }
        
    }
?>