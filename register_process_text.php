<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $register_process_text["emailsent"] = "A confirmation email has been send to ".$email.".<br>Please activate your account in 30 minutes.<br>Thank you for registering!";
            $register_process_text["emailused"] = "This email has already been used.";
    
        } else if ($_SESSION["lang"] == "ZH") {
            $register_process_text["emailsent"] = "一封確認電郵已傳送到".$email."<br>請於30分鐘內激活你的帳號";
            $register_process_text["emailused"] = " 此電郵已被註冊";
    
        }
        
    }
?>