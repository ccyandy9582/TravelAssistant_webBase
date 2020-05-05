<?php
    if (!isset($required)) {
        require("404.php");
    } else {
        require("login_script_text.php");
?>
<script>
    $("document").ready(function() {
        function empty_input(e) {
            if (e.val() == "") {
                e.next().text("* <?php echo $login_script_text["fieldrequired"]?>");
                return true;
            }
            return false;
        }
        function check_email(e) {
            var valid = true;
            if (!(/^(?!\.)(?!.*\.$)(?!.*?\.\.)(?!.*?\.@)[\w\.]+@\w+\.[\w\.]+$/.test(e.val()+""))) {
                e.next().text("* <?php echo $login_script_text["invalidemail"] ?>");
                valid = false;
            } else 
                e.next().text("");
            if(empty_input(e)) 
                valid = false;
            return valid;
        }
        function check_pw(e) {
            var valid = true;
            if(!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+`~[{\]}\\|;:'",<.>\/?])(?=.{8,})(?!.*[^\\w!@#$%^&*()\-_=+`~[{\]}\\|;:'",<.>\/?]).*$/.test(e.val()+""))) {
                e.next().text("* <?php echo $login_script_text["invalidpassword"]?>");
                valid = false;
            } else
                e.next().text("");
            if(!(e.val()==e.parent().find('input[name="c_password"]').val())){
                e.parent().find('input[name="c_password"]').next().text("* <?php echo $login_script_text["pwnotmatch"]?>");
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
                e.next().text("* <?php echo $login_script_text["pwnotmatch"]?>");
                valid = false
            } else
                e.next().text("");
            if(empty_input(e))
                valid = false;
            return valid;
        }
        function check_lpw(e) {
            var valid = true;
            if(empty_input(e))
                valid = false;
            else
                e.next().text("");
            return valid;
        }
        $("input[name='email']").on("keyup change",function() {
            check_email($(this));
        })
        $("input[name='password']").on("keyup change", function() {
            check_pw($(this));
        })
        $("input[name='c_password']").on("keyup change", function() {
            check_cpw($(this));
        })
        $("input[name='l_password']").on("keyup change", function() {
            check_lpw($(this));
        })
        $("#login_form").submit(function(e) {
            e.preventDefault();
            var error = false;
            if (!check_email($(this).find("input[name='email']")))
                error = true;
            if (!check_lpw($(this).find("input[name='l_password']")))
                error = true;
            if(!error)
                $("#load").load("login_process",$(this).serializeArray());
        })
        $("#reg_form").submit(function(e) {
            e.preventDefault();
            var error = false;
            if (!check_email($(this).find("input[name='email']")))
                error = true;
            if (!check_pw($(this).find("input[name='password']")))
                error = true;
            if (!check_pw($(this).find("input[name='c_password']")))
                error = true;
            if(!error)
                $("#load").load("register_process",$(this).serializeArray());
        })
        $("#recovery_form").submit(function(e) {
            e.preventDefault();
            var error = false;
            if (!check_email($(this).find("input[name='email']")))
                error = true;
            if(!error)
            $("#load").load("recovery_process",$(this).serializeArray());
        })
    })
</script>
<?php
    }
?>