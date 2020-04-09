<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $mail_recovery_text["title"] = "hochilltrip -- Account recovery";
            $mail_recovery_text["content"] = "<span style='color:black'>We have received your account recovery request.<br>You can click </span><a href='http://".$_SERVER["HTTP_HOST"]."/fyp/recovery?code=".$secret."'>here</a><span style='color:black'> or use the following link to change your password.</span><br>http://".$_SERVER["HTTP_HOST"]."/fyp/recovery?code=".$secret;
        } else if ($_SESSION["lang"] == "ZH") {
            $mail_recovery_text["title"] = "hochilltrip -- 帳戶復原";
            $mail_recovery_text["content"] = "<span style='color:black'>們已收到你要求復原將活的請求。<br></span><a href='http://".$_SERVER["HTTP_HOST"]."/fyp/recovery?code=".$secret."'>請按此連結</a><span style='color:black'>或使用以下連結來更改你的密碼。</span><br>http://".$_SERVER["HTTP_HOST"]."/fyp/recovery?code=".$secret;
        }
        
    }
?>