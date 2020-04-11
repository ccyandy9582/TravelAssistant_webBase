<?php 
    if (!isset($_GET["code"])) {
        header("Location: home");
    } else {
        $required = 1;
        require("html_start.php");
        require("database.php");
        require("recovery_text.php");
        $sql = "SELECT userID FROM user WHERE secret = '".$_GET["code"]."' AND TIMESTAMPDIFF(SECOND,action_time , now()) <= 1800";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
?>
            <h2><?php echo $recovery_text["accountrecovery"]?></h2>
            <form id="recovery_pw_form">
                <input type="hidden" value="<?php echo $_GET["code"]?>" name="code">
                <input name="password" type="password" placeholder="<?php echo $recovery_text["password"]?>"><br>
                <span></span><br>
                <input name="c_password" type="password" placeholder="<?php echo $recovery_text["cpassword"]?>"><br>
                <span></span><br>
                <button style="width: 100px"><?php echo $recovery_text["confirm"]?></button>
            </form>
            <script>
                function empty_input(e) {
                    if (e.val() == "") {
                        e.next().next().text("* <?php echo $recovery_text["fieldrequired"]?>");
                        return true;
                    }
                    return false;
                }
                function check_pw(e) {
                    var valid = true;
                    if(!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()-_=+`~[{\]}\\|;:'",<.>\/?])(?=.{8,})/.test(e.val()+""))) {
                        e.next().next().text("* <?php echo $recovery_text["invalidpassword"]?>");
                        valid = false;
                    } else
                        e.next().next().text("");
                    if(!(e.val()==e.parent().find('input[name="c_password"]').val())){
                        e.parent().find('input[name="c_password"]').next().next().text("* <?php echo $recovery_text["pwnotmatch"]?>");
                        valid = false
                    } else
                        e.parent().find('input[name="c_password"]').next().next().text("");
                    if(empty_input(e))
                        valid = false;
                    return valid;
                }
                function check_cpw(e) {
                    var valid = true;
                    if(!(e.val()==e.parent().find('input[name="password"]').val())){
                        e.next().next().text("* <?php echo $recovery_text["pwnotmatch"]?>");
                        valid = false
                    } else
                        e.next().next().text("");
                    if(empty_input(e))
                        valid = false;
                    return valid;
                }
                $("input[name='password']").on("keyup change", function() {
                    check_pw($(this));
                })
                $("input[name='c_password']").on("keyup change", function() {
                    check_cpw($(this));
                })
                $("#recovery_pw_form").submit(function(e) {
                    e.preventDefault();
                    var error = false;
                    if (!check_pw($(this).find("input[name='password']")))
                        error = true;
                    if (!check_pw($(this).find("input[name='c_password']")))
                        error = true;
                    if(!error)
                        $("#load").load("recovery_pw_process",$(this).serializeArray());
                })
            </script>
<?php
        } else {
            echo "30 minutes have been passed since you start the recovery process.<br>Please try again.";
        }
        $conn->close();
        require("html_end.php");
    }
?>