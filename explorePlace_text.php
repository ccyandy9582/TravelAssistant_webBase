<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $explorePlace_text["exploreplace"] = "Explore places";
        } else if ($_SESSION["lang"] == "ZH") {
            $explorePlace_text["exploreplace"] = "探索地點";
        }
        
    }
?>