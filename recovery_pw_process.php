<?php
    $error=false;
    if (isset($_POST["password"]) && isset($_POST["c_password"]) && isset($_POST["code"])) {
        session_start();
        $_POST["password"] = addslashes($_POST["password"]);
        $_POST["c_password"] = addslashes($_POST["c_password"]);
        if (!(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()-_=+`~[{\]}\\\\|;:'\",<.>\/?])(?=.{8,})/",$_POST["password"])))
            $error=true;
        if ($_POST["password"]!=$_POST["c_password"])
            $error=true;
    } else {
        require("404.php");
    }
    if ($error) {
        echo "
            <script>
                alert('Error!\\nSomething went wrong');
                window.location.replace('recovery?code=".$_POST["code"]."');
            </script>
        ";
    } else {
        $required = 1;
        require("recovery_pw_process_text.php");
        require("database.php");
        echo $sql = "UPDATE user SET password = '".$_POST["password"]."', action_time = now() - INTERVAL 30 minute WHERE TIMESTAMPDIFF(SECOND,action_time , now()) <= 1800 AND secret = '".$_POST["code"]."'";
        if ($conn->query($sql) === TRUE) {
            if (mysqli_affected_rows($conn) > 0) {
                echo "
                    <script>
                        $('#popout p').html('".$recovery_pw_process_text["pwchanged"]."');
                        $('#popout').show();
                    </script>
                ";  
            } else {
                echo "
                    <script>
                        alert('Error!\\nSomething went wrong');
                        window.location.replace('recovery?code=".$_POST["code"]."');
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    alert('Error!\\nSomething went wrong');
                    window.location.replace('recovery?code=".$_POST["code"]."');
                </script>
            ";
        }
        $conn->close();
    }
?>