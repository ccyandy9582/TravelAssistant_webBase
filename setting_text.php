<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $setting_text["pw"] = "password";
            $setting_text["name"] = "display name";
        } else if ($_SESSION["lang"] == "ZH") {
            $setting_text["pw"] = "密碼";
            $setting_text["name"] = "顯示名稱";
        }
        
    }
?>