<?php
    if(!$_POST["load"]) {
        require("404.php");
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $required = true;
        require("setting_pw_text.php");
?>
        <h2><?php echo $setting_pw_text["chpw"];?></h2>
        <form id="ch_pw_frm">   
            <input type="password" name="o_password" placeholder="<?php echo $setting_pw_text["oldPassword"];?>">
            <span></span><br><br>
            <input type="password" name="password" placeholder="<?php echo $setting_pw_text["newPassword"];?>">
            <span></span><br><br>
            <input type="password" name="c_password" placeholder="<?php echo $setting_pw_text["confirmPassword"];?>">
            <span></span><br><br><span></span><br>
            <button style="width: 100px"><?php echo $setting_pw_text["submit"];?></button>
        </form>
        <script>
        $("document").ready(function() {
            function empty_input(e) {
                if (e.val() == "") {
                    e.next().text("* <?php echo $setting_pw_text["fieldrequired"]?>");
                    return true;
                }
                return false;
            }
            function check_pw(e) {
                var valid = true;
                if(!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+`~[{\]}\\|;:'",<.>\/?])(?=.{8,}).*$/.test(e.val()+""))) {
                    e.next().text("* <?php echo $setting_pw_text["invalidpassword"]?>");
                    valid = false;
                } else
                    e.next().text("");
                if(!(e.val()==e.parent().find('input[name="c_password"]').val())){
                    e.parent().find('input[name="c_password"]').next().text("* <?php echo $setting_pw_text["pwnotmatch"]?>");
                    valid = false
                } else
                    e.parent().find('input[name="c_password"]').next().text("");
                if(empty_input(e))
                    valid = false;
                return valid;
            }
            function check_cpw(e) {
                var valid = true;
                if(!(e.val()==e.parent().find('input[name="password"]').val())){
                    e.next().text("* <?php echo $setting_pw_text["pwnotmatch"]?>");
                    valid = false
                } else
                    e.next().text("");
                if(empty_input(e))
                    valid = false;
                return valid;
            }
            function check_opw(e) {
                var valid = true;
                if(empty_input(e))
                    valid = false;
                else
                    e.next().text("");
                return valid;
            }
            $("input[name='password']").on("keyup change", function() {
                check_pw($(this));
            })
            $("input[name='c_password']").on("keyup change", function() {
                check_cpw($(this));
            })
            $("input[name='o_password']").on("keyup change", function() {
                check_opw($(this));
            })
            $("#ch_pw_frm").submit(function(e) {
                e.preventDefault();
                var error = false;
                if (!check_opw($(this).find("input[name='opassword']")))
                    error = true;
                if (!check_pw($(this).find("input[name='password']")))
                    error = true;
                if (!check_cpw($(this).find("input[name='c_password']")))
                    error = true;
                if(!error) 
                    $("#load").load("ch_pw_process",$(this).serializeArray());
            })
        })
        </script>
<?php
    }
?>