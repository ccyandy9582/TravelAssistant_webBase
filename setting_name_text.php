<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $setting_name_text["ch_dname"] = "change display name";
            $setting_name_text["submit"] = "submit";
            $setting_name_text["currentName"] = "Current display name";
        } else if ($_SESSION["lang"] == "ZH") {
            $setting_name_text["ch_dname"] = "更改顯示名稱";
            $setting_name_text["submit"] = "遞交";
            $setting_name_text["currentName"] = "目前顯示名稱";
        }
    }
?>