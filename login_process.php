<?php 
    // echo password_hash($_POST["password"], PASSWORD_BCRYPT);
    // echo "<br>".strlen('$2y$10$GoMVmM/EF2AigmhsFj66out2YPhW27oqNfsLsbIQwyi2nbPXbQ9HG');

    if(!isset($_POST["l_password"]) || !isset($_POST["email"])) {
        echo "
            <script>
                alert('Error!\\nSomething went wrong');
                window.location.replace('login.php');
            </script>
        ";
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_POST["l_password"] = addslashes($_POST["l_password"]);
        $_POST["email"] = addslashes($_POST["email"]);
        $email = trim($_POST["email"]);
        $required=true;
        require("database.php");
        $sql="SELECT userid, activated, Lang, banned FROM user WHERE email='$email' AND password = '{$_POST["l_password"]}'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row["banned"]==1) {
                    echo <<<EOF
                    <script>
                        $("#login_form").find("input[name=l_password]").next().text("* Your account has been banned.");
                    </script>
EOF;
                } else if ($row["activated"]==1) {
                    $_SESSION["userid"] = $row["userid"];
                    if ($row["Lang"] != null) {
                        $_SESSION["lang"] = $row["Lang"];
                    }
                    echo "<script>window.location.replace('home')</script>";
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