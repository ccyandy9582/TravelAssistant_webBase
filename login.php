<?php require("html_start.php")?>
    <div id="login_container">
        <table id="login">
            <tr><td>
            <form id="login_form" method="post">
                <input type="text" placeholder="email" name="email">
                <span></span><br><br>
                <input type="password" placeholder="password" name="password">
                <span></span><br><br>
                <a style="color:blue">forgot password?</a>
                <center><button>login</button></center>
            </form>
            <form id="reg_form" class=hidden method="post">
                <input type="text" placeholder="email" name="email">
                <span></span><br><br>
                <input type="password" placeholder="password" name="password">
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
    </div>
<?php require("html_end.php")?>