<?php
    $required=1;require("html_start.php");
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
                            <center><h1>Login</h1></center>
                            <input type="text" placeholder="email" name="email">
                            <span></span><br><br>
                            <input type="password" placeholder="password" name="l_password">
                            <span></span><br><br>
                            <a id="forgot_pw_btn" style="color:blue">forgot password?</a>
                            <center><button>login</button></center>
                        </form>
                        <form id="reg_form" class=hidden method="post">
                            <center><h1>Sign Up</h1></center>
                            <input type="text" placeholder="email" name="email">
                            <span></span><br><br>
                            <input type="password" placeholder="password" class="validate" name="password">
                            <span></span><br><br>
                            <input type="password" placeholder="confirm password" name="c_password">
                            <span></span><br><br>
                            <center><button>Sign Up</button></center>
                        </form>
                    </td></tr>
                    </table
                    ><table id="login_switch">
                        <tr><td>
                        <span class="login_switch_msg">Don't have an account?</span><span class="login_switch_msg hidden">I have an account.</span><br><br>
                        <button id="login_switch_btn"><span>Sign Up</span><span class="hidden">login</span></button>
                        </td></tr>
                    </table>
                    <table id="forget_pw">
                        <tr><td>
                            <form>
                                <center><h1>Account recovery</h1></center>
                                <input name="email" type="text" placeholder="email">
                                <span></span><br><br>
                                <center><button>submit</button></center>
                            </form>
                            <span id="cancel_recovery">cancel &#9654;</span>
                        </td></tr>
                    </table>
                </br>
            </td></tr>
        </table>
    </div>
</div>
<?php require("html_end.php")?>