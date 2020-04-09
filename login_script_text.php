<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $login_script_text["fieldrequired"] = "This field is required.";
            $login_script_text["invalidemail"] = "Email is not valid.";
            $login_script_text["invalidpassword"] = "Please use 8 or more characters with a mix of uppercase and lowercase letters, numbers & symbols.";
            $login_script_text["pwnotmatch"] = "Passwords do not match.";
        } else if ($_SESSION["lang"] == "ZH") {
            $login_script_text["fieldrequired"] = "必填";
            $login_script_text["invalidemail"] = "無效的電子郵件";
            $login_script_text["invalidpassword"] = "請使用8個或更多字符，並混合使用大寫和小寫字母，數字和符號的密碼";
            $login_script_text["pwnotmatch"] = "密碼不相同";
        }
    }
?>