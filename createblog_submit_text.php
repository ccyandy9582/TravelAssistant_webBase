<?php 
    if (isset($required)) {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "EN";
        }
        if ($_SESSION["lang"] == "EN") {
            $createblog_submit_text["msg"]='Please set your display name before posting comment.<br>You can set it <a target="_blank" style="color:blue" href="setting?type=name">here</a>';
        } else if ($_SESSION["lang"] == "ZH") {
            $createblog_submit_text["msg"]='請在留言前設定顯示名稱<br>顯示名稱可在<a target="_blank" style="color:blue" href="setting?type=name">這裏</a>設定';
        }
        
    }
?>