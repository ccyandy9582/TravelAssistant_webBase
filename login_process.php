<?php 
    // echo password_hash($_POST["password"], PASSWORD_BCRYPT);
    // echo "<br>".strlen('$2y$10$GoMVmM/EF2AigmhsFj66out2YPhW27oqNfsLsbIQwyi2nbPXbQ9HG');

    if(isset($_POST["l_password"])&&isset($_POST["email"])) {
        $error=false;
        if (!(preg_match("/^.+@.+\\..+$/", $_POST["email"])))
            $error=true;
            if (!strlen($_POST["l_password"]) > 0)
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
        $sql="SELECT userid, activated FROM user WHERE email='{$_POST["email"]}' AND password = '{$_POST["l_password"]}'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row["activated"]==1) {
                    SESSION_START();
                    $_SESSION["userid"] = $row["userid"];
                    header("Location: home");
                } else {
                    echo <<<EOF
                    <script>
                        $("#login_form").find("input[name=l_password]").next().text("* Your account has not been activated.");
                    </script>
EOF;
                }
            }
        } else {
            echo <<<EOF
            <script>
                $("#login_form").find("input[name=l_password]").next().text("* Wrong email or password");
            </script>
EOF;
        }
        $conn->close();
    }
    ?>