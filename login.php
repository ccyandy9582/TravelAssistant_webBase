<?php require("html_start.php")?>
    <div id="login_background" src="imgs/login.jpg">
    <div id="login_container">
        <table id="login">
            <tr><td>
            <a style="color:blue; position: absolute; bottom:0; left:0">forgot password?</a>
            <form id="login_form">
                <input type="text" placeholder="email" name="email">
                <span></span><br><br>
                <input type="password" placeholder="password" name="password"><br><br>
                <center><button>login</button></center>
            </form>
            <form id="reg_form" class=hidden>
                <input type="text" placeholder="email" name="email">
                <span></span><br><br>
                <input type="password" placeholder="password"><br><br>
                <input type="password" placeholder="confirm password"><br><br>
                <center><button>register</button></center>
            </form>
        </td></tr>
        </table
        ><table id="login_switch">
            <tr><td>
            <button class="login_switch_btn"><span>register</span><span class="hidden">login</span></button>
            </td></tr>
        </table>
    </div>
<?php require("html_end.php")?>