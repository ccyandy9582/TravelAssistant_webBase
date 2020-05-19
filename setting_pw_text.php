<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $setting_pw_text["chpw"] = "change password";
            $setting_pw_text["fieldrequired"] = "This field is required.";
            $setting_pw_text["invalidpassword"] = "Please use 8 or more characters with a mix of uppercase and lowercase letters, numbers & symbols.";
            $setting_pw_text["pwnotmatch"] = "Passwords do not match.";
            $setting_pw_text["oldPassword"] = "old password";
            $setting_pw_text["newPassword"] = "new password";
            $setting_pw_text["confirmPassword"] = "confirm password";
            $setting_pw_text["submit"] = "submit";
        } else if ($_SESSION["lang"] == "ZH") {
            $setting_pw_text["chpw"] = "更改密碼";
            $setting_pw_text["fieldrequired"] = "必填";
            $setting_pw_text["invalidpassword"] = "請使用8個或更多字符，並混合使用大寫和小寫字母，數字和符號的密碼";
            $setting_pw_text["pwnotmatch"] = "密碼不相同";
            $setting_pw_text["oldPassword"] = "舊密碼";
            $setting_pw_text["newPassword"] = "新密碼";
            $setting_pw_text["confirmPassword"] = "確認密碼";
            $setting_pw_text["submit"] = "遞交";
        }
    }
?>