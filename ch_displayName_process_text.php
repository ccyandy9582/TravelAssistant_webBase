<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $ch_displayName_process_text["empty"] = "Display name must not be empty";
            $ch_displayName_process_text["used"] = "This name has been used";
        } else if ($_SESSION["lang"] == "ZH") {
            $ch_displayName_process_text["empty"] = "顯示名稱不能為空值";
            $ch_displayName_process_text["used"] = "此名稱已被使用";
        }
        
    }
?>