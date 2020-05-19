<?php 
    // echo password_hash($_POST["password"], PASSWORD_BCRYPT);
    // echo "<br>".strlen('$2y$10$GoMVmM/EF2AigmhsFj66out2YPhW27oqNfsLsbIQwyi2nbPXbQ9HG');
    $error=false;
    if(isset($_POST["password"])&&isset($_POST["c_password"])&&isset($_POST["o_password"])) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_POST["password"] = addslashes($_POST["password"]);
        $_POST["c_password"] = addslashes($_POST["c_password"]);
        $_POST["o_password"] = addslashes($_POST["o_password"]);
        if (!(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[!@#$%^&*()-_=+`~[{\]}\\\\|;:'\",<.>\/?])(?=.{8,}).*$/",$_POST["password"])))
            $error=true;
        if ($_POST["password"]!=$_POST["c_password"])
            $error=true;
        if (!isset($_SESSION["userid"]))
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
        require("ch_pw_process_text.php");
        if ($_POST["password"]==$_POST["o_password"]) {
            echo "
                <script>
                    $('#ch_pw_frm span').text('');
                    $('#ch_pw_frm span').last().css('color','red').text('".$ch_pw_process_text["pwsame"]."');
                </script>
            ";
        } else {
            require("database.php");
            $sql = "UPDATE user SET password = '{$_POST["password"]}' WHERE password = '{$_POST["o_password"]}' AND userid = {$_SESSION["userid"]}";
            if ($conn->query($sql) === TRUE) {
                if (mysqli_affected_rows($conn) > 0) {
                    echo "
                        <script>
                            $('#ch_pw_frm span').text('');
                            $('#ch_pw_frm input').val('');
                            $('#ch_pw_frm span').last().css('color','red').text('".$ch_pw_process_text["pwchanged"]."');
                        </script>
                    ";
                } else {
                    echo "
                        <script>
                            $('#ch_pw_frm span').text('');
                            $('#ch_pw_frm span').eq(0).text('* Wrong password');
                        </script>
                    ";
                }
            } else {
                echo "
                    <script>
                        alert('Error!\\nSomething went wrong');
                    </script>
                ";
            }
            $conn->close();
        }
    }
    ?>