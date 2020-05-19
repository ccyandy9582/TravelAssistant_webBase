<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $login_process_text["banned"] = "Your account has been banned.";
            $login_process_text["unactivated"] = "Your account has not been activated.";
            $login_process_text["wronglogin"] = "Wrong email or password.";
        } else if ($_SESSION["lang"] == "ZH") {
            $login_process_text["banned"] = "此帳號已被封鎖";
            $login_process_text["unactivated"] = "此帳號尚未激活";
            $login_process_text["wronglogin"] = "電郵或密碼錯誤";
        }
    }
?>