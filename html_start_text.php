<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $html_start_text["login"] = "Login";
            $html_start_text["blog"] = "Blog";
            $html_start_text["myaccount"] = "My Account";
            $html_start_text["myplan"] = "My Plan";
            $html_start_text["setting"] = "Setting";
            $html_start_text["unban"] = "Unban user";
            $html_start_text["logout"] = "Logout";
            $html_start_text["language"] = "Language";
        } else if ($_SESSION["lang"] == "ZH") {
            $html_start_text["login"] = "登入";
            $html_start_text["blog"] = "探索行程";
            $html_start_text["myaccount"] = "我的帳戶";
            $html_start_text["myplan"] = "我的行程";
            $html_start_text["setting"] = "設定";
            $html_start_text["unban"] = "解除封鎖用家";
            $html_start_text["logout"] = "登出";
            $html_start_text["language"] = "語言";
        }
    }
?>