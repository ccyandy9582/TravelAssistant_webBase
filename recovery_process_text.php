<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $recovery_process_text["activemail"] = "Please activate this email first.";
            $recovery_process_text["emailsent"] = "An account recovery email has been send to <?php echo $email?>.<br>You can change your password within 30 minutes.";
    
        } else if ($_SESSION["lang"] == "ZH") {
            $recovery_process_text["activemail"] = "此電子郵件尚未激活";
            $recovery_process_text["emailsent"] = "一封確認電郵已傳送到".$email."<br>你可在30分鐘內更變你的密碼";
        }
    }
?>