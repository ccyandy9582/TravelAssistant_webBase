<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $mail_reg_text["title"] = "Registration on hochilltrip";
            $mail_reg_text["content"] = "<span style='color:black'>Thank you for registering!<br>Please click </span><a href='http://".$_SERVER["HTTP_HOST"]."/fyp/login?regid=".$secret."'>here</a><span style='color:black'> or use the following link to activate your account.</span><br>http://".$_SERVER["HTTP_HOST"]."/fyp/login?regid=".$secret;
        } else if ($_SESSION["lang"] == "ZH") {
            $mail_reg_text["title"] = "hochilltrip -- 註冊郵件";
            $mail_reg_text["content"] = "<span style='color:black'>感謝您的註冊！<br></span><a href='http://".$_SERVER["HTTP_HOST"]."/fyp/login?regid=".$secret."'>請按此連結</a><span style='color:black'>或使用以下連結來激我你的帳號。</span><br>http://".$_SERVER["HTTP_HOST"]."/fyp/login?regid=".$secret;    
        }
        
    }
?>