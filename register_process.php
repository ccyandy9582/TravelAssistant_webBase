<?php 
    // echo password_hash($_POST["password"], PASSWORD_BCRYPT);
    // echo "<br>".strlen('$2y$10$GoMVmM/EF2AigmhsFj66out2YPhW27oqNfsLsbIQwyi2nbPXbQ9HG');

    if(isset($_POST["password"])&&isset($_POST["c_password"])&&isset($_POST["email"])) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_POST["password"] = addslashes($_POST["password"]);
        $_POST["c_password"] = addslashes($_POST["c_password"]);
        $_POST["email"] = addslashes($_POST["email"]);
        $error=false;
        $email = trim($_POST["email"]);
        if (!(preg_match("/^(?!\\.)(?!.*\\.$)(?!.*?\\.\\.)[\\w\\.]+@\\w+\\.[\\w\\.]+$/", $email)))
            $error=true;
        if (!(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()-_=+`~[{\]}\\\\|;:'\",<.>\/?])(?=.{8,})/",$_POST["password"])))
            $error=true;
        if ($_POST["password"]!=$_POST["c_password"])
            $error=true;
    } else {
        require("404.php");
    }
    if($error) {
        echo "
            <script>
                alert('Error!\\nSomething went wrong');
                window.location.replace('login');
            </script>
        ";
    } else {
        $required=true;
        require("register_process_text.php");
        require("database.php");
        $secret=md5(uniqid(rand(), true));
        $sql="INSERT INTO user (email, password, secret, action_time) VALUES ('$email', '{$_POST["password"]}', '$secret', now())";
        if ($conn->query($sql) === TRUE) {
?>
            <script>
                $("#popout p").html("<?php echo $register_process_text["emailsent"]?>");
                $("#popout").show();
            </script>
<?php
            require("mail_reg.php");
        } else {
            $sql="SELECT email, now() - action_time AS time, activated FROM user WHERE email='$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                if($row = $result->fetch_assoc()) {
                    if ($row["time"]<=1800 || $row["activated"]==1) {
                        echo <<<EOF
                        <script>
                            $("#reg_form").find("input[name=email]").next().text("* {$register_process_text["emailused"]}");
                        </script>
EOF;
                    } else {
                        $sql = "UPDATE user SET action_time = now(), password = '{$_POST["password"]}', secret = '$secret' WHERE email = '$email'";
                        if ($conn->query($sql) === TRUE) {
?>
                            <script>
                                $("#popout p").html("<?php echo $register_process_text["emailsent"]?>");
                                $("#popout").show();
                            </script>
<?php
                            require("mail_reg.php");
                        }
                    }
                }
            } else {
                echo <<<EOF
                <script>
                    alert("ERROR!\\r\\nSomething went wrong please try again.")
                </script>
EOF;
            }
        }
        $conn->close();
    }
    ?>