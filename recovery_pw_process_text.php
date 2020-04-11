<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $recovery_pw_process_text["pwchanged"] = "Your password has been changed!";
        } else if ($_SESSION["lang"] == "ZH") {
            $recovery_pw_process_text["pwchanged"] = "已成功更變密碼";
        }
    }
?>