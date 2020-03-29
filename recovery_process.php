<?php 
    if(!isset($_POST["email"])) {
        require("404.php");
    } else {
        $required = 1;
        require("database.php");
        $secret=md5(uniqid(rand(), true));
        $sql = "UPDATE user SET action_time=now(),secret='$secret' WHERE email='".$_POST["email"]."'";

        if ($conn->query($sql) === TRUE) {
            if (mysqli_affected_rows($conn) > 0) {
                require("mail_recovery.php");
?>
                <script>
                    $("#popout p").html("An account recovery email has been send to <?php echo $_POST["email"]?>.<br>You can change your password within 30 minutes.");
                    $("#popout").show();
                </script>
<?php
            } else {
?>
                <script>
                    $("#recovery_form").find("input[name='email']").next().text("* This email has not been used.");
                </script>
<?php
            }
        } else {
            echo "<script>alert('Error!')</script>";
        }

        $conn->close();
    }
?>