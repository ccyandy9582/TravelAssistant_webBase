<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $home_text["plantrip"] = "PLAN YOUR TRIP";
            $home_text["country"] = "Country";
            $home_text["selectcountry"] = "------ SELECT A COUNTRY ------";
            $home_text["participant"] = "Number of participant";
            $home_text["from"] = "From";
            $home_text["to"] = "To";
            $home_text["transport"] = "I will travel by transport in this trip.";
            $home_text["nextstep"] = "Next Step";
        } else if ($_SESSION["lang"] == "ZH") {
            $home_text["plantrip"] = "計劃你的行程";
            $home_text["country"] = "城市";
            $home_text["selectcountry"] = "--------------- 選擇城市 ---------------";
            $home_text["participant"] = "人數";
            $home_text["from"] = "由";
            $home_text["to"] = "到";
            $home_text["transport"] = "我會使用交通工具";
            $home_text["nextstep"] = "下一步";
        }
        
    }
?>