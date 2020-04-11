<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $recovery_text["fieldrequired"] = "This field is required.";
            $recovery_text["invalidpassword"] = "Please use 8 or more characters with a mix of uppercase and lowercase letters, numbers & symbols.";
            $recovery_text["pwnotmatch"] = "Passwords do not match.";
            $recovery_text["accountrecovery"] = "Account recovery";
            $recovery_text["password"] = "password";
            $recovery_text["cpassword"] = "confirm password";
            $recovery_text["confirm"] = "confirm";
        } else if ($_SESSION["lang"] == "ZH") {
            $recovery_text["fieldrequired"] = "必填";
            $recovery_text["invalidpassword"] = "請使用8個或更多字符，並混合使用大寫和小寫字母，數字和符號的密碼";
            $recovery_text["pwnotmatch"] = "密碼不相同";
            $recovery_text["accountrecovery"] = "復原帳號";
            $recovery_text["password"] = "密碼";
            $recovery_text["cpassword"] = "確認密碼";
            $recovery_text["confirm"] = "確認";
        }
    }
?>