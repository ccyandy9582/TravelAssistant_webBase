<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $ch_pw_process_text["pwsame"] = "New and old password are the same";
            $ch_pw_process_text["pwchanged"] = "Password has been changed";
            $ch_pw_process_text["wrongpw"] = "Wrong password";
        } else if ($_SESSION["lang"] == "ZH") {
            $ch_pw_process_text["pwsame"] = "新和舊密碼相同";
            $ch_pw_process_text["pwchanged"] = "密碼更改成功";
            $ch_pw_process_text["wrongpw"] = "密碼錯誤";
        }
        
    }
?>