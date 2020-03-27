<?php 
    // echo password_hash($_POST["password"], PASSWORD_BCRYPT);
    // echo "<br>".strlen('$2y$10$GoMVmM/EF2AigmhsFj66out2YPhW27oqNfsLsbIQwyi2nbPXbQ9HG');

    if(isset($_POST["password"])&&isset($_POST["c_password"])&&isset($_POST["email"])) {
        $error=false;
        if (!(preg_match("/^.+@.+\\..+$/", $_POST["email"])))
            $error=true;
        if (!(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()-_=+`~[{\]}\\\\|;:'\\\",<.>\/?])(?=.{8,})/",$_POST["password"])))
            $error=true;
        if ($_POST["password"]!=$_POST["c_password"])
            $error=true;
    } else {
        $error=true;
    }
    if($error) {
        echo "
            <script>
                alert('Error!\\nSomething went wrong');
                window.location.replace('login.php');
            </script>
        ";
    } else {
        $required=true;
        require("database.php");
        $secret=md5(uniqid(rand(), true));
        $sql="INSERT INTO user (email, password, secret, action_time) VALUES ('{$_POST["email"]}', '{$_POST["password"]}', '$secret', now())";
        if ($conn->query($sql) === TRUE) {
?>
            <script>
                $("#popout p").html("A confirmation email has been send to <?php echo $_POST["email"]?>.<br>Thank you for registering!");
                $("#popout").show();
            </script>
<?php
            require("mail_reg.php");
        } else {
            $sql="SELECT email FROM user WHERE email='{$_POST["email"]}'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo <<<EOF
                    <script>
                        $("#reg_form").find("input[name=email]").next().text("* This email has already been used.");
                    </script>
EOF;
            } else {
                echo <<<EOF
                <script>
                    alert("ERROR!\r\nSomething went wrong please try again.")
                </script>
EOF;
            }
        }
        $conn->close();
    }
    ?>