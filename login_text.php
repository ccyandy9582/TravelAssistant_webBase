<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $login_text["login"] = "Login";
            $login_text["email"] = "email";
            $login_text["password"] = "password";
            $login_text["confirmpassword"] = "confirm password";
            $login_text["forgetpassword"] = "forgot password?";
            $login_text["signup"] = "Sign Up";
            $login_text["noaccount"] = "Don't have an account?";
            $login_text["haveaccount"] = "I have an account.";
            $login_text["accountrecovery"] = "Account recovery";
            $login_text["submit"] = "submit";
            $login_text["cancel"] = "cancel";
        } else if ($_SESSION["lang"] == "ZH") {
            $login_text["login"] = "登入";
            $login_text["email"] = "電郵";
            $login_text["password"] = "密碼";
            $login_text["confirmpassword"] = "確認密碼";
            $login_text["forgetpassword"] = "忘記密碼 ";
            $login_text["signup"] = " 註冊 ";
            $login_text["noaccount"] = "沒有帳戶?";
            $login_text["haveaccount"] = "我有帳戶";
            $login_text["accountrecovery"] = "請輸入電郵";
            $login_text["submit"] = "遞交";
            $login_text["cancel"] = "取消";
        }
        
    }
?>