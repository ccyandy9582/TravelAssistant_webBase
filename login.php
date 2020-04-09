<?php
    $required=1;require("html_start.php");
    require("login_script.php");
    require("login_text.php");
    if (isset($_GET["regid"])) {
        $id = $_GET["regid"];
        require("database.php");
        $sql = "UPDATE user SET activated=true WHERE secret='$id' AND now() - action_time <= 1800";

        if ($conn->query($sql) === TRUE) {
            if (mysqli_affected_rows($conn) == 1) {
                echo <<<EOF
                <script>
                    $("#popout p").text("Your account has been activated.");
                    $("#popout").show();
                </script>
EOF;
            } else {
                echo <<<EOF
                <script>
                    $("#popout p").text("Wrong/expired activation code, or activation has already been made.");
                    $("#popout").show();
                </script>
EOF;
            }
        }
        $conn->close();
    } else {
        if (isset($_SESSION["userid"])) {
            header("Location: home");
        }
    }
?>
<div id="login_background">
    <div id="login_align_container">
        <table id="login_align">
            <tr><td>
                <div id="login_container">
                    <table id="login">
                        <tr><td>
                        <form id="login_form" method="post">
                            <center><h1><?php echo $login_text["login"]?></h1></center>
                            <input type="text" placeholder="<?php echo $login_text["email"]?>" name="email">
                            <span></span><br><br>
                            <input type="password" placeholder="<?php echo $login_text["password"]?>" name="l_password">
                            <span></span><br><br>
                            <a id="forgot_pw_btn" style="color:blue"><?php echo $login_text["forgetpassword"]?></a>
                            <center><button><?php echo $login_text["login"]?></button></center>
                        </form>
                        <form id="reg_form" class=hidden method="post">
                            <center><h1><?php echo $login_text["signup"]?></h1></center>
                            <input type="text" placeholder="<?php echo $login_text["email"]?>" name="email">
                            <span></span><br><br>
                            <input type="password" placeholder="<?php echo $login_text["password"]?>" class="validate" name="password">
                            <span></span><br><br>
                            <input type="password" placeholder="<?php echo $login_text["confirmpassword"]?>" name="c_password">
                            <span></span><br><br>
                            <center><button><?php echo $login_text["signup"]?></button></center>
                        </form>
                    </td></tr>
                    </table
                    ><table id="login_switch">
                        <tr><td>
                        <span class="login_switch_msg"><?php echo $login_text["noaccount"]?></span><span class="login_switch_msg hidden"><?php echo $login_text["haveaccount"]?></span><br><br>
                        <button id="login_switch_btn"><span><?php echo $login_text["signup"]?></span><span class="hidden"><?php echo $login_text["login"]?></span></button>
                        </td></tr>
                    </table>
                    <table id="forget_pw">
                        <tr><td>
                            <form id="recovery_form">
                                <center><h1><?php echo $login_text["accountrecovery"]?></h1></center>
                                <input name="email" type="text" placeholder="<?php echo $login_text["email"]?>">
                                <span></span><br><br>
                                <center><button><?php echo $login_text["submit"]?></button></center>
                            </form>
                            <span id="cancel_recovery"><?php echo $login_text["cancel"]?> &#9654;</span>
                        </td></tr>
                    </table>
                </br>
            </td></tr>
        </table>
    </div>
</div>
<?php require("html_end.php")?>